<?php
session_start(); // Iniciar la sesión si aún no está iniciada

include '../config/conexion.php';

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

// Query para verificar si ya existe un registro con los mismos datos
$check_query = "SELECT * FROM auto_registro WHERE nombre = '$nombre' AND ap_paterno = '$ap_paterno' AND ap_materno = '$ap_materno'";
$check_result = $conn->query($check_query);

// Si ya existe un registro con los mismos datos, mostrar un mensaje y no realizar la inserción
if ($check_result->num_rows > 0) {
    $_SESSION['mensaje'] = "Ya existe un registro con estos datos.";
    $_SESSION['mensaje_tipo'] = "error";
} else {
    // Si no existe un registro con los mismos datos, realizar la inserción
    $sql = "INSERT INTO auto_registro (nombre, ap_paterno, ap_materno, estatura, alergias, enfermedades, fracturas, antecedentes, otros)
            VALUES ('$nombre', '$ap_paterno', '$ap_materno', '$estatura', '$alergias', '$enfermedades', '$fracturas', '$antecedentes', '$otros')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensaje'] = "El registro se guardó correctamente.";
        $_SESSION['mensaje_tipo'] = "success";
    } else {
        $_SESSION['mensaje'] = "Hubo un error al guardar el registro: " . $conn->error;
        $_SESSION['mensaje_tipo'] = "error";
    }
}

// Cerrar conexión
$conn->close();

// Redirigir de vuelta a auto-registro.php
header("Location: auto-registro.php");
exit();
?>
