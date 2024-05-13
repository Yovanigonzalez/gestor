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
        // Crear una nueva instancia de TCPDF
        $pdf = new TCPDF();
        
        // Establecer propiedades del documento
        $pdf->SetCreator('Diagnóstico Médico');
        $pdf->SetAuthor('Tu Clínica');
        $pdf->SetTitle('Informe de Diagnóstico Médico');
        $pdf->SetSubject('Informe de Diagnóstico');
        $pdf->SetKeywords('diagnóstico, médico, clínica');

        // Agregar una página
        $pdf->AddPage();

        // Establecer el estilo del texto
        $pdf->SetFont('helvetica', '', 12);

        // Agregar el encabezado
        $pdf->Cell(0, 10, 'Folio Diagnóstico: ' . $folio_diagnostico, 0, 1, 'R');
        $pdf->Ln(10);

        // Agregar contenido al PDF
        while($row = $result->fetch_assoc()) {
            // Nombre y apellidos
            $pdf->Cell(0, 10, $row['nombre_cliente'] . ' ' . $row['ap_paterno'] . ' ' . $row['ap_materno'], 0, 1);
            
            // Línea horizontal
            $pdf->Cell(0, 0, '', 'T', 1, 'C');

            // Descripción
            $pdf->Cell(0, 10, 'DESCRIPCIÓN:', 0, 1);
            $pdf->MultiCell(0, 10, $row['razon'], 0, 'L', false);
            
            // Línea horizontal
            $pdf->Cell(0, 0, '', 'T', 1, 'C');

            // Medicamentos
            // Medicamentos
            $pdf->Cell(0, 10, 'MEDICAMENTOS:', 0, 1);
            $medicamentos = explode("\n", $row['medicamentos']); // Convertir la lista en un array
            foreach ($medicamentos as $medicamento) {
                $pdf->Cell(0, 10, '- ' . $medicamento, 0, 1, 'L');
            }

            // Recomendaciones
            $pdf->Cell(0, 10, 'RECOMENDACIONES:', 0, 1);
            $pdf->MultiCell(0, 10, $row['recomendaciones'], 0, 'L', false);
            
            

            // Línea horizontal
            $pdf->Cell(0, 0, '', 'T', 1, 'C');
            
            // Fechas
            $pdf->Cell(0, 10, 'FECHA INCIO: ' . $row['fecha_inicio'], 0, 1);
            $pdf->Cell(0, 10, 'FECHA FIN: ' . $row['fecha_fin'], 0, 1);
            
            // Línea horizontal
            $pdf->Cell(0, 0, '', 'T', 1, 'C');
        }

        // Generar el PDF
        $content = $pdf->Output('', 'S');
        
        // Descargar el PDF con el nombre 'expediente.pdf'
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="expediente.pdf"');
        echo $content;
    } else {
        // Si no se encontraron detalles para el expediente, mostrar un mensaje de error
        echo "No se encontraron detalles para el expediente seleccionado.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibió el número de folio_diagnostico, redirigir o mostrar un mensaje de error
    echo "Número de folio_diagnostico no especificado.";
}
?>