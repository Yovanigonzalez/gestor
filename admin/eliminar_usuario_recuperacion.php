<?php
session_start(); // Iniciar la sesión si aún no está iniciada
include '../config/conexion.php';

// Verificar si se proporcionó un ID de usuario
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtener el ID del usuario a eliminar
    $id = $_GET['id'];

    // Query para eliminar el usuario
    $sql = "DELETE FROM recuperacion WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Establecer mensaje de éxito en la sesión
        $_SESSION['mensaje_tipo'] = "success";
        $_SESSION['mensaje'] = "Usuario eliminado correctamente";
        // Redireccionar a recuperacion.php
        header("Location: recuperaciones.php");
        exit();
    } else {
        // Establecer mensaje de error en la sesión
        $_SESSION['mensaje_tipo'] = "danger";
        $_SESSION['mensaje'] = "Error: " . $conn->error;
        // Redireccionar a recuperacion.php
        header("Location: recuperaciones.php");
        exit();
    }
} else {
    // Redireccionar si no se proporcionó un ID de usuario
    $_SESSION['mensaje_tipo'] = "warning";
    $_SESSION['mensaje'] = "ID de usuario no proporcionado";
    header("Location: recuperaciones.php");
    exit();
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
