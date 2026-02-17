<?php
require 'config.php';
require 'validaciones.php';

$errores   = [];
$mensajeOk = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre    = $_POST['nombre']    ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $email     = $_POST['email']     ?? '';
    $usuario   = $_POST['usuario']   ?? '';
    $password  = $_POST['password']  ?? '';

    // 1) Campos obligatorios
    $errores = array_merge($errores, validarCamposObligatorios([
        'nombre'    => $nombre,
        'apellidos' => $apellidos,
        'email'     => $email,
        'usuario'   => $usuario,
        'password'  => $password,
    ]));

    // 2) Email
    if ($email !== '') {
        $errores = array_merge($errores, validarEmail($email));
    }

    // 3) Password
    if ($password !== '') {
        $errores = array_merge($errores, validarPassword($password));
    }

    // 4) Usuario y email únicos
    if ($usuario !== '' && $email !== '') {
        $errores = array_merge($errores, validarUsuarioYEmailUnicos($pdo, $usuario, $email));
    }

    // 5) Insertar si no hay errores
    if (empty($errores)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        try {
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
            $errores[] = 'Error al registrar el usuario.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro · Sistema de usuarios</title>
    <style>
        body{margin:0;min-height:100vh;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:radial-gradient(circle at top,#1f2937 0,#020617 55%,#000 100%);display:flex;align-items:center;justify-content:center;padding:20px;}
        .card{background:#020617;border-radius:24px;box-shadow:0 28px 80px rgba(15,23,42,.9);border:1px solid rgba(148,163,184,.25);max-width:420px;width:100%;padding:26px 26px 22px;color:#e5e7eb;}
        .title{font-size:1.4rem;font-weight:600;margin:0 0 4px;}
        .subtitle{font-size:.9rem;color:#9ca3af;margin-bottom:20px;}
        .msg-error{background:#fef2f2;border:1px solid #fecaca;color:#b91c1c;border-radius:12px;padding:9px 11px;font-size:.82rem;margin-bottom:14px;}
        .msg-ok{background:#ecfdf5;border:1px solid #bbf7d0;color:#166534;border-radius:12px;padding:9px 11px;font-size:.82rem;margin-bottom:14px;}
        .group{display:flex;flex-direction:column;gap:6px;margin-bottom:12px;}
        label{font-size:.82rem;color:#9ca3af;}
        input{border-radius:999px;border:1px solid #334155;padding:9px 12px;font-size:.9rem;background:#020617;color:#e5e7eb;outline:none;transition:border-color .15s,box-shadow .15s,background .15s;}
        input:focus{border-color:#4f46e5;box-shadow:0 0 0 1px #4f46e5;}
        .btn{width:100%;margin-top:6px;border:none;border-radius:999px;padding:9px 14px;font-size:.9rem;font-weight:500;cursor:pointer;background:linear-gradient(135deg,#22c55e,#16a34a);color:#052e16;box-shadow:0 16px 32px rgba(22,163,74,.6);transition:transform .12s,box-shadow .12s,opacity .12s;}
        .btn:hover{transform:translateY(-1px);opacity:.98;}
        .footer{margin-top:16px;font-size:.82rem;color:#9ca3af;text-align:center;}
        .link{color:#a5b4fc;text-decoration:none;}
        .link:hover{text-decoration:underline;}
    </style>
</head>
<body>
<div class="card">
    <h1 class="title">Crear cuenta</h1>
    <p class="subtitle">Regístrate para acceder al sistema de usuarios.</p>

    <?php if (!empty($errores)): ?>
        <div class="msg-error">
            <?php foreach ($errores as $e): ?>
                <div><?php echo htmlspecialchars($e); ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($mensajeOk): ?>
        <div class="msg-ok">
            <?php echo htmlspecialchars($mensajeOk); ?>
        </div>
    <?php endif; ?>

    <form method="post" action="registro.php">
        <div class="group">
            <label>Nombre</label>
            <input type="text" name="nombre" required>
        </div>
        <div class="group">
            <label>Apellidos</label>
            <input type="text" name="apellidos" required>
        </div>
        <div class="group">
            <label>Dirección de correo</label>
            <input type="email" name="email" required>
        </div>
        <div class="group">
            <label>Usuario</label>
            <input type="text" name="usuario" required>
        </div>
        <div class="group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" class="btn">Registrar</button>
    </form>

    <div class="footer">
        ¿Ya tienes cuenta? <a class="link" href="login.php">Inicia sesión</a>
        · <a class="link" href="index.php">Volver al inicio</a>
    </div>
</div>
</body>
</html>
