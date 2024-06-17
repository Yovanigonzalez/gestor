
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
        header('Location: inicio.php'); // Cambia 'index.php' por la URL de la página desde donde se accede a 'editar_usuario.php'
        exit();
    }

    // Cerrar conexión
    $conn->close();
} else {
    // Si no se proporcionó el parámetro 'id', redirigir al usuario de vuelta a la página anterior o mostrar un mensaje de error
    header('Location: inicio.php'); // Cambia 'index.php' por la URL de la página desde donde se accede a 'editar_usuario.php'
    exit();
}
?>


<?php include 'menu.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Usuarios</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* Estilo para convertir el texto a mayúsculas */
        input[type="text"] {
            text-transform: uppercase;
        }
    </style>

</head>



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EDITAR DATOS DEL EMPLEADO</h1>
    </div>

    <div class="row">



    </div>


    <div class="row">

        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">EDITAR DATOS DEL EMPLEADO</h6>
                    <div class="dropdown no-arrow">

                    </div>
                </div>
                <div class="card-body">
                    <!-- Tabla para mostrar usuarios -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <tbody id="tabla-usuarios">

                                <?php

                                // Verificar si hay un mensaje almacenado en la sesión
                                if (isset($_SESSION['mensaje'])) {
                                    // Mostrar el mensaje de éxito o error
                                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['mensaje'] . '</div>';

                                    // Eliminar el mensaje de la sesión para que no se muestre nuevamente
                                    unset($_SESSION['mensaje']);
                                }
                                ?>

                                <form action="guardar_cambios.php" method="POST" class="mt-4">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <!-- Campo oculto para enviar el ID del usuario al guardar los cambios -->

                                    <div class="form-group">
                                        <label for="nombre">NOMBRE:</label>
                                        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="correo">CORREO:</label>
                                        <input type="email" id="correo" name="correo"
                                            value="<?php echo $usuario['correo']; ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="contrasena">CONTRASEÑA:</label>
                                        <div class="input-group">
                                            <input type="password" id="contrasena" name="contrasena"
                                                class="form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="ver-contrasena"><i class="fas fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">GUARDAR CAMBIOS</button>
                                </form>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<!-- Footer -->
<?php include 'footer.php'; ?>
<!-- End of Footer -->

</div>

</div>


</body>

<script src="js/editar_usuarios.js"></script>

</html>