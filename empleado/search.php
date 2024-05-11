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

    // Consulta SQL para buscar en la columna 'numero_expediente'
    $sql = "SELECT nombre_cliente, ap_paterno, ap_materno, servicio_nombre, fecha_hora_estudio, razon, numero_expediente, precio, duracion, id_nombre_seleccionado FROM agenda_citas WHERE numero_expediente LIKE '%$numeroExpediente%' ORDER BY fecha_hora_estudio DESC";

    $result = $conn->query($sql);

    // Mostrar los resultados en una tabla
    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo "<thead><tr><th>Nombre Cliente</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Servicio Nombre</th><th>Fecha y Hora de Estudio</th><th>Razón</th><th>Número de Expediente</th><th>Precio</th><th>Duración</th><th>Diagnóstico</th><th>Descargar Expediente</th></tr></thead>";
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["nombre_cliente"]."</td>";
            echo "<td>".$row["ap_paterno"]."</td>";
            echo "<td>".$row["ap_materno"]."</td>";
            echo "<td>".$row["servicio_nombre"]."</td>";
            echo "<td>".$row["fecha_hora_estudio"]."</td>";
            echo "<td>".$row["razon"]."</td>";
            echo "<td>".$row["numero_expediente"]."</td>";
            echo "<td>".$row["precio"]."</td>";
            echo "<td>".$row["duracion"]."</td>";
            echo "<td style='text-align: center;'><a href='diagnostico.php?expediente=".$row["numero_expediente"]."&servicio=".$row["servicio_nombre"]."&nombre_cliente=".$row["nombre_cliente"]."&ap_paterno=".$row["ap_paterno"]."&ap_materno=".$row["ap_materno"]."&razon=".$row["razon"]."&id_nombre_seleccionado=".$row["id_nombre_seleccionado"]."'><img src='../imgs/diagnostico.png' alt='Diagnóstico' width='30' height='30'></a></td>";
            echo "<td style='text-align: center;'><a href='descargar_expediente.php?expediente=".$row["numero_expediente"]."&servicio=".$row["servicio_nombre"]."'><img src='../imgs/pdf.png' alt='Descargar' width='30' height='30'></a></td>";
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
