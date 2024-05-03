<?php
session_start(); // Inicia la sesión

// Configura la conexión a la base de datos
include 'config/conexion.php';

// Verifica la conexión
if ($conn->connect_error) {
    $_SESSION['mensaje'] = "La conexión falló: " . $conn->connect_error;
    header("Location: forgot-password.php");
    exit();
}

// Obtiene los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

// Prepara y ejecuta la consulta SQL para insertar los datos en la base de datos
$sql = "INSERT INTO recuperacion (nombre, correo) VALUES ('$nombre', '$correo')";

if ($conn->query($sql) === TRUE) {
    // Establece un mensaje de éxito en la sesión
    $_SESSION['mensaje'] = "¡Datos enviados a recuperación!";
    header("Location: forgot-password.php");
    exit();
} else {
    // Establece un mensaje de error en la sesión
    $_SESSION['mensaje'] = "Error al insertar datos.";
    header("Location: forgot-password.php");
    exit();
}

// Cierra la conexión
$conn->close();
?>
