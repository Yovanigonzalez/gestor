<?php
// Conexión a la base de datos (esto depende de tu configuración)

include 'config/conexion.php';

// Verifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para obtener el nombre de la imagen de la tabla 'imagenes'
$sql = "SELECT nombre_imagen_login FROM imagenes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $nombre_imagen_login = $row["nombre_imagen_login"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<?php
// Verificar si hay un mensaje de error o éxito en la URL
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    // Mostrar mensaje de error según el tipo de error
    switch ($error) {
        case 'incorrect_credentials':
            $mensaje = "Correo electrónico o contraseña incorrectos.";
            break;
        case 'inactive_user':
            $mensaje = "No tienes acceso porque ya no formas parte de nuestro equipo de trabajo.";
            break;
        case 'no_valid_role':
            $mensaje = "No tienes un rol válido asignado.";
            break;
        default:
            $mensaje = "Ha ocurrido un error.";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
            border-radius: 50px;
        }

        /*Color de fondo*/
        .bg-gradient-primary {
            background-color: #4e73df;
            background-size: cover
        }
        .bg-login-image {
            background: url(imgs/<?php echo $nombre_imagen_login; ?>); /* Se obtiene la imagen desde la bd y la carpeta para visualizarla */
            background-position: center;
            background-repeat: no-repeat;
            background-size: 380px 400px; /* Ajusta la imagen al tamaño específico */
        }


    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <?php if (isset($mensaje)): ?>
                                <!-- Mostrar mensaje de error -->
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $mensaje; ?>
                                </div>
                                <?php endif; ?>

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hola Bienvenido! <br> <h6>Inicia sesion con tu correo y contraseña</h6></h1> 
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Ingresa tu correo...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Ingresa tu contraseña">
                                        </div>
                                    </form>
                                    <hr>
                                    <div>
                                        <a class="btn btn-facebook btn-user btn-block" href="verificar_usuario.php">Iniciar sesión </a>
                                    </div>
                                    <br>

                                    <div>
                                        <a class="btn btn-google btn-user btn-block" href="forgot-password.php">Olvidaste tu contraseña?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>