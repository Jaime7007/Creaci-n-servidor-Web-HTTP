<?php
session_start();
require 'config.php';

$mensajeError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($usuario === '' || $password === '') {
        $mensajeError = 'Debes introducir usuario y contraseña.';
    } else {
        // Buscar usuario en la BD
        $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $stmt->execute([':usuario' => $usuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar password
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['nombre']  = $user['nombre'];
            header('Location: dashboard.php');
            exit;
        } else {
            $mensajeError = 'Usuario o contraseña incorrectos.';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if ($mensajeError): ?>
        <p style="color:red;"><?php echo htmlspecialchars($mensajeError); ?></p>
    <?php endif; ?>

    <form method="post" action="login.php">
        <label>Usuario:
            <input type="text" name="usuario" required>
        </label><br><br>

        <label>Password:
            <input type="password" name="password" required>
        </label><br><br>

        <input type="submit" value="Entrar">
    </form>

    <p><a href="registro.php">Registrarse</a></p>
</body>
</html>
