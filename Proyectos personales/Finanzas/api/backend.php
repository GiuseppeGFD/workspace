<?php
session_start();
header("Content-Type: application/json");

try {
    $pdo = new PDO("mysql:host=localhost;dbname=fardel_db;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(["status" => "error", "msg" => "Error de conexión BD"]));
}

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';

if ($accion === 'login') {
    $stmt = $pdo->prepare("SELECT u.*, hm.household_id, hm.role FROM users u LEFT JOIN household_members hm ON u.id = hm.user_id WHERE u.email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_POST['password'], $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['household_id'] = $user['household_id'];
        $_SESSION['role'] = $user['role'];
        echo json_encode([
            "status" => "ok",
            "user" => [
                "id" => $user['id'],
                "name" => $user['display_name'],
                "household_id" => $user['household_id'],
                "role" => $user['role']
            ]
        ]);
    } else {
        echo json_encode(["status" => "error", "msg" => "Credenciales incorrectas"]);
    }
    exit;
}

if ($accion === 'logout') {
    session_destroy();
    echo json_encode(["status" => "ok"]);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "msg" => "No autorizado"]);
    exit;
}

if ($accion === 'obtener_datos') {
    $filtro = $_GET['filtro'] ?? 'mes';
    $condicion = "MONTH(e.expense_date) = MONTH(CURRENT_DATE()) AND YEAR(e.expense_date) = YEAR(CURRENT_DATE())";
    if ($filtro === 'semana')
        $condicion = "YEARWEEK(e.expense_date, 1) = YEARWEEK(CURRENT_DATE(), 1)";
    if ($filtro === 'año')
        $condicion = "YEAR(e.expense_date) = YEAR(CURRENT_DATE())";

    // Gastos
    $stmtG = $pdo->prepare("SELECT e.id, e.amount, e.description, e.expense_date, c.name as category_name, c.icon, u.display_name as user_name, e.paid_by FROM expenses e JOIN categories c ON e.category_id = c.id JOIN users u ON e.paid_by = u.id WHERE e.household_id = ? AND $condicion ORDER BY e.expense_date DESC");
    $stmtG->execute([$_SESSION['household_id']]);

    // Categorías
    $stmtC = $pdo->prepare("SELECT id, name, icon FROM categories WHERE household_id = ?");
    $stmtC->execute([$_SESSION['household_id']]);

    // Suscripciones
    $stmtS = $pdo->prepare("SELECT service, price, charge_day FROM subscriptions WHERE household_id = ? ORDER BY charge_day ASC");
    $stmtS->execute([$_SESSION['household_id']]);

    echo json_encode([
        "status" => "ok",
        "gastos" => $stmtG->fetchAll(PDO::FETCH_ASSOC),
        "categorias" => $stmtC->fetchAll(PDO::FETCH_ASSOC),
        "suscripciones" => $stmtS->fetchAll(PDO::FETCH_ASSOC)
    ]);
} elseif ($accion === 'nuevo_gasto') {
    $stmt = $pdo->prepare("INSERT INTO expenses (household_id, category_id, paid_by, amount, description, expense_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_SESSION['household_id'],
        $_POST['category_id'],
        $_SESSION['user_id'],
        $_POST['amount'],
        $_POST['description'],
        date('Y-m-d')
    ]);
    echo json_encode(["status" => "ok"]);
} elseif ($accion === 'eliminar_gasto') {
    $stmt = $pdo->prepare("DELETE FROM expenses WHERE id = ? AND household_id = ? AND (paid_by = ? OR ? IN ('owner', 'admin'))");
    $stmt->execute([$_POST['id_gasto'], $_SESSION['household_id'], $_SESSION['user_id'], $_SESSION['role']]);
    echo json_encode(["status" => "ok"]);
}
?>