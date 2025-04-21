<?php
/**
 * Página de inicio de sesión - Mundo Cereal
 * Prohibir acceso directo sin constante definida
 */
define('ACCESO_PERMITIDO', true); // Permitir acceso a este archivo
session_start();

// =============================================
//  MANEJO DE MENSAJES DE ERROR/ÉXITO
// =============================================
$mensajes = [
    // Errores de autenticación
    'campos_vacios'         => ['tipo' => 'error', 'texto' => '⚠️ Por favor, complete todos los campos.'],
    'credenciales_incorrectas' => ['tipo' => 'error', 'texto' => '🔒 Usuario o contraseña incorrectos.'],
    'no_autenticado'        => ['tipo' => 'error', 'texto' => '🔐 Debe iniciar sesión para acceder.'],
    'acceso_no_autorizado'  => ['tipo' => 'error', 'texto' => '🚫 No tiene permisos para esta sección.'],
    'sesion_expirada'       => ['tipo' => 'error', 'texto' => '⏳ Su sesión ha expirado por inactividad.'],
    'rol_no_valido'         => ['tipo' => 'error', 'texto' => '❌ Rol no reconocido en el sistema.'],
    
    // Mensajes de éxito
    'logout'                => ['tipo' => 'success', 'texto' => '✅ Sesión cerrada correctamente.']
];

// Mostrar mensaje si existe en la URL (?error=XXXX)
if (isset($_GET['error']) && array_key_exists($_GET['error'], $mensajes)) {
    $mensaje = $mensajes[$_GET['error']];
    $clase = ($mensaje['tipo'] === 'error') ? 'alert-danger' : 'alert-success';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mundo Cereal</title>
    <link rel="stylesheet" href="public/css/style.css"> 


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mundo Cereal</title>
</head>
<body>
    <div class="login-container">
        <h1>BIENVENIDO<br>MUNDO CEREAL</h1>

        <!-- Mostrar mensaje de error/éxito -->
        <?php if (isset($mensaje)): ?>
            <div class="alert <?= $clase ?>"><?= $mensaje['texto'] ?></div>
        <?php endif; ?>

        <!-- Formulario de Login -->
        <form action="controllers/LoginController.php" method="POST">
            <div class="form-group">
                <label for="usuario">USUARIO:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            
            <div class="form-group">
                <label for="password">CONTRASEÑA:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">INICIAR SESIÓN</button>
        </form>
    </div>
</body>
</html>