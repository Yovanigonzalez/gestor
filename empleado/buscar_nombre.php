<?php
include '../config/conexion.php';

// Obtener el término de búsqueda del parámetro GET
$q = $_REQUEST["q"];

$sql = "SELECT id, id_nombre_seleccionado, nombre, ap_paterno, ap_materno, numero_expediente FROM registro_clientes WHERE nombre LIKE '%$q%'";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Output de los resultados
    while ($row = $resultado->fetch_assoc()) {
        $id = $row["id"]; // Obtener el ID del nombre
        $id_nombre_seleccionado = $row["id_nombre_seleccionado"];
        $nombre = $row["nombre"];
        $ap_paterno = $row["ap_paterno"];
        $ap_materno = $row["ap_materno"];
        $numero_expediente = $row["numero_expediente"];
        // Output de cada resultado como un botón que puede ser seleccionado
        echo "<button class='btn btn-link' style='color: black;' onclick='seleccionarResultado(\"$id\", \"$nombre\", \"$ap_paterno\", \"$ap_materno\", \"$numero_expediente\", \"$id_nombre_seleccionado\")'>$nombre $ap_paterno $ap_materno</button>";
        // Campo oculto para almacenar el número de expediente y el id_nombre_seleccionado
        echo "<input type='hidden' id='expediente_$id' value='$numero_expediente'>";
        echo "<input type='hidden' id='id_nombre_seleccionado_$id' value='$id_nombre_seleccionado'>";
        echo "<br>";
    }
} else {
    echo "No se encontraron resultados";
}

$conn->close();
?>
