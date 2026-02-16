<?php
$host = 'localhost';
$db   = 'web_practica';
$user = 'webuser';       // Usuario MySQL de la web
$pass = 'jaime_7007';   // Cambia por la que hayas puesto al crear el usuario

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}
?>
