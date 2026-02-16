<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Sistema de Usuarios</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #111827, #1f2937);
            color: #e5e7eb;
        }
        .home-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }
        .home-card {
            background: #020617;
            border-radius: 20px;
            box-shadow: 0 24px 50px rgba(15, 23, 42, 0.8);
            max-width: 520px;
            width: 100%;
            padding: 30px 26px;
            box-sizing: border-box;
        }
        .home-title {
            font-size: 1.6rem;
            font-weight: 600;
            margin: 0 0 8px 0;
        }
        .home-subtitle {
            font-size: 0.9rem;
            color: #9ca3af;
            margin-bottom: 24px;
        }
        .home-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .home-button {
            display: block;
            width: 100%;
            text-align: center;
            border-radius: 999px;
            padding: 10px 14px;
            font-size: 0.95rem;
            font-weight: 500;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: transform 0.12s ease, box-shadow 0.12s ease, opacity 0.12s ease;
        }
        .home-button-primary {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: #ffffff;
            box-shadow: 0 14px 30px rgba(79, 70, 229, 0.55);
        }
        .home-button-secondary {
            background: #020617;
            color: #e5e7eb;
            border: 1px solid #374151;
        }
        .home-button-tertiary {
            background: #020617;
            color: #9ca3af;
            border: 1px solid #4b5563;
        }
        .home-button:hover {
            transform: translateY(-1px);
            opacity: 0.97;
        }
        .home-footer {
            margin-top: 18px;
            font-size: 0.8rem;
            color: #6b7280;
            text-align: center;
        }
        @media (max-width: 480px) {
            .home-card {
                padding: 24px 18px;
            }
        }
    </style>
</head>
<body>
<div class="home-wrapper">
    <div class="home-card">
        <h1 class="home-title">Sistema de usuarios</h1>
        <p class="home-subtitle">
            Práctica de servidor web HTTP con registro y login de usuarios sobre Ubuntu Server.
        </p>

        <div class="home-buttons">
            <a class="home-button home-button-primary" href="login.php">Iniciar sesión</a>
            <a class="home-button home-button-secondary" href="registro.php">Crear nueva cuenta</a>
            <a class="home-button home-button-tertiary" href="dashboard.php">Ir a zona privada</a>
        </div>

        <div class="home-footer">
            Servidor: 192.168.100.1 · Cliente: 192.168.100.2
        </div>
    </div>
</div>
</body>
</html>
