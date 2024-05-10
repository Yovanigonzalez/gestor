<?php
session_start(); // Inicia la sesión si no está iniciada

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (cambia estos valores según tu configuración)
    include '../config/conexion.php';

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Recuperar el valor de id_nombre_seleccionado enviado por el formulario
    $id_nombre_seleccionado = $_POST['id_nombre_seleccionado'];

    // Verificar si el ID del nombre ya existe en la base de datos
    $sql_verificacion = "SELECT * FROM registro_clientes WHERE id_nombre_seleccionado = '$id_nombre_seleccionado'";
    $result_verificacion = $conn->query($sql_verificacion);

    if ($result_verificacion->num_rows > 0) {
        // Si ya existe un registro con el mismo id_nombre_seleccionado, mostrar mensaje de error
        $_SESSION['mensaje'] = "El cliente ya está registrado y ya tiene numero de expediente";
        $_SESSION['mensaje_tipo'] = "error";
    } else {
        // Si no hay registros con el mismo id_nombre_seleccionado, proceder con la inserción

        // Recuperar los demás valores del formulario
        $nombre = $_POST['nombre'];
        $ap_paterno = $_POST['ap_paterno'];
        $ap_materno = $_POST['ap_materno'];
        $telefono = $_POST['telefono'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $genero = $_POST['genero'];
        $direccion = $_POST['direccion'];
        $numero_interno = $_POST['numero_interno'];
        $numero_externo = $_POST['numero_externo'];
        $codigo_postal = $_POST['codigo_postal'];
        $ciudad = $_POST['ciudad'];
        $whatsapp = $_POST['whatsapp'];
        $estatus = $_POST['estatus'];

        // Obtener el siguiente número de expediente disponible
        $sql_max_expediente = "SELECT MAX(numero_expediente) AS max_expediente FROM registro_clientes";
        $result_max_expediente = $conn->query($sql_max_expediente);
        $row_max_expediente = $result_max_expediente->fetch_assoc();
        $siguiente_expediente = ($row_max_expediente['max_expediente'] ?? 0) + 1;

        // Preparar la consulta SQL para insertar los datos en la tabla
        $sql_insert = "INSERT INTO registro_clientes (id_nombre_seleccionado, nombre, ap_paterno, ap_materno, telefono, fecha_nacimiento, genero, numero_expediente, direccion, numero_interno, numero_externo, codigo_postal, ciudad, whatsapp, estatus)
        VALUES ('$id_nombre_seleccionado', '$nombre', '$ap_paterno', '$ap_materno', '$telefono', '$fecha_nacimiento', '$genero', '$siguiente_expediente', '$direccion', '$numero_interno', '$numero_externo', '$codigo_postal', '$ciudad', '$whatsapp', '$estatus')";

        if ($conn->query($sql_insert) === TRUE) {
            // Almacena el mensaje de éxito en una variable de sesión
            $_SESSION['mensaje'] = "Cliente registrado exitosamente";
            $_SESSION['mensaje_tipo'] = "success";
        } else {
            // Almacena el mensaje de error en una variable de sesión
            $_SESSION['mensaje'] = "Error al registrar el cliente: " . $conn->error;
            $_SESSION['mensaje_tipo'] = "error";
        }
    }

    // Cerrar conexión
    $conn->close();
} else {
    // Si no se ha enviado el formulario correctamente, redirigir a una página de error o realizar alguna otra acción
    header("Location: 500.php");
    exit();
}

// Redirigir de vuelta a registrar_citas.php
header("Location: registro_clientes.php");
exit();
?>
