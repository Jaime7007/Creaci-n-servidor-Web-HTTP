<?php
require 'config.php';

$mensajeError = '';
$mensajeOk    = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre    = trim($_POST['nombre'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $usuario   = trim($_POST['usuario'] ?? '');
    $password  = $_POST['password'] ?? '';

    // Validar campos obligatorios
    if ($nombre === '' || $apellidos === '' || $email === '' || $usuario === '' || $password === '') {
        $mensajeError = 'Todos los campos son obligatorios.';
    } else {
        // Hashear password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Insertar en BD
            $stmt = $pdo->prepare(
                'INSERT INTO usuarios (nombre, apellidos, email, usuario, password)
                 VALUES (:nombre, :apellidos, :email, :usuario, :password)'
            );
            $stmt->execute([
                ':nombre'   => $nombre,
                ':apellidos'=> $apellidos,
                ':email'    => $email,
                ':usuario'  => $usuario,
                ':password' => $passwordHash
            ]);

            $mensajeOk = 'Usuario registrado correctamente. Ahora puedes iniciar sesión.';
        } catch (PDOException $e) {
            // Error por duplicidad de usuario o email
            if ($e->getCode() === '23000') {
                $mensajeError = 'El usuario o el email ya existen.';
            } else {
                $mensajeError = 'Error al registrar el usuario.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h2>Registro de usuario</h2>

    <?php if ($mensajeError): ?>
        <p style="color:red;"><?php echo htmlspecialchars($mensajeError); ?></p>
    <?php endif; ?>

    <?php if ($mensajeOk): ?>
        <p style="color:green;"><?php echo htmlspecialchars($mensajeOk); ?></p>
    <?php endif; ?>

    <form method="post" action="registro.php">
        <label>Nombre:
            <input type="text" name="nombre" required>
        </label><br><br>

        <label>Apellidos:
            <input type="text" name="apellidos" required>
        </label><br><br>

        <label>Dirección de correo:
            <input type="email" name="email" required>
        </label><br><br>

        <label>Usuario:
            <input type="text" name="usuario" required>
        </label><br><br>

        <label>Password:
            <input type="password" name="password" required>
        </label><br><br>

        <input type="submit" value="Registrar">
    </form>

    <p><a href="login.php">Ya tengo cuenta (Ir a Login)</a></p>
</body>
</html>
