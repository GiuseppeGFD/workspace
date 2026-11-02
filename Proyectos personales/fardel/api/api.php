<?php
declare(strict_types=1);
session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax']);
session_start();
header('Content-Type: application/json; charset=utf-8');

function out($d, int $c = 200): never { http_response_code($c); echo json_encode($d, JSON_UNESCAPED_UNICODE); exit; }
function uid(): string { return bin2hex(random_bytes(16)); }
function fail(string $m, int $c = 400): never { out(['error' => $m], $c); }
function validDate(string $d): bool { $x = DateTime::createFromFormat('Y-m-d', $d); return $x && $x->format('Y-m-d') === $d; }

function createHousehold(PDO $pdo, string $uid, string $name): void {
    $hid = uid();
    $pdo->prepare('INSERT INTO households (id,name,invite_code) VALUES (?,?,?)')->execute([$hid, "Hogar de $name", strtoupper(bin2hex(random_bytes(4)))]);
    $pdo->prepare("INSERT INTO household_members (household_id,user_id,role) VALUES (?,?,'owner')")->execute([$hid, $uid]);
    $ins = $pdo->prepare('INSERT INTO categories (id,household_id,name,icon) VALUES (?,?,?,?)');
    foreach ([['Vivienda','🏠'],['Alimentación','🛒'],['Transporte','🚗'],['Ocio','🎬'],['Salud','💊'],['Mascotas','🐶'],['Otros','🏷️']] as $c)
        $ins->execute([uid(), $hid, $c[0], $c[1]]);
}

