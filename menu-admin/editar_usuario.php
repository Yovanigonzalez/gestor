<?php
// Verificar si se recibió el parámetro 'id' en la URL
if (isset($_GET['id'])) {
    // Obtener el ID del usuario de la URL
    $id = $_GET['id'];

    // Configuración de la conexión a la base de datos
include '../config/conexion.php';
    // Verificar conexión
    if ($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    // Consulta SQL para obtener los detalles del usuario con el ID especificado
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);

    // Verificar si se encontró el usuario
    if ($result->num_rows > 0) {
        // Obtener los detalles del usuario
        $usuario = $result->fetch_assoc();
    } else {
        // Si no se encontró el usuario, redirigir al usuario de vuelta a la página anterior o mostrar un mensaje de error
        header('Location: index.php'); // Cambia 'index.php' por la URL de la página desde donde se accede a 'editar_usuario.php'
        exit();
    }

    // Cerrar conexión
    $conn->close();
} else {
    // Si no se proporcionó el parámetro 'id', redirigir al usuario de vuelta a la página anterior o mostrar un mensaje de error
    header('Location: index.php'); // Cambia 'index.php' por la URL de la página desde donde se accede a 'editar_usuario.php'
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <!-- Agregar enlaces a Bootstrap CSS u otros archivos de estilos -->
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="guardar_cambios.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Campo oculto para enviar el ID del usuario al guardar los cambios -->
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>"><br>
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $usuario['correo']; ?>"><br>
        <label for="rol">Rol:</label>
        <input type="text" id="rol" name="rol" value="<?php echo $usuario['rol']; ?>"><br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
