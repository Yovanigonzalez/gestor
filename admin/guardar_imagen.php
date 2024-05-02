<?php
session_start(); // Iniciar sesión si no lo está
include '../config/conexion.php'; // Incluir archivo de conexión

// Verificar si se han enviado archivos
if(isset($_FILES['imagen_login']) && isset($_FILES['imagen_recuperar'])) {
    // Directorio de destino para guardar las imágenes
    $directorio_destino = '../imgs/';

    // Nombre de los archivos
    $nombre_imagen_login = $_FILES['imagen_login']['name'];
    $nombre_imagen_recuperar = $_FILES['imagen_recuperar']['name'];

    // Ruta de los archivos temporales
    $ruta_imagen_login_temporal = $_FILES['imagen_login']['tmp_name'];
    $ruta_imagen_recuperar_temporal = $_FILES['imagen_recuperar']['tmp_name'];

    // Mover los archivos a su ubicación final
    move_uploaded_file($ruta_imagen_login_temporal, $directorio_destino . $nombre_imagen_login);
    move_uploaded_file($ruta_imagen_recuperar_temporal, $directorio_destino . $nombre_imagen_recuperar);

    // Insertar los nombres de los archivos en la base de datos
    $sql = "INSERT INTO imagenes (nombre_imagen_login, nombre_imagen_recuperar) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre_imagen_login, $nombre_imagen_recuperar);
    $stmt->execute();
    $stmt->close();

    // Redireccionar o mostrar un mensaje de éxito
    $_SESSION['mensaje_tipo'] = 'success';
    $_SESSION['mensaje'] = 'Imágenes guardadas correctamente.';
    header('Location: utilities-image.php');
    exit();
} else {
    // Si no se enviaron archivos, mostrar un mensaje de error
    $_SESSION['mensaje_tipo'] = 'danger';
    $_SESSION['mensaje'] = 'No se han enviado imágenes.';
    header('Location: utilities-image.php');
    exit();
}
?>
