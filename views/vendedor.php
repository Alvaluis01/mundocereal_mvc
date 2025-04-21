<?php
session_start();
if ($_SESSION['rol'] != 'vendedor') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel de Vendedor</title>
    <link rel="stylesheet" href="../public/css/panel.css">
</head>
<body>
    
    <nav>
        <ul>
            <li><a href="factura.php">Generar Factura</a></li>
            <li><a href="../controllers/LogoutController.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
</body>
</html>