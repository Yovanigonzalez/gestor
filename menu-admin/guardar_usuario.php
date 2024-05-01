<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $rol = $_POST["rol"];
    $estatus = $_POST["estatus"];

    // Conexión a la base de datos
    include '../config/conexion.php';

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Prepara la consulta SQL para insertar los datos en la tabla correspondiente
    $sql = "INSERT INTO usuarios (nombre, correo, contrasena, rol, estatus, fecha_hora) 
            VALUES ('$nombre', '$correo', '$contrasena', '$rol', '$estatus', NOW())";

    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Registro guardado correctamente";
    } else {
        echo "Error al guardar el registro: " . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
} else {
    // Si no se envió el formulario, redirige a la página de inicio u otra página según sea necesario
    header("Location: index.php");
    exit();
}
?>
