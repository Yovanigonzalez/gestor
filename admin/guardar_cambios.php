<?php
session_start();

// Verificar si se recibió el parámetro 'id' y los datos del formulario
if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contrasena'])) {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Configuración de la conexión a la base de datos
    include '../config/conexion.php';

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    // Encriptar la contraseña antes de guardarla en la base de datos (recomendado)
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE usuarios SET nombre='$nombre', correo='$correo', contrasena='$contrasena_encriptada' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar al usuario a la página de edición con un mensaje de éxito
        $_SESSION['mensaje'] = "Los cambios se guardaron exitosamente.";
        header('Location: editar_usuario.php?id=' . $id);
    } else {
        // Mostrar un mensaje de error si la actualización falla
        echo "Error al guardar los cambios: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    // Si no se recibieron todos los datos necesarios, redireccionar al usuario a la página anterior
    header('Location: index.php');
}
?>