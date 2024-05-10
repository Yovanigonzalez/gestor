<?php
// Incluir el archivo de conexión a la base de datos
include '../config/conexion.php';

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recibir y limpiar los datos del formulario
    $fecha_hora = $_POST['fecha_hora'];
    $doctor = $_POST['usuario'];
    $nombre_cliente = $_POST['nombre'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $servicio_nombre = $_POST['servicio']; // Aquí se obtiene el nombre del servicio seleccionado
    $fecha_estudio = $_POST['fecha_estudio'];
    $razon = $_POST['razon'];
    $numero_expediente = $_POST['expediente'];
    $precio = $_POST['precio']; // Obtener el precio del servicio seleccionado
    $duracion = $_POST['duracion']; // Obtener la duración del servicio seleccionado
    $compania = $_POST['compania']; // Obtener la compañía del servicio seleccionado
    $estatus = $_POST['estatus']; // Obtener el estatus del servicio seleccionado
    
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO agenda_citas (fecha_hora, doctor, nombre_cliente, ap_paterno, ap_materno, servicio_nombre, fecha_estudio, razon, numero_expediente, precio, duracion, compania, estatus) 
            VALUES ('$fecha_hora', '$doctor', '$nombre_cliente', '$ap_paterno', '$ap_materno', '$servicio_nombre', '$fecha_estudio', '$razon', '$numero_expediente', '$precio', '$duracion', '$compania', '$estatus')";
    
    if ($conn->query($sql) === TRUE) {
        // Éxito al guardar la cita
        echo "Cita guardada correctamente.";
    } else {
        // Error al guardar la cita
        echo "Error al guardar la cita: " . $conn->error;
    }
    
    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
