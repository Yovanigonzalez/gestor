<?php
session_start();

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT); // Encripta la contraseña
    $rol = $_POST["rol"];
    $estatus = $_POST["estatus"];

    // Conexión a la base de datos
    include '../config/conexion.php';

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Verifica si el correo ya está registrado
    $sql_check_email = "SELECT correo FROM usuarios WHERE correo = '$correo'";
    $result_check_email = $conn->query($sql_check_email);

    if ($result_check_email->num_rows > 0) {
        $_SESSION['mensaje_tipo'] = "danger";
        $_SESSION['mensaje'] = "El correo electrónico ya está registrado";
    } else {
        // Prepara la consulta SQL para insertar los datos en la tabla correspondiente
        $sql = "INSERT INTO usuarios (nombre, correo, contrasena, rol, estatus, fecha_hora) 
                VALUES ('$nombre', '$correo', '$contrasena', '$rol', '$estatus', NOW())";

        // Ejecuta la consulta
        if ($conn->query($sql) === TRUE) {
            $_SESSION['mensaje_tipo'] = "success";
            $_SESSION['mensaje'] = "Registro guardado correctamente";
        } else {
            $_SESSION['mensaje_tipo'] = "danger";
            $_SESSION['mensaje'] = "Error al guardar el registro: " . $conn->error;
        }
    }

    // Cierra la conexión
    $conn->close();

    // Redirige a agregar_usuario.php
    header("Location: agregar_usuario.php");
    exit();
} else {
    // Si no se envió el formulario, redirige a la página de inicio u otra página según sea necesario
    header("Location: agregar_usuario.php");
    exit();
}
?>
