<?php
// Datos de conexión al MySQL del propio servidor
$host = 'localhost';      // MySQL está en el mismo Ubuntu Server
$db   = 'web_practica';
$user = 'root';           // Cambia si usas otro usuario
$pass = 'TU_PASSWORD_MYSQL'; // Sustituye por tu contraseña real

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}
?>
