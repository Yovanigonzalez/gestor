<?php
session_start();

include '../config/conexion.php';

// Obtener el ID del usuario a recontratar
$id = $_POST['id'];

// Consulta para actualizar el estado del usuario a "ACTIVO"
$sql = "UPDATE usuarios SET estatus='ACTIVO' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    // Si la actualización fue exitosa, establecer un mensaje de éxito en la sesión
    $_SESSION['mensaje_tipo'] = 'success';
    $_SESSION['mensaje'] = 'Usuario recontratado correctamente';
} else {
    // Si hubo un error, establecer un mensaje de error en la sesión
    $_SESSION['mensaje_tipo'] = 'danger';
    $_SESSION['mensaje'] = 'Error al recontratar usuario: ' . $conn->error;
}

// Redireccionar a usuario_inactivo.php
header("Location: usuarios_inactivo.php");
exit();

// Cerrar conexión a la base de datos
$conn->close();
?>
