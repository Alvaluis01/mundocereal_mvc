<?php
session_start();
require_once __DIR__ . '/../config/Conexion.php';

if (isset($_POST['usuario'], $_POST['password'])) {
    $usuario = $_POST['usuario'];
    $passwordIngresada = $_POST['password'];

    $conexion = Conexion::conectar();

    // Consulta segura con prepared statements
    $consulta = $conexion->prepare("SELECT id, nombre, password, rol FROM persona WHERE nombre = ?");
    $consulta->bind_param("s", $usuario);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        $usuarioData = $resultado->fetch_assoc();

        // Comparación directa de contraseñas (como está en tu base)
        if ($passwordIngresada === $usuarioData['password']) {
            // Guardamos sesión
            $_SESSION['usuario'] = $usuarioData['nombre'];
            $_SESSION['rol'] = $usuarioData['rol'];

            // Redireccionamos según el rol
            if ($_SESSION['rol'] === 'admin') {
                header("Location: ../views/admin_dashboard.php");
            } elseif ($_SESSION['rol'] === 'vendedor') {
                header("Location: ../views/vendedor.php");
            } else {
                echo "Rol no válido.";
            }
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $consulta->close();
    Conexion::desconectar();
} else {
    echo "Por favor completa ambos campos.";
}
?>

