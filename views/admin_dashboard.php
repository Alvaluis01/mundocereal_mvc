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
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<div class="login-container">
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> (Admin)</h2>

    <h3>Opciones:</h3>
    <a href="inventario.php"><button>Inventario</button></a>
    <a href="dailyform.php"><button>DailyForm</button></a>
    <a href="../controllers/LogoutController.php"><button>Cerrar Sesión</button></a>
</div>
</body>
</html>
