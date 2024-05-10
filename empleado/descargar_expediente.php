<?php
require_once('../tcpdf/tcpdf.php'); // Asegúrate de proporcionar la ruta correcta al archivo tcpdf.php

// Verificar si se proporcionó un ID de expediente y el nombre del servicio en los parámetros GET
if (!isset($_GET['expediente']) || !isset($_GET['servicio'])) {
    die("No se proporcionó un número de expediente y/o nombre de servicio.");
}

// Obtener el número de expediente y el nombre del servicio de los parámetros GET
$numeroExpediente = $_GET['expediente'];
$servicio = $_GET['servicio'];

// Conexión a la base de datos
include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los detalles del expediente específico
$sql = "SELECT * FROM agenda_citas WHERE numero_expediente = '$numeroExpediente' AND servicio_nombre = '$servicio'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Crear un nuevo objeto TCPDF
    $pdf = new TCPDF();

    // Agregar una página
    $pdf->AddPage();

    // Agregar logo

    // Estilo para el título
    $pdf->SetFont('Helvetica', 'B', 16);
    $pdf->Cell(0, 10, 'Expediente Médico', 0, 1, 'C');
    $pdf->Ln(10); // Salto de línea
    $pdf->Ln(10); // Salto de línea
    $pdf->Ln(10); // Salto de línea

    $pdf->Ln(10); // Salto de línea
    $pdf->Ln(10); // Salto de línea
    $pdf->Image('../log/hospital.png', 10, 20, 40, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

    // Obtener la posición X actual después de agregar la imagen
    $posicionX = $pdf->GetX();

    // Sumar el ancho de la imagen y un margen adicional para dejar espacio
    $posicionX += 10 + 5; // 40 es el ancho de la imagen y 10 es el margen adicional

    // Establecer el tamaño de la fuente para los datos
    $pdf->SetFont('Helvetica', '', 10);

    // Establecer la posición X para el texto de la fecha y hora de estudio
    $pdf->SetX($posicionX);
    $pdf->Cell(0, 10, 'Fecha y Hora de Estudio: ' . $row['fecha_hora_estudio'], 0, 1);

    // Establecer la posición X para el texto del número de expediente
    $pdf->SetX($posicionX);
    $pdf->Cell(0, 10, 'Número de Expediente: ' . $row['numero_expediente'], 0, 1);
        
    $pdf->Ln(10); // Salto de línea
    $pdf->Ln(10); // Salto de línea


    // Estilo para los datos
    // Establecer colores de fondo y texto para las celdas
    $fill = false;
    $fillColor = array(230, 230, 230); // Color de fondo para las celdas alternas
    $textColor = array(50, 50, 50); // Color de texto

    // Crear una tabla
    $pdf->SetFont('Helvetica', '', 12);

    // Nombre del Paciente
    $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
    $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
    $pdf->Cell(50, 10, 'Nombre del Paciente:', 1, 0, 'L', $fill);
    $pdf->Cell(0, 10, $row['nombre_cliente'], 1, 1, 'L', $fill);

    // Apellido Paterno
    $fill = !$fill; // Alternar color de fondo
    $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
    $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
    $pdf->Cell(50, 10, 'Apellido Paterno:', 1, 0, 'L', $fill);
    $pdf->Cell(0, 10, $row['ap_paterno'], 1, 1, 'L', $fill);

    // Apellido Materno
    $fill = !$fill; // Alternar color de fondo
    $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
    $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
    $pdf->Cell(50, 10, 'Apellido Materno:', 1, 0, 'L', $fill);
    $pdf->Cell(0, 10, $row['ap_materno'], 1, 1, 'L', $fill);

    // Estudio
    $fill = !$fill; // Alternar color de fondo
    $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
    $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
    $pdf->Cell(50, 10, 'Estudio:', 1, 0, 'L', $fill);
    $pdf->Cell(0, 10, $row['servicio_nombre'], 1, 1, 'L', $fill);

    // Razón
    $fill = !$fill; // Alternar color de fondo
    $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
    $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
    $pdf->Cell(50, 10, 'Razón:', 1, 0, 'L', $fill);
    $pdf->Cell(0, 10, $row['razon'], 1, 1, 'L', $fill);

    // Precio
    $fill = !$fill; // Alternar color de fondo
    $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
    $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
    $pdf->Cell(50, 10, 'Precio:', 1, 0, 'L', $fill);
    $pdf->Cell(0, 10, $row['precio'], 1, 1, 'L', $fill);

    // Duración
    $fill = !$fill; // Alternar color de fondo
    $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);
    $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
    $pdf->Cell(50, 10, 'Duración:', 1, 0, 'L', $fill);
    $pdf->Cell(0, 10, $row['duracion'], 1, 1, 'L', $fill);

    // Línea de separación
    $pdf->SetLineWidth(0.5);
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
    $pdf->Ln(10); // Salto de línea

    // Estilo para el pie de página
    $pdf->SetFont('Helvetica', 'I', 10);
    $pdf->Cell(0, 10, 'Expediente generado el ' . date('d/m/Y H:i:s'), 0, 1, 'C');

    // Salida del PDF (descarga)
    $pdf->Output('expediente_' . $numeroExpediente . '_' . $servicio . '.pdf', 'D');
} else {
    echo "No se encontraron datos para el expediente con número: " . $numeroExpediente . " y servicio: " . $servicio;
}

$conn->close();
?>
