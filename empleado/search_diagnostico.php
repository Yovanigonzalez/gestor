<?php
// Conexión a la base de datos
include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibió un número de expediente por AJAX
if (isset($_POST['searchTerm'])) {
    // Obtener el número de expediente enviado por AJAX
    $numeroExpediente = $_POST['searchTerm'];

    // Consulta SQL para buscar en la columna 'expediente'
    $sql = "SELECT nombre_cliente, ap_paterno, ap_materno, expediente, folio_diagnostico FROM tabla_tratamiento WHERE expediente LIKE '%$numeroExpediente%' ORDER BY fecha_creacion DESC";

    $result = $conn->query($sql);

    // Mostrar los resultados en una tabla
    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo "<thead><tr><th>Nombre Cliente</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Número de Expediente</th><th>Folio Diagnóstico</th><th>Descargar Expediente</th></tr></thead>";
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["nombre_cliente"]."</td>";
            echo "<td>".$row["ap_paterno"]."</td>";
            echo "<td>".$row["ap_materno"]."</td>";
            echo "<td>".$row["expediente"]."</td>";
            echo "<td>".$row["folio_diagnostico"]."</td>";
            echo "<td style='text-align: center;'><a href='descargar_diagnostico.php?folio_diagnostico=".$row["folio_diagnostico"]."'><img src='../imgs/pdf.png' alt='Descargar' width='30' height='30'></a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No se encontraron resultados";
    }
} else {
    echo "No se recibió un número de expediente.";
}

$conn->close();
?>
