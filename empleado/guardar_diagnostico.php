<?php
// Incluye el archivo de configuración para establecer la conexión a la base de datos (reemplaza los valores con los correspondientes a tu configuración)
include '../config/conexion.php';

// Verifica si se enviaron los datos del formulario mediante el método POST
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

    // Prepara la consulta SQL para insertar los datos en la tabla correspondiente
    $sql = "INSERT INTO tabla_diagnostico (expediente, servicio, nombre_cliente, ap_paterno, ap_materno, razon, id_nombre_seleccionado, resultados) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepara la declaración
    $stmt = $conn->prepare($sql);

    // Verifica si la preparación de la consulta fue exitosa
    if ($stmt) {
        // Vincula los parámetros
        $stmt->bind_param("isssssis", $expediente, $servicio, $nombre_cliente, $ap_paterno, $ap_materno, $razon, $id_nombre_seleccionado, $resultados);

        // Ejecuta la declaración
        if ($stmt->execute()) {
            // Obtiene el ID del último registro insertado
            $last_id = $conn->insert_id;

            // Cierra la declaración
            $stmt->close();

            // Cierra la conexión
            $conn->close();

            // Introduce un retraso de 3 segundos
            sleep(1);

            // Redirige a tratamiento.php con el ID del último registro insertado
            header("Location: tratamiento.php?id=$last_id&mensaje=LOS+DATOS+SE+HAN+GUARDADO+CORRECTAMENTE&tipo_exito=success");
            exit(); // Asegura que no haya más ejecución después de la redirección
        } else {
            // Redirige a diagnostico.php con un mensaje de error si falla la ejecución de la consulta
            header("Location: diagnostico.php?mensaje=ERROR+AL+INTENTAR+GUARDAR+LOS+DATOS%3A+" . urlencode($stmt->error) . "&tipo_error=danger");
            exit(); // Asegura que no haya más ejecución después de la redirección
        }
    } else {
        // Redirige a diagnostico.php con un mensaje de error si falla la preparación de la consulta
        header("Location: diagnostico.php?mensaje=ERROR+AL+PREPARAR+LA+CONSULTA&tipo_error=danger");
        exit(); // Asegura que no haya más ejecución después de la redirección
    }
} else {
    // Redirige a diagnostico.php con un mensaje de error si no se reciben datos del formulario
    header("Location: diagnostico.php?mensaje=Error%3A+NO+SE+RECIBIERON+DATOS+DEL+FORMULARIO&tipo_error=danger");
    exit(); // Asegura que no haya más ejecución después de la redirección
}
?>
