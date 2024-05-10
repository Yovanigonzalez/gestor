<?php
// Establecer la conexión a la base de datos (reemplaza los valores con los correspondientes a tu configuración)
include '../config/conexion.php';

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $expediente = $_POST['expediente'];
    $servicio = $_POST['servicio'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $razon = $_POST['razon'];
    $id_nombre_seleccionado = $_POST['id_nombre_seleccionado'];
    $resultados = $_POST['resultados'];

    // Preparar la consulta SQL para insertar los datos en la tabla correspondiente
    $sql = "INSERT INTO tabla_diagnostico (expediente, servicio, nombre_cliente, ap_paterno, ap_materno, razon, id_nombre_seleccionado, resultados) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Preparar la declaración
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("isssssis", $expediente, $servicio, $nombre_cliente, $ap_paterno, $ap_materno, $razon, $id_nombre_seleccionado, $resultados);

    // Ejecutar la declaración
    if ($stmt->execute()) {
        echo "Los datos se guardaron correctamente en la base de datos.";
    } else {
        echo "Error al intentar guardar los datos: " . $conn->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Error: No se recibieron datos del formulario.";
}
?>
