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

    if ($nombre === '' || $apellidos === '' || $email === '' || $usuario === '' || $password === '') {
        $mensajeError = 'Todos los campos son obligatorios.';
    } else {
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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #111827, #1f2937);
            color: #111827;
        }
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }
        .auth-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.35);
            max-width: 420px;
            width: 100%;
            padding: 32px 28px;
            box-sizing: border-box;
        }
        .auth-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0 0 4px 0;
            color: #111827;
        }
        .auth-subtitle {
            font-size: 0.9rem;
            color: #6b7280;
            margin-bottom: 24px;
        }
        .auth-message-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            border-radius: 10px;
            padding: 10px 12px;
            font-size: 0.85rem;
            margin-bottom: 16px;
        }
        .auth-message-ok {
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            color: #166534;
            border-radius: 10px;
            padding: 10px 12px;
            font-size: 0.85rem;
            margin-bottom: 16px;
        }
        .auth-form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 14px;
        }
        .auth-label {
            font-size: 0.85rem;
            color: #374151;
        }
        .auth-input {
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            padding: 10px 12px;
            font-size: 0.9rem;
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
            background-color: #f9fafb;
        }
        .auth-input:focus {
            border-color: #4f46e5;
            background-color: #ffffff;
            box-shadow: 0 0 0 1px #4f46e5;
        }
        .auth-button {
            margin-top: 8px;
            width: 100%;
            border: none;
            border-radius: 1000px;
            padding: 10px 14px;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.02em;
            cursor: pointer;
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: #ffffff;
            box-shadow: 0 12px 25px rgba(79, 70, 229, 0.35);
            transition: transform 0.12s ease, box-shadow 0.12s ease, opacity 0.12s ease;
        }
        .auth-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 30px rgba(79, 70, 229, 0.45);
            opacity: 0.96;
        }
        .auth-footer {
            margin-top: 18px;
            font-size: 0.85rem;
            color: #6b7280;
            text-align: center;
        }
        .auth-link {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
        }
        .auth-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="auth-wrapper">
    <div class="auth-card">
        <h1 class="auth-title">Crear cuenta</h1>
        <p class="auth-subtitle">Regístrate para acceder a la aplicación.</p>

        <?php if ($mensajeError): ?>
            <div class="auth-message-error">
                <?php echo htmlspecialchars($mensajeError); ?>
            </div>
        <?php endif; ?>

        <?php if ($mensajeOk): ?>
            <div class="auth-message-ok">
                <?php echo htmlspecialchars($mensajeOk); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="registro.php">
            <div class="auth-form-group">
                <label class="auth-label">Nombre</label>
                <input class="auth-input" type="text" name="nombre" required>
            </div>

            <div class="auth-form-group">
                <label class="auth-label">Apellidos</label>
                <input class="auth-input" type="text" name="apellidos" required>
            </div>

            <div class="auth-form-group">
                <label class="auth-label">Dirección de correo</label>
                <input class="auth-input" type="email" name="email" required>
            </div>

            <div class="auth-form-group">
                <label class="auth-label">Usuario</label>
                <input class="auth-input" type="text" name="usuario" required>
            </div>

            <div class="auth-form-group">
                <label class="auth-label">Password</label>
                <input class="auth-input" type="password" name="password" required>
            </div>

            <button type="submit" class="auth-button">Registrar</button>
        </form>

        <div class="auth-footer">
            ¿Ya tienes cuenta?
            <a class="auth-link" href="login.php">Inicia sesión</a>
        </div>
    </div>
</div>
</body>
</html>
