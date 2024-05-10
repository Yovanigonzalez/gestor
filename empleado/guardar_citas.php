<?php
// Incluir el archivo de conexión a la base de datos
include '../config/conexion.php';

// Establecer el huso horario a GMT-6 (Ciudad de México)
date_default_timezone_set('America/Mexico_City');

// Obtener la fecha y hora actual en el formato de 12 horas, restando una hora manualmente
$fecha_hora_actual = date("Y-m-d h:i:s A", strtotime('-1 hour'));

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recibir y limpiar los datos del formulario
    $doctor = $_POST['usuario'];
    $id_nombre_seleccionado = $_POST['id_nombre_seleccionado']; // Obtener el ID del nombre seleccionado
    $nombre_cliente = $_POST['nombre'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $servicio_nombre = $_POST['servicio']; // Aquí se obtiene el nombre del servicio seleccionado
    $fecha_hora_estudio = $_POST['fecha_hora_estudio']; // Recibir la fecha y hora para el estudio
    $razon = $_POST['razon'];
    $numero_expediente = $_POST['expediente'];
    $precio = $_POST['precio']; // Obtener el precio del servicio seleccionado
    $duracion = $_POST['duracion']; // Obtener la duración del servicio seleccionado
    $compania = $_POST['compania']; // Obtener la compañía del servicio seleccionado
    $estatus = $_POST['estatus']; // Obtener el estatus del servicio seleccionado
    
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO agenda_citas (fecha_hora, doctor, id_nombre_seleccionado, nombre_cliente, ap_paterno, ap_materno, servicio_nombre, fecha_hora_estudio, razon, numero_expediente, precio, duracion, compania, estatus) 
            VALUES ('$fecha_hora_actual', '$doctor', '$id_nombre_seleccionado', '$nombre_cliente', '$ap_paterno', '$ap_materno', '$servicio_nombre', '$fecha_hora_estudio', '$razon', '$numero_expediente', '$precio', '$duracion', '$compania', '$estatus')";
    
    if ($conn->query($sql) === TRUE) {
        // Éxito al guardar la cita
        header("Location: citas.php?mensaje=Cita+guardada+correctamente.&tipo_exito=success");
    } else {
        // Error al guardar la cita
        header("Location: citas.php?mensaje=Error+al+guardar+la+cita:+$conn->error.&tipo_error=danger");
    }
    
    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
