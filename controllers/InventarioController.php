<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

require_once '../config/Conexion.php';

$conexion = Conexion::conectar();

$accion = isset($_GET['accion']) ? $_GET['accion'] : '';

if ($accion === 'ver') {
    $consulta = $conexion->query("SELECT * FROM product");
    $productos = $consulta->fetch_all(MYSQLI_ASSOC);

    // Se pasa la variable a la vista
    include '../views/ver_productos.php';

} else {
    // Si no hay acción válida, redirige de vuelta
    header("Location: ../views/inventario.php");
    exit();
}

Conexion::desconectar();
?>


