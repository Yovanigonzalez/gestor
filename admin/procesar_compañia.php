<?php
session_start(); // Inicia la sesión si aún no está iniciada

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $id_empleado = $_POST["id_empleado"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $sector_industrial = $_POST["sector_industrial"];
    $direccion1 = $_POST["direccion1"];
    $direccion2 = $_POST["direccion2"];
    $sitio_web = $_POST["sitio_web"];
    $whatsapp = $_POST["whatsapp"];
    $numero_interno = $_POST["numero_interno"];
    $numero_externo = $_POST["numero_externo"];
    $codigo_postal = $_POST["codigo_postal"];
    $ciudad = $_POST["ciudad"];
    $estatus = $_POST["estatus"];

    // Aquí puedes realizar las validaciones necesarias antes de guardar los datos en la base de datos

    // Conexión a la base de datos (debes configurar estos valores según tu entorno)
    include '../config/conexion.php';
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verificar si ya existe un registro con el mismo id_empleado
    $sql_verificar = "SELECT * FROM compañia WHERE id_empleado = '$id_empleado'";
    $result_verificar = $conn->query($sql_verificar);
    if ($result_verificar->num_rows > 0) {
        // Si ya existe un registro con el mismo id_empleado, configurar un mensaje de error
        $_SESSION['mensaje_tipo'] = 'error';
        $_SESSION['mensaje'] = 'Ya existe un registro con el mismo mismo nombre del empleado.';
    } else {
        // Preparar la consulta SQL
        $sql = "INSERT INTO compañia (id_empleado, nombre, email, telefono, sector_industrial, direccion1, direccion2, sitio_web, whatsapp, numero_interno, numero_externo, codigo_postal, ciudad, estatus) VALUES ('$id_empleado', '$nombre', '$email', '$telefono', '$sector_industrial', '$direccion1', '$direccion2', '$sitio_web', '$whatsapp', '$numero_interno', '$numero_externo', '$codigo_postal', '$ciudad', '$estatus')";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            // Si la inserción fue exitosa, configurar un mensaje de éxito
            $_SESSION['mensaje_tipo'] = 'success';
            $_SESSION['mensaje'] = '¡La compañía se registró correctamente!';
        } else {
            // Si hubo un error en la inserción, configurar un mensaje de error
            $_SESSION['mensaje_tipo'] = 'error';
            $_SESSION['mensaje'] = 'Hubo un error al registrar la compañía: ' . $conn->error;
        }
    }

    // Cerrar la conexión
    $conn->close();

    // Redirigir al usuario de vuelta al formulario de registro
    header("Location: compañia.php");
    exit(); // Asegura que el script se detenga después de la redirección
}
?>
