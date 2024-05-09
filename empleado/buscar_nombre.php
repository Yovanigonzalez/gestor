<?php
include '../config/conexion.php';

// Obtener el término de búsqueda del parámetro GET
$q = $_REQUEST["q"];

$sql = "SELECT id, nombre, ap_paterno, ap_materno FROM auto_registro WHERE nombre LIKE '%$q%'";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Output de los resultados
    while ($row = $resultado->fetch_assoc()) {
        $id = $row["id"]; // Obtener el ID del nombre
        $nombre = $row["nombre"];
        $ap_paterno = $row["ap_paterno"];
        $ap_materno = $row["ap_materno"];
        // Output de cada resultado como un botón que puede ser seleccionado
        echo "<button class='btn btn-link' style='color: black;' onclick='seleccionarResultado(\"$id\", \"$nombre\", \"$ap_paterno\", \"$ap_materno\")'>$nombre $ap_paterno $ap_materno</button><br>";
    }
} else {
    echo "No se encontraron resultados";
}

$conn->close();
?>
