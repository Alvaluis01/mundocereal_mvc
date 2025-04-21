<?php
require_once __DIR__ . '/../../../libs/dompdf/autoload.inc.php';
require_once __DIR__ . '/../../../../config/Conexion.php';

use Dompdf\Dompdf;

// Conectar a la base de datos
$conn = Conexion::conectar();
$query = "SELECT * FROM dailyform"; // Ajusta a tu tabla real
$resultado = $conn->query($query);

// Verificar que haya datos
if ($resultado->num_rows > 0) {
    // Construir contenido HTML
    $html = '
        <h1>Reporte Diario de Ventas - MundoCereal</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Total Ventas</th>
                <th>Fecha</th>
                <th>ID Inventario</th>
            </tr>
    ';

    while ($row = $resultado->fetch_assoc()) {
        $html .= "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['total_ventas']}</td>
                <td>{$row['fecha']}</td>
                <td>{$row['id_Inventario']}</td>
            </tr>
        ";
    }

    $html .= '</table>';

    // Crear la instancia de Dompdf
    $dompdf = new Dompdf();

    // Cargar HTML
    $dompdf->loadHtml($html);

    // Configurar tamaño de papel
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar
    $dompdf->render();

    // Descargar o visualizar el PDF
    $dompdf->stream("DailyForm_MundoCereal.pdf");

} else {
    echo "No hay datos para mostrar.";
}

// Desconectar
Conexion::desconectar();
?>
