<?php
// Aquí no es necesario session_start() ya que viene desde el controller que ya tiene la sesión iniciada
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario Actual</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<div class="login-container">
    <h2>Productos en Inventario</h2>

    <?php if (!empty($productos)) : ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Fecha de Caducidad</th>
                <th>Lote</th>
            </tr>
            <?php foreach ($productos as $producto) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto['id']); ?></td>
                    <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($producto['precioUnitario']); ?></td>
                    <td><?php echo htmlspecialchars($producto['cantidad']); ?></td>
                    <td><?php echo htmlspecialchars($producto['fechaCaducidad']); ?></td>
                    <td><?php echo htmlspecialchars($producto['lote']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No hay productos registrados.</p>
    <?php endif; ?>

    <!-- Corrección aquí -->
    <a href="/mundocereal_mvc/views/inventario.php"><button>Volver</button></a>
</div>
</body>
</html>
