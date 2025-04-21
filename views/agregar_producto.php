<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<div class="login-container">
    <h2>Agregar Producto</h2>

    <form action="../controllers/AgregarProductoController.php" method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Precio Unitario: <input type="number" name="precioUnitario" step="0.01" required><br>
        Cantidad: <input type="number" name="cantidad" required><br>
        Fecha de Caducidad: <input type="date" name="fechaCaducidad" required><br>
        Lote: <input type="text" name="lote" required><br>
        ID Inventario: <input type="number" name="id_inventario" required><br>
        <button type="submit">Agregar</button>
    </form>

    <br>
    <a href="inventario.php"><button>Volver</button></a>
</div>
</body>
</html>
