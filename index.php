<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio · Sistema de usuarios</title>
    <style>
        :root {
            color-scheme: dark;
        }
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: radial-gradient(circle at top, #1f2937 0, #020617 55%, #000000 100%);
            color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .shell {
            max-width: 800px;
            width: 100%;
            display: grid;
            grid-template-columns: minmax(0, 3fr) minmax(0, 2fr);
            gap: 28px;
            background: rgba(15, 23, 42, 0.95);
            border-radius: 24px;
            box-shadow: 0 28px 80px rgba(15, 23, 42, 0.9);
            border: 1px solid rgba(148, 163, 184, 0.25);
            padding: 26px 26px 22px;
        }
        .brand-title {
            font-size: 1.6rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            margin-bottom: 8px;
        }
        .brand-kicker {
            font-size: 0.9rem;
            color: #9ca3af;
            margin-bottom: 18px;
        }
        .brand-meta {
            font-size: 0.8rem;
            color: #6b7280;
        }
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.75rem;
            background: rgba(37, 99, 235, 0.12);
            color: #bfdbfe;
            margin-bottom: 10px;
        }
        .pill-dot {
            width: 6px;
            height: 6px;
            border-radius: 999px;
            background: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.35);
        }
        .right-card {
            background: radial-gradient(circle at top left, #4f46e5, #0f172a 55%);
            border-radius: 18px;
            padding: 20px 18px 16px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            box-shadow: 0 22px 50px rgba(79, 70, 229, 0.55);
            border: 1px solid rgba(129, 140, 248, 0.5);
        }
        .right-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 2px;
        }
        .right-sub {
            font-size: 0.82rem;
            color: #e5e7eb;
            opacity: 0.88;
            margin-bottom: 10px;
        }
        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            border-radius: 999px;
            padding: 9px 14px;
            font-size: 0.9rem;
            font-weight: 500;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.12s ease, box-shadow 0.12s ease, opacity 0.12s ease, background 0.12s ease;
        }
        .btn-primary {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: #052e16;
            box-shadow: 0 16px 32px rgba(22, 163, 74, 0.6);
        }
        .btn-secondary {
            background: rgba(15, 23, 42, 0.92);
            color: #e5e7eb;
            border: 1px solid rgba(148, 163, 184, 0.45);
        }
        .btn-ghost {
            background: transparent;
            color: #cbd5f5;
            border: 1px dashed rgba(148, 163, 184, 0.5);
        }
        .btn:hover {
            transform: translateY(-1px);
            opacity: 0.98;
        }
        .btn:active {
            transform: translateY(0);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.8);
        }
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .meta-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 8px;
            margin-top: 16px;
        }
        .meta-item {
            font-size: 0.78rem;
            color: #9ca3af;
        }
        @media (max-width: 720px) {
            .shell {
                grid-template-columns: minmax(0, 1fr);
                padding: 20px 18px 18px;
            }
        }
    </style>
</head>
<body>
<div class="shell">
    <div>
        <div class="pill">
            <span class="pill-dot"></span>
            Servidor web HTTP · LAMP
        </div>
        <h1 class="brand-title">Sistema de usuarios 2026</h1>
        <p class="brand-kicker">
            Práctica de Ubuntu Server + Apache2 + PHP + MySQL con login, registro y zona privada accesible desde un cliente Lubuntu en la misma red.
        </p>
        <div class="meta-grid">
            <div class="meta-item">
                Servidor: 192.168.100.1<br>
                Cliente: 192.168.100.2
            </div>
            <div class="meta-item">
                Base de datos: <strong>web_practica</strong><br>
                Tabla: <strong>usuarios</strong>
            </div>
        </div>
    </div>

    <div class="right-card">
        <div>
            <div class="right-title">Acceso rápido</div>
            <div class="right-sub">Elige una opción para comenzar a usar la aplicación.</div>
        </div>

        <div class="btn-group">
            <a class="btn btn-primary" href="login.php">
                Iniciar sesión
            </a>
            <a class="btn btn-secondary" href="registro.php">
                Crear nueva cuenta
            </a>
            <a class="btn btn-ghost" href="dashboard.php">
                Ir a zona privada
            </a>
        </div>
    </div>
</div>
</body>
</html>