$cfg = require __DIR__ . '/../config.php';
try {
    $pdo = new PDO("mysql:host={$cfg['host']};dbname={$cfg['db']};charset=utf8mb4", $cfg['user'], $cfg['pass'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch (PDOException $e) { fail('No se pudo conectar con la base de datos. Revisa config.php.', 500); }

$_SESSION['csrf'] ??= bin2hex(random_bytes(16));
$a = $_GET['a'] ?? '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !hash_equals($_SESSION['csrf'], $_SERVER['HTTP_X_CSRF'] ?? ''))
    fail('La sesión ha caducado. Recarga la página.', 403);

$text = fn(string $k, int $max) => mb_substr(trim((string)($_POST[$k] ?? '')), 0, $max);
$money = fn(string $k) => round((float)str_replace(',', '.', (string)($_POST[$k] ?? '0')), 2);

try {
    if ($a === 'me') {
        $u = isset($_SESSION['uid']) ? ['id' => $_SESSION['uid'], 'name' => $_SESSION['name'], 'role' => $_SESSION['role']] : null;
        out(['user' => $u, 'csrf' => $_SESSION['csrf']]);
    }

    if ($a === 'login') {
        if (($_SESSION['fails'] ?? 0) >= 5 && time() - ($_SESSION['failAt'] ?? 0) < 60) fail('Demasiados intentos. Espera un minuto.', 429);
        $s = $pdo->prepare('SELECT u.*, m.household_id, m.role FROM users u JOIN household_members m ON m.user_id = u.id WHERE u.email = ? LIMIT 1');
        $s->execute([mb_strtolower($text('email', 120))]);
        $u = $s->fetch();
        if (!$u || !password_verify((string)($_POST['password'] ?? ''), $u['password_hash'])) {
            $_SESSION['fails'] = ($_SESSION['fails'] ?? 0) + 1; $_SESSION['failAt'] = time();
            fail('Correo o contraseña incorrectos.', 401);
        }
        session_regenerate_id(true);
        $_SESSION['fails'] = 0; $_SESSION['uid'] = $u['id']; $_SESSION['hid'] = $u['household_id'];
        $_SESSION['role'] = $u['role']; $_SESSION['name'] = $u['display_name'];
        out(['ok' => true]);
    }

    if ($a === 'register') {
        $email = mb_strtolower($text('email', 120)); $name = $text('name', 80); $pass = (string)($_POST['password'] ?? '');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) fail('Correo no válido.');
        if ($name === '') fail('Escribe tu nombre.');
        if (strlen($pass) < 8) fail('La contraseña debe tener al menos 8 caracteres.');
        $s = $pdo->prepare('SELECT 1 FROM users WHERE email = ?'); $s->execute([$email]);
        if ($s->fetch()) fail('Ese correo ya está registrado.', 409);
        $code = strtoupper($text('code', 8)); $join = null;
        if ($code !== '') { $s = $pdo->prepare('SELECT id FROM households WHERE invite_code = ?'); $s->execute([$code]); $join = $s->fetchColumn();
            if (!$join) fail('Código de invitación no válido.'); }
        $uid = uid();
        $pdo->beginTransaction();
        $pdo->prepare('INSERT INTO users (id,email,password_hash,display_name) VALUES (?,?,?,?)')->execute([$uid, $email, password_hash($pass, PASSWORD_DEFAULT), $name]);
        if ($join) $pdo->prepare("INSERT INTO household_members (household_id,user_id,role) VALUES (?,?,'member')")->execute([$join, $uid]);
        else createHousehold($pdo, $uid, $name);
        $pdo->commit();
        out(['ok' => true]);
    }

    if ($a === 'logout') { $csrf = $_SESSION['csrf']; $_SESSION = ['csrf' => $csrf]; session_regenerate_id(true); out(['ok' => true]); }

    if (!isset($_SESSION['uid'])) fail('No autorizado.', 401);
    $hid = $_SESSION['hid']; $me = $_SESSION['uid']; $admin = in_array($_SESSION['role'], ['owner', 'admin'], true);

    if ($a === 'data') {
        $from = $_GET['from'] ?? ''; $to = $_GET['to'] ?? '';
        if (!validDate($from) || !validDate($to)) fail('Rango de fechas no válido.');
        $e = $pdo->prepare('SELECT e.id,e.amount,e.description,e.note,e.receipt,e.expense_date,e.category_id,e.paid_by,u.display_name AS user_name FROM expenses e JOIN users u ON u.id=e.paid_by WHERE e.household_id=? AND e.expense_date BETWEEN ? AND ? ORDER BY e.expense_date DESC, e.created_at DESC');
        $e->execute([$hid, $from, $to]);
        $c = $pdo->prepare('SELECT id,name,icon,budget FROM categories WHERE household_id=? ORDER BY name'); $c->execute([$hid]);
        $s = $pdo->prepare('SELECT id,service,price,charge_day FROM subscriptions WHERE household_id=? ORDER BY charge_day'); $s->execute([$hid]);
        $t = $pdo->prepare("SELECT DATE_FORMAT(expense_date,'%Y-%m') AS m, SUM(amount) AS total FROM expenses WHERE household_id=? AND expense_date >= DATE_SUB(DATE_FORMAT(CURRENT_DATE(),'%Y-%m-01'), INTERVAL 5 MONTH) GROUP BY m ORDER BY m");
        $t->execute([$hid]);
        $m = $pdo->prepare("SELECT u.id, u.display_name AS name, m.role FROM household_members m JOIN users u ON u.id=m.user_id WHERE m.household_id=? ORDER BY FIELD(m.role,'owner','admin','member'), u.display_name"); $m->execute([$hid]);
        $h = $pdo->prepare('SELECT name, invite_code FROM households WHERE id=?'); $h->execute([$hid]); $house = $h->fetch();
        if (!$admin) unset($house['invite_code']);
        out(['expenses' => $e->fetchAll(), 'categories' => $c->fetchAll(), 'subscriptions' => $s->fetchAll(), 'trend' => $t->fetchAll(), 'me' => $me, 'admin' => $admin, 'members' => $m->fetchAll(), 'house' => $house]);
    }

    if ($a === 'expense_save') {
        $id = $text('id', 32); $amount = $money('amount');
        $desc = $text('description', 200); $date = $text('expense_date', 10); $cat = $text('category_id', 32);
        if ($desc === '' || $amount <= 0 || $amount > 9999999) fail('Indica un concepto y un importe mayor que 0.');
        if (!validDate($date)) fail('Fecha no válida.');
        $s = $pdo->prepare('SELECT 1 FROM categories WHERE id=? AND household_id=?'); $s->execute([$cat, $hid]);
        if (!$s->fetch()) fail('Categoría no válida.');
        $receipt = null;
        if (!empty($_FILES['receipt']['tmp_name']) && $_FILES['receipt']['error'] === UPLOAD_ERR_OK) {
            $f = $_FILES['receipt'];
            $ext = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'][(new finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name'])] ?? null;
            if (!$ext || $f['size'] > 5000000) fail('El ticket debe ser una imagen JPG, PNG o WEBP de hasta 5 MB.');
            $receipt = uid() . ".$ext";
            move_uploaded_file($f['tmp_name'], __DIR__ . "/../uploads/$receipt");
        }
        $note = $text('note', 500) ?: null;
        if ($id !== '') {
            $s = $pdo->prepare('SELECT paid_by, receipt FROM expenses WHERE id=? AND household_id=?'); $s->execute([$id, $hid]); $row = $s->fetch();
            if (!$row || !($admin || $row['paid_by'] === $me)) fail('No puedes editar este gasto.', 403);
            if ($receipt && $row['receipt']) @unlink(__DIR__ . '/../uploads/' . basename($row['receipt']));
            $pdo->prepare('UPDATE expenses SET category_id=?, amount=?, description=?, note=?, expense_date=?, receipt=COALESCE(?, receipt) WHERE id=?')
                ->execute([$cat, $amount, $desc, $note, $date, $receipt, $id]);
        } else {
            $pdo->prepare('INSERT INTO expenses (id,household_id,category_id,paid_by,amount,description,note,receipt,expense_date) VALUES (?,?,?,?,?,?,?,?,?)')
                ->execute([uid(), $hid, $cat, $me, $amount, $desc, $note, $receipt, $date]);
        }
        out(['ok' => true]);
    }

    if ($a === 'expense_delete') {
        $id = $text('id', 32);
        $s = $pdo->prepare('SELECT paid_by, receipt FROM expenses WHERE id=? AND household_id=?'); $s->execute([$id, $hid]); $row = $s->fetch();
        if (!$row || !($admin || $row['paid_by'] === $me)) fail('No puedes eliminar este gasto.', 403);
        $pdo->prepare('DELETE FROM expenses WHERE id=?')->execute([$id]);
        if ($row['receipt']) @unlink(__DIR__ . '/../uploads/' . basename($row['receipt']));
        out(['ok' => true]);
    }

    if ($a === 'cat_save') {
        $name = $text('name', 60); if ($name === '') fail('Escribe un nombre.');
        $icon = $text('icon', 16) ?: '🏷️'; $b = trim((string)($_POST['budget'] ?? '')); $budget = $b === '' ? null : max(0, $money('budget'));
        $id = $text('id', 32);
        if ($id) $pdo->prepare('UPDATE categories SET name=?, icon=?, budget=? WHERE id=? AND household_id=?')->execute([$name, $icon, $budget, $id, $hid]);
        else $pdo->prepare('INSERT INTO categories (id,household_id,name,icon,budget) VALUES (?,?,?,?,?)')->execute([uid(), $hid, $name, $icon, $budget]);
        out(['ok' => true]);
    }

    if ($a === 'cat_delete') {
        $id = $text('id', 32);
        $s = $pdo->prepare('SELECT COUNT(*) FROM expenses WHERE category_id=? AND household_id=?'); $s->execute([$id, $hid]);
        if ((int)$s->fetchColumn() > 0) fail('Esta categoría tiene gastos. Bórralos o muévelos antes.', 409);
        $pdo->prepare('DELETE FROM categories WHERE id=? AND household_id=?')->execute([$id, $hid]);
        out(['ok' => true]);
    }

    if ($a === 'sub_save') {
        $name = $text('service', 100); $price = $money('price'); $day = (int)($_POST['charge_day'] ?? 0);
        if ($name === '' || $price <= 0 || $day < 1 || $day > 31) fail('Revisa servicio, precio y día de cobro (1-31).');
        $pdo->prepare('INSERT INTO subscriptions (id,household_id,service,price,charge_day) VALUES (?,?,?,?,?)')->execute([uid(), $hid, $name, $price, $day]);
        out(['ok' => true]);
    }

    if ($a === 'sub_delete') {
        $pdo->prepare('DELETE FROM subscriptions WHERE id=? AND household_id=?')->execute([$text('id', 32), $hid]);
        out(['ok' => true]);
    }

    $owner = $_SESSION['role'] === 'owner';
    if ($a === 'invite_regen') {
        if (!$admin) fail('Solo admin o propietario.', 403);
        $pdo->prepare('UPDATE households SET invite_code=? WHERE id=?')->execute([strtoupper(bin2hex(random_bytes(4))), $hid]);
        out(['ok' => true]);
    }
    if ($a === 'member_role') {
        $t = $text('id', 32); $role = $text('role', 10);
        if (!$owner || $t === $me || !in_array($role, ['admin', 'member'], true)) fail('Cambio no permitido.', 403);
        $pdo->prepare("UPDATE household_members SET role=? WHERE household_id=? AND user_id=? AND role<>'owner'")->execute([$role, $hid, $t]);
        out(['ok' => true]);
    }
    if ($a === 'member_remove') {
        $t = $text('id', 32);
        if (!$owner || $t === $me) fail('Cambio no permitido.', 403);
        $n = $pdo->prepare('SELECT display_name FROM users WHERE id=?'); $n->execute([$t]); $name = $n->fetchColumn();
        $pdo->beginTransaction();
        $d = $pdo->prepare('DELETE FROM household_members WHERE household_id=? AND user_id=?'); $d->execute([$hid, $t]);
        if ($d->rowCount() && $name) createHousehold($pdo, $t, $name);
        $pdo->commit();
        out(['ok' => true]);
    }

    fail('Acción desconocida.', 404);
} catch (PDOException $e) {
    if ($pdo->inTransaction()) $pdo->rollBack();
    fail('Error de base de datos.', 500);
}
