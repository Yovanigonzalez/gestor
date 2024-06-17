<?php
// Asegúrate de proporcionar la ruta correcta al archivo tcpdf.php
require_once('../tcpdf/tcpdf.php');

// Verificar si se recibió el número de folio_diagnostico
if(isset($_GET['folio_diagnostico'])) {
    // Obtener el número de folio_diagnostico de la URL
    $folio_diagnostico = $_GET['folio_diagnostico'];
    
    // Conexión a la base de datos
    include '../config/conexion.php';

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para obtener todos los detalles del expediente seleccionado por folio_diagnostico
    $sql = "SELECT * FROM tabla_tratamiento WHERE folio_diagnostico = '$folio_diagnostico'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Crear un nuevo objeto TCPDF
        $pdf = new TCPDF();

        // Agregar una página
        $pdf->AddPage();

        // Agregar logo
        $pdf->Image('../log/hospital.png', 10, 10, 40, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        // Estilo para el título
        $pdf->SetFont('Helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'INFORME DE DIAGNÓSTICO MÉDICO', 0, 1, 'C');
        $pdf->Ln(10);

        // Agregar el encabezado
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'FOLIO DIAGNÓSTICO: ' . $folio_diagnostico, 0, 1, 'R');
        $pdf->Ln(10);

        // Estilo para los datos
        $pdf->SetFont('Helvetica', '', 10);
        $fill = false;
        $fillColor = array(230, 230, 230);
        $textColor = array(50, 50, 50);

        // Agregar contenido al PDF
        while($row = $result->fetch_assoc()) {
            // Nombre y apellidos
            $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
            $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
            $pdf->Cell(50, 10, 'NOMBRE DEL PACIENTE:', 1, 0, 'L', $fill);
            $pdf->Cell(0, 10, $row['nombre_cliente'] . ' ' . $row['ap_paterno'] . ' ' . $row['ap_materno'], 1, 1, 'L', $fill);
            
            $fill = !$fill; // Alternar color de fondo

            // Descripción
            $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
            $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
            $pdf->Cell(50, 10, 'DESCRIPCIÓN:', 1, 0, 'L', $fill);
            $pdf->MultiCell(0, 10, $row['razon'], 1, 'L', $fill);
            
            $fill = !$fill; // Alternar color de fondo

            // Medicamentos
            $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
            $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
            $pdf->Cell(50, 10, 'MEDICAMENTOS:', 1, 0, 'L', $fill);
            $medicamentos = explode("\n", $row['medicamentos']);
            foreach ($medicamentos as $medicamento) {
                $pdf->Cell(0, 10, '- ' . $medicamento, 1, 1, 'L', $fill);
                $fill = !$fill; // Alternar color de fondo
            }

            // Recomendaciones
            $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
            $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
            $pdf->Cell(50, 10, 'RECOMENDACIONES:', 1, 0, 'L', $fill);
            $pdf->MultiCell(0, 10, $row['recomendaciones'], 1, 'L', $fill);

            $fill = !$fill; // Alternar color de fondo

            // Fechas
            $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
            $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
            $pdf->Cell(50, 10, 'FECHA INICIO:', 1, 0, 'L', $fill);
            $pdf->Cell(0, 10, $row['fecha_inicio'], 1, 1, 'L', $fill);

            $fill = !$fill; // Alternar color de fondo

            $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
            $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
            $pdf->Cell(50, 10, 'FECHA FIN:', 1, 0, 'L', $fill);
            $pdf->Cell(0, 10, $row['fecha_fin'], 1, 1, 'L', $fill);

            // Línea de separación
            $pdf->SetLineWidth(0.5);
            $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
            $pdf->Ln(10); // Salto de línea
        }

        // Estilo para el pie de página
        $pdf->SetFont('Helvetica', 'I', 10);
        $pdf->Cell(0, 10, 'INFORME GENERADO EL DIA ' . date('d/m/Y H:i:s'), 0, 1, 'C');

        // Generar el PDF
        $pdf->Output('INFORME_DIAGNOSTICO_' . $folio_diagnostico . '.pdf', 'D');
    } else {
        echo "NO SE ENCONTRARON DETALLES DEL EXPEDINTE SELECCIONADO.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Número de folio_diagnostico no especificado.";
}
?>
