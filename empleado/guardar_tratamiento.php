<?php
// Verifica si se recibieron los datos del formulario correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Incluye el archivo de conexión a la base de datos
    include '../config/conexion.php';
    
    // Recupera los datos del formulario
    $expediente = $_POST['expediente'];
    $servicio = $_POST['servicio'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $razon = $_POST['razon'];
    $id_nombre_seleccionado = $_POST['id_nombre_seleccionado'];
    $resultados = $_POST['resultados'];
    $descripcion = $_POST['descripcion'];
    $recomendaciones = $_POST['recomendaciones'];
    $medicamentos = $_POST['medicamentos'];
    $progreso = $_POST['progreso'];
    $folio_diagnostico = $_POST['folio_diagnostico'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    
    // Query para insertar los datos en la tabla de tratamientos
    $sql = "INSERT INTO tabla_tratamiento (expediente, servicio, nombre_cliente, ap_paterno, ap_materno, razon, id_nombre_seleccionado, resultados, descripcion, recomendaciones, medicamentos, progreso, folio_diagnostico, fecha_inicio, fecha_fin) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Preparar la sentencia
    $stmt = $conn->prepare($sql);
    
    // Vincular los parámetros
    $stmt->bind_param("sssssssssssssss", $expediente, $servicio, $nombre_cliente, $ap_paterno, $ap_materno, $razon, $id_nombre_seleccionado, $resultados, $descripcion, $recomendaciones, $medicamentos, $progreso, $folio_diagnostico, $fecha_inicio, $fecha_fin);
    
    // Ejecutar la sentencia
    if ($stmt->execute()) {
        echo "Tratamiento registrado correctamente.";
    } else {
        echo "Error al registrar el tratamiento: " . $conn->error;
    }
    
    // Cerrar la conexión y la sentencia
    $stmt->close();
    $conn->close();
    
} else {
    // Si no es una solicitud POST, redireccionar o mostrar un mensaje de error apropiado
    echo "Error: Método de solicitud incorrecto.";
}
?>
