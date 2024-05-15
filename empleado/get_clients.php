<?php
// Conexión a la base de datos
include '../config/conexion.php';

// Comprobar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta para obtener los datos de los clientes
$sql = "SELECT id, nombre, ap_paterno, ap_materno, estatura, alergias, enfermedades, fracturas, antecedentes, otros FROM auto_registro";
$result = $conn->query($sql);

// Mostrar los datos en formato de tabla HTML
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["ap_paterno"] . "</td>";
        echo "<td>" . $row["ap_materno"] . "</td>";
        echo "<td>" . $row["estatura"] . "</td>";
        echo "<td>" . $row["alergias"] . "</td>";
        echo "<td>" . $row["enfermedades"] . "</td>";
        echo "<td>" . $row["fracturas"] . "</td>";
        echo "<td>" . $row["antecedentes"] . "</td>";
        echo "<td>" . $row["otros"] . "</td>";
        echo "<td><a href='e_empleado.php?id=" . $row["id"] . "' class='btn btn-primary'>Editar</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='11'>No se encontraron clientes</td></tr>";
}
$conn->close();
?>

