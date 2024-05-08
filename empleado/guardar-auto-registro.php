<?php
    session_start(); // Iniciar la sesión si aún no está iniciada

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "getsor";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Procesar los datos del formulario
    $nombre = $_POST['nombre'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $estatura = $_POST['estatura'];
    $alergias = $_POST['alergias'];
    $enfermedades = $_POST['enfermedades'];
    $fracturas = $_POST['fracturas'];
    $antecedentes = $_POST['antecedentes'];
    $otros = $_POST['otros'];

    // Query para insertar los datos en la base de datos
    $sql = "INSERT INTO auto_registro (nombre, ap_paterno, ap_materno, estatura, alergias, enfermedades, fracturas, antecedentes, otros)
            VALUES ('$nombre', '$ap_paterno', '$ap_materno', '$estatura', '$alergias', '$enfermedades', '$fracturas', '$antecedentes', '$otros')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensaje'] = "El registro se guardó correctamente.";
        $_SESSION['mensaje_tipo'] = "success";
    } else {
        $_SESSION['mensaje'] = "Hubo un error al guardar el registro: " . $conn->error;
        $_SESSION['mensaje_tipo'] = "error";
    }

    // Cerrar conexión
    $conn->close();

    // Redirigir de vuelta a auto-registro.php
    header("Location: auto-registro.php");
    exit();
?>
