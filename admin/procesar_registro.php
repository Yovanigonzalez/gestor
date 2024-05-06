<?php
// Verifica si se han enviado datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $categoria = $_POST['categoria'];
    $direccion = $_POST['direccion'];
    $numero_interno = $_POST['numero_interno'];
    $numero_externo = $_POST['numero_externo'];
    $codigo_postal = $_POST['codigo_postal'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];
    $compania = $_POST['compania'];

    // Conectar a la base de datos (cambiar estos valores según tu configuración)
include '../config/conexion.php';

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar los datos en la tabla empleados
    $sql = "INSERT INTO empleados (nombre, telefono, categoria, direccion, numero_interno, numero_externo, codigo_postal, ciudad, estado, compania)
            VALUES ('$nombre', '$telefono', '$categoria', '$direccion', '$numero_interno', '$numero_externo', '$codigo_postal', '$ciudad', '$estado', '$compania')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "¡Registro exitoso!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se enviaron datos mediante POST, redireccionar al formulario de registro
    header("Location: formulario_de_registro.html");
    exit();
}
?>
