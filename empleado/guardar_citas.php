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

    // Recuperar los valores del formulario
    $nombre = $_POST['nombre'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];
    $usuario = $_POST['usuario'];
    $direccion = $_POST['direccion'];
    $numero_interno = $_POST['numero_interno'];
    $numero_externo = $_POST['numero_externo'];
    $codigo_postal = $_POST['codigo_postal'];
    $ciudad = $_POST['ciudad'];
    $whatsapp = $_POST['whatsapp'];
    $estatus = $_POST['estatus'];
    $id_nombre_seleccionado = $_POST['id_nombre_seleccionado'];

    // Verificar si el ID del nombre ya existe en la base de datos
    $sql_verificacion = "SELECT * FROM citas WHERE id_nombre_seleccionado = '$id_nombre_seleccionado'";
    $result_verificacion = $conn->query($sql_verificacion);

    if ($result_verificacion->num_rows > 0) {
        // El ID del nombre ya existe, mostrar mensaje de error
        $_SESSION['mensaje'] = "El cliente ya está registrado";
        $_SESSION['mensaje_tipo'] = "error";
    } else {
        // Preparar la consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO citas (id_nombre_seleccionado, nombre, ap_paterno, ap_materno, telefono, fecha_nacimiento, genero, usuario, direccion, numero_interno, numero_externo, codigo_postal, ciudad, whatsapp, estatus)
        VALUES ('$id_nombre_seleccionado', '$nombre', '$ap_paterno', '$ap_materno', '$telefono', '$fecha_nacimiento', '$genero', '$usuario', '$direccion', '$numero_interno', '$numero_externo', '$codigo_postal', '$ciudad', '$whatsapp', '$estatus')";

        if ($conn->query($sql) === TRUE) {
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
header("Location: registro_citas.php");
exit();
?>
