<?php
session_start();

?>

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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Agregar Empleados</h1>
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
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Agregar Usuarios</h6>
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
                                    <form action="guardar_usuario.php" method="POST">

                                        <!-- Campo Nombre -->
                                        <div class="form-group">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" placeholder="Ingresa el nombre..." class="form-control"
                                                id="nombre" name="nombre" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+"
                                                title="Solo letras y espacios permitidos" required
                                                oninput="this.value = this.value.replace(/[^A-Za-zñÑáéíóúÁÉÍÓÚ\s]/g, ''); this.value = this.value.toUpperCase();">
                                        </div>



                                        <!-- Campo Correo -->
                                        <div class="form-group">
                                            <label for="correo">Correo:</label>
                                            <input type="email" placeholder="Ingresa el correo..." class="form-control"
                                                id="correo" name="correo" required>
                                        </div>

                                        <!-- Campo Contraseña -->
                                        <div class="form-group">
                                            <label for="contrasena">Contraseña:</label>
                                            <div class="input-group">
                                                <input type="password"
                                                    placeholder="Ingresa la contraseña para el usuario..."
                                                    class="form-control" id="contrasena" name="contrasena" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        id="togglePassword">Ver</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Campo Rol -->
                                        <div class="form-group">
                                            <label for="rol">Rol:</label>
                                            <select class="form-control" id="rol" name="rol" required>
                                                <option>Selecciona el rol</option>
                                                <option value="ADMIN">Administrador</option>
                                                <option value="EMPLEADO">Empleado</option>
                                                <!--<option value="CLIENTE">Cliente</option>-->
                                            </select>
                                        </div>

                                        <!-- Campo Estatus -->
                                        <div class="form-group">
                                            <label for="estatus">Estatus:</label>
                                            <select class="form-control" id="estatus" name="estatus" required>
                                                <option value="ACTIVO">Activo</option>
                                                <option value="INACTIVO">Inactivo</option>
                                            </select>
                                        </div>

                                        <!-- Botón de enviar -->
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script src="js/usuarios.js"></script>


</body>

</html>