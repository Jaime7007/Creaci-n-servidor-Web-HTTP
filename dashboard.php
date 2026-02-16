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
    <title>Zona privada</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #111827, #1f2937);
            color: #111827;
        }
        .dashboard-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }
        .dashboard-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.35);
            max-width: 480px;
            width: 100%;
            padding: 28px;
            box-sizing: border-box;
            text-align: center;
        }
        .dashboard-title {
            font-size: 1.4rem;
            margin-bottom: 8px;
            color: #111827;
        }
        .dashboard-text {
            font-size: 0.95rem;
            color: #4b5563;
            margin-bottom: 20px;
        }
        .dashboard-button {
            display: inline-block;
            border-radius: 999px;
            padding: 8px 16px;
            font-size: 0.9rem;
            border: 1px solid #e5e7eb;
            color: #374151;
            text-decoration: none;
            background-color: #f9fafb;
            transition: background-color 0.15s ease, border-color 0.15s ease;
        }
        .dashboard-button:hover {
            background-color: #f3f4f6;
            border-color: #d1d5db;
        }
    </style>
</head>
<body>
<div class="dashboard-wrapper">
    <div class="dashboard-card">
        <h1 class="dashboard-title">Hola, <?php echo htmlspecialchars($_SESSION['nombre']); ?> 👋</h1>
        <p class="dashboard-text">
            Has iniciado sesión como <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>.
        </p>
        <a class="dashboard-button" href="logout.php">Cerrar sesión</a>
    </div>
</div>
</body>
</html>
