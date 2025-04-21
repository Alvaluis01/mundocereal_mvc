<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

require_once '../config/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conexion = Conexion::conectar();

    $nombre = $_POST['nombre'];
    $precioUnitario = $_POST['precioUnitario'];
    $cantidad = $_POST['cantidad'];
    $fechaCaducidad = $_POST['fechaCaducidad'];
    $lote = $_POST['lote'];

    $stmt = $conexion->prepare("INSERT INTO product (nombre, precioUnitario, cantidad, fechaCaducidad, lote, id_inventario) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdissi", $nombre, $precioUnitario, $cantidad, $fechaCaducidad, $lote, $id_inventario);

    if ($stmt->execute()) {
        header("Location: ../views/inventario.php");
    } else {
        echo "Error al agregar producto: " . $stmt->error;
    }

    $stmt->close();
    Conexion::desconectar();
}
?>
