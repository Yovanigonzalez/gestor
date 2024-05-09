<?php
// Iniciar sesión si no se ha iniciado ya
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer las variables con los datos del formulario
    $fechaHora = $_POST["fecha_hora"];
    $doctor = $_POST["usuario"];
    $nombreCliente = $_POST["nombre"];
    $apPaterno = $_POST["ap_paterno"];
    $apMaterno = $_POST["ap_materno"];
    $idNombreSeleccionado = $_POST["id_nombre_seleccionado"];
    $idServicio = $_POST["servicio"];
    $fechaEstudio = $_POST["fecha_estudio"];
    $razon = $_POST["razon"];
    $numExpediente = $_POST["num_expediente"];

    // Aquí debes realizar la validación de los datos recibidos, asegurándote de que no estén vacíos y cumpliendo con los criterios necesarios

    // Incluir el archivo de conexión a la base de datos
    include "../config/conexion.php";

    // Preparar la consulta SQL para insertar la cita en la base de datos
    $sql = "INSERT INTO citas_clientes (fecha_hora, doctor, nombre_cliente, ap_paterno, ap_materno, id_nombre_seleccionado, id_servicio, fecha_estudio, razon, num_expediente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt) {
        // Vincular los parámetros de la consulta
        $stmt->bind_param("ssssssisss", $fechaHora, $doctor, $nombreCliente, $apPaterno, $apMaterno, $idNombreSeleccionado, $idServicio, $fechaEstudio, $razon, $numExpediente);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // La cita se ha guardado correctamente
            $_SESSION['mensaje'] = "La cita se ha registrado correctamente.";
            $_SESSION['mensaje_tipo'] = "success";
        } else {
            // Error al ejecutar la consulta
            $_SESSION['mensaje'] = "Ocurrió un error al guardar la cita: " . $stmt->error;
            $_SESSION['mensaje_tipo'] = "error";
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        // Error al preparar la consulta
        $_SESSION['mensaje'] = "Ocurrió un error al guardar la cita: " . $conn->error;
        $_SESSION['mensaje_tipo'] = "error";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();

    // Redireccionar de vuelta al formulario de registro de citas
    header("Location: citas.php");
    exit();
} else {
    // Si se accede a este script sin enviar el formulario, redireccionar de vuelta al formulario
    header("Location: citas.php");
    exit();
}
?>
