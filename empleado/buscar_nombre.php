<?php
// Conexión a la base de datos
include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre enviado por POST
$nombre = $_POST['nombre'];

// Realizar la consulta a la base de datos
$sql = "SELECT nombre, ap_paterno, ap_materno FROM auto_registro WHERE nombre LIKE '%$nombre%'";
$result = $conn->query($sql);

// Crear un array para almacenar los resultados
$resultados = array();

// Procesar los resultados y almacenarlos en el array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $resultados[] = $row;
    }
}

// Devolver los resultados en formato JSON
echo json_encode($resultados);

// Cerrar la conexión a la base de datos
$conn->close();
?>
