<?php session_start(); // Iniciar sesión si no lo está ?>
<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agregar Usuarios</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cambio imagen de login</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Cambio imagen de login</h6>
                                    <div class="dropdown no-arrow">

                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <?php
                                    // Verifica si hay un mensaje en la sesión
                                    if(isset($_SESSION['mensaje']) && isset($_SESSION['mensaje_tipo'])) {
                                        $mensaje_tipo = $_SESSION['mensaje_tipo'];
                                        $mensaje = $_SESSION['mensaje'];
                                        echo "<div class=\"alert alert-$mensaje_tipo\">$mensaje</div>";
                                        unset($_SESSION['mensaje']); // Elimina el mensaje para evitar que se muestre de nuevo en futuras visitas
                                        unset($_SESSION['mensaje_tipo']); // Elimina el tipo de mensaje
                                    }

                                    ?>

                                    <!-- Formulario de registro de usuarios -->
<!-- Formulario de registro de usuarios -->
<form action="guardar_imagen.php" method="POST" enctype="multipart/form-data">

    <!-- Campo de carga de imagen para "Imagen login" -->
    <div class="form-group">
        <label for="imagen_login">Imagen login:</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="imagen_login" name="imagen_login" data-browse="Imagen" onchange="mostrarNombreImagen(this)">
            <label class="custom-file-label" for="imagen_login">Selecciona imagen</label>
        </div>
        <div id="nombre_imagen_login"></div> <!-- Aquí se mostrará el nombre de la imagen seleccionada -->
    </div>

    <!-- Campo de carga de imagen para "Imagen recuperar contraseña" -->
    <div class="form-group">
        <label for="imagen_recuperar">Imagen recuperar contraseña:</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="imagen_recuperar" name="imagen_recuperar" data-browse="Imagen" onchange="mostrarNombreImagen(this)">
            <label class="custom-file-label" for="imagen_recuperar">Selecciona imagen</label>
        </div>
        <div id="nombre_imagen_recuperar"></div> <!-- Aquí se mostrará el nombre de la imagen seleccionada -->
    </div>

    <!-- Botón de enviar -->
    <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>

<script>
    function mostrarNombreImagen(input) {
        var nombreImagen = input.files[0].name;
        var idCampoNombre = input.id === 'imagen_login' ? 'nombre_imagen_login' : 'nombre_imagen_recuperar';
        document.getElementById(idCampoNombre).innerHTML = 'Nombre de la imagen seleccionada: ' + nombreImagen;
    }
</script>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                </div>
                <!-- /.container-fluid -->
 

                </div>
            </div>
            <!-- End of Main Content -->
                                </div>
            <!-- Footer -->
            <?php include 'footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

</body>

</html>
