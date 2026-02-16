<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zona privada · Sistema de usuarios</title>
    <style>
        body{margin:0;min-height:100vh;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:radial-gradient(circle at top,#1f2937 0,#020617 55%,#000 100%);display:flex;align-items:center;justify-content:center;padding:20px;}
        .card{background:#020617;border-radius:24px;box-shadow:0 28px 80px rgba(15,23,42,.9);border:1px solid rgba(148,163,184,.25);max-width:480px;width:100%;padding:26px 26px 22px;color:#e5e7eb;text-align:center;}
        .title{font-size:1.5rem;font-weight:600;margin:0 0 8px;}
        .text{font-size:.92rem;color:#9ca3af;margin-bottom:20px;}
        .btn{display:inline-block;margin-top:4px;border-radius:999px;padding:8px 16px;font-size:.88rem;border:1px solid #4b5563;background:#020617;color:#e5e7eb;text-decoration:none;transition:background .15s,border-color .15s;}
        .btn:hover{background:#111827;border-color:#9ca3af;}
    </style>
</head>
<body>
<div class="card">
    <h1 class="title">Hola, <?php echo htmlspecialchars($_SESSION['nombre']); ?> 👋</h1>
    <p class="text">
        Has iniciado sesión como <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>.
        Esta página solo es accesible para usuarios autenticados.
    </p>
    <a class="btn" href="logout.php">Cerrar sesión</a>
    <a class="btn" href="index.php">Volver al inicio</a>
</div>
</body>
</html>
