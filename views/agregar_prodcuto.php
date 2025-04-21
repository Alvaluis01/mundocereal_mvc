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
    <h2>Agregar Producto al Inventario</h2>

    <form action="../controllers/AgregarProductoController.php" method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Precio Unitario: <input type="number" name="precioUnitario" step="0.01" required><br>
        Cantidad: <input type="number" name="cantidad" required><br>
        Fecha de Caducidad: <input type="date" name="fechaCaducidad" required><br>
        Lote: <input type="text" name="lote" required><br>
        <button type="submit">Agregar Producto</button>
    </form>

    <br>
    <a href="../controllers/InventarioController.php?accion=ver"><button>Ver Inventario</button></a>
    <a href="../controllers/InventarioController.php?accion=dailyform"><button>Daily Form</button></a>
    <a href="../controllers/InventarioController.php"><button>Volver al Menú Principal</button></a>
</div>
</body>
</html>
