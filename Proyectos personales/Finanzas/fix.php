<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=fardel_db;charset=utf8", "root", "");
    // Encriptamos "admin123" de forma real y segura
    $hashReal = password_hash("admin123", PASSWORD_DEFAULT);

    // Actualizamos el usuario en la base de datos
    $stmt = $pdo->prepare("UPDATE users SET password_hash = ? WHERE email = 'admin@fardel.com'");
    $stmt->execute([$hashReal]);

    echo "<h1>¡Contraseña arreglada con éxito!</h1><p>Ya puedes iniciar sesión con <b>admin123</b>.</p>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>