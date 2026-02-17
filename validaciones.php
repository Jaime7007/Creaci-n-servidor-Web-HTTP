<?php

function validarCamposObligatorios(array $datos): array {
    foreach ($datos as $campo => $valor) {
        if (trim($valor) === '') {
            return ["Todos los campos son obligatorios (falta: $campo)."];
        }
    }
    return [];
}

function validarEmail(string $email): array {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['El correo no tiene un formato válido (debe incluir @ y un punto).'];
    }
    return [];
}

function validarPassword(string $password): array {
    // Al menos 6 caracteres, una letra, un número y un símbolo
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{6,}$/', $password)) {
        return ['La contraseña debe tener al menos 6 caracteres y contener al menos una letra, un número y un símbolo.'];
    }
    return [];
}

function validarUsuarioYEmailUnicos(PDO $pdo, string $usuario, string $email): array {
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE usuario = :usuario OR email = :email');
    $stmt->execute([':usuario' => $usuario, ':email' => $email]);
    if ($stmt->fetchColumn() > 0) {
        return ['El usuario o el email ya están registrados. Prueba con otros.'];
    }
    return [];
}
