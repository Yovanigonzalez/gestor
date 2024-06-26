<?php     session_start(); // Inicia la sesión ?>

<?php
// Conexión a la base de datos (esto depende de tu configuración)

include 'config/conexion.php';

// Verifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para obtener el nombre de la imagen de la tabla 'imagenes'
$sql = "SELECT nombre_imagen_recuperar FROM imagenes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $nombre_imagen_recuperar = $row["nombre_imagen_recuperar"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<?php include 'check_connection.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Restablecer Contraseña</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="shortcut icon" type="image/x-icon" href="log/hospital.png">

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

    .bg-password-image {
        background: url(imgs/<?php echo $nombre_imagen_recuperar; ?>);
        /* Se obtiene la imagen desde la bd y la carpeta para visualizarla */
        background-position: center;
        background-repeat: no-repeat;
        background-size: 420px 470px;
        /* Ajusta la imagen al tamaño específico 380px 400px*/
    }
    </style>

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
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Olvidaste tu contraseña?</h1>
                                        <p class="mb-4">Para poder recuperar tu contraseña solo sera necesario que
                                            mandes tu nombre completo y el correo electrónico y se
                                            mandara la nueva contraseña a tu correo para poder acceder, esto puede
                                            demorar 24 horas!.
                                        </p>
                                    </div>
                                    <?php

                                    // Verifica si hay un mensaje almacenado en la sesión
                                    if (isset($_SESSION['mensaje'])) {
                                        // Muestra el mensaje de éxito o error
                                        echo '<div class="alert alert-success" role="alert">' . $_SESSION['mensaje'] . '</div>';

                                        // Elimina el mensaje de la sesión para que no se muestre nuevamente
                                        unset($_SESSION['mensaje']);
                                    }
                                    ?>
                                    <form class="user" action="guardar_datos_recuperacion.php" method="post">
                                        <h6>Nombre y Apellido:</h6>
                                        <div class="form-group">
                                            <input type="text" name="nombre" class="form-control form-control-user"
                                                id="exampleInputName" placeholder="Nombre" required
                                                oninput="this.value = this.value.replace(/[^A-Za-zñÑáéíóúÁÉÍÓÚ\s]/g, ''); this.value = this.value.toUpperCase();">
                                        </div>

                                        <h6>Correo:</h6>
                                        <div class="form-group">
                                            <input type="email" name="correo" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Correo electrónico" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Recuperar contraseña
                                        </button>
                                    </form>


                                    <script>
                                    function formatName(input) {
                                        // Convertir a mayúsculas
                                        input.value = input.value.toUpperCase();
                                        // Eliminar números y signos
                                        input.value = input.value.replace(/[^A-Z\s]/g, '');
                                    }
                                    </script>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="index.php">Regresar!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="index.html"></a>
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