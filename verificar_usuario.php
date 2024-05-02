<?php
// Incluir archivo de configuración de la base de datos
include 'config/conexion.php';

// Inicializar variables para los datos del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consulta SQL para verificar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // El usuario fue encontrado, obtener sus datos
    $usuario = $result->fetch_assoc();

    // Verificar si el usuario está activo
    if ($usuario['estatus'] == 'ACTIVO') {
        // Redirigir según el rol del usuario
        if ($usuario['rol'] == 'ADMIN') {
            header("Location: admin/index.php");
        } elseif ($usuario['rol'] == 'EMPLEADO') {
            header("Location: empleado/index.php");
        } else {
            // Si el rol no es ADMIN ni EMPLEADO, manejar según sea necesario
            header("Location: index.php?error=no_valid_role");
        }
    } else {
        // Si el usuario está inactivo, mostrar mensaje de error
        header("Location: index.php?error=inactive_user");
    }
} else {
    // Si las credenciales son incorrectas, mostrar mensaje de error
    header("Location: index.php?error=incorrect_credentials");
}

// Cerrar conexión a la base de datos
$conn->close();
?>
