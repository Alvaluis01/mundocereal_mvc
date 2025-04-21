<?php
// Redirigir a la DIAN
header("Location: https://catalogo-vpfe.dian.gov.co/User/Login");
exit();
define('ACCESO_PERMITIDO', true);
require_once '../models/Conexion.php';
$conn = Conexion::conectar();
?>
