<?php
include 'config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar valores del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consultar la base de datos para obtener el usuario por correo
    $sql_buscar_usuario = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt_buscar_usuario = $conn->prepare($sql_buscar_usuario);
    $stmt_buscar_usuario->bind_param("s", $correo);
    $stmt_buscar_usuario->execute();
    $result_buscar_usuario = $stmt_buscar_usuario->get_result();

    if ($result_buscar_usuario->num_rows > 0) {
        // El usuario existe, verificar la contraseña
        $row = $result_buscar_usuario->fetch_assoc();
        $hashed_password = $row['contrasena'];

        if (password_verify($contrasena, $hashed_password)) {
            // Contraseña correcta, iniciar sesión
            session_start();
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['nombre_usuario'] = $row['nombre'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['rol'] = $row['rol'];

            // Redirigir según el rol
            if ($row['rol'] === 'admin') {
                header("Location: admin/inicio.php");
                exit();
            } elseif ($row['rol'] === 'cliente') {
                header("Location: client/tienda.php");
                exit();
            } else {
                // Manejar otros roles según sea necesario
                // Puedes redirigir a una página por defecto o mostrar un mensaje de error
                header("Location: error.php");
                exit();
            }
        } else {
            // Contraseña incorrecta
            header("Location: login.php?status=error&message=Contraseña incorrecta");
            exit();
        }
    } else {
        // El usuario no existe
        header("Location: login.php?status=error&message=Usuario no encontrado");
        exit();
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
