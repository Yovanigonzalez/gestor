<?php
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de configuración de la base de datos
    include '../config/conexion.php'; // Este archivo debe contener la conexión a la base de datos

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria_servicio = $_POST['categoria_servicio'];
    $duracion = $_POST['duracion'];
    $estado_servicio = $_POST['estado_servicio'];
    $compania = $_POST['compania'];
    $estatus = $_POST['estatus'];

    // Validar los datos (puedes agregar más validaciones según tus necesidades)

    // Preparar la consulta SQL para insertar los datos en la tabla de servicios
    $sql = "INSERT INTO servicios (nombre, descripcion, precio, categoria_servicio, duracion, estado_servicio, compania, estatus) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Preparar la declaración
    $stmt = $conn->prepare($sql);
    
    // Enlazar parámetros
    $stmt->bind_param("ssssssss", $nombre, $descripcion, $precio, $categoria_servicio, $duracion, $estado_servicio, $compania, $estatus);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Los datos se han insertado correctamente
        $_SESSION['mensaje_tipo'] = 'success';
        $_SESSION['mensaje'] = "Los datos se han guardado correctamente.";
    } else {
        // Hubo un error al insertar los datos
        $_SESSION['mensaje_tipo'] = 'error';
        $_SESSION['mensaje'] = "Ocurrió un error al guardar los datos. Por favor, inténtalo de nuevo.";
    }
    
    // Cerrar la declaración
    $stmt->close();
} else {
    // Si alguien intenta acceder directamente a este archivo sin enviar el formulario, puedes redirigirlo a otra página
    header("Location: servicios.php");
    exit();
}

// Redirigir al usuario de vuelta a servicios.php
header("Location: servicios.php");
exit();
?>
