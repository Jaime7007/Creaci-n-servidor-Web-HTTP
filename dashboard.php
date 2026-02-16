<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zona privada</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h2>
    <p>Has iniciado sesión como <?php echo htmlspecialchars($_SESSION['usuario']); ?>.</p>

    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
