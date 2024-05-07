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

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">PREREGISTRO</h1>
                    </div>

                    <div class="row">


                    </div>


                    <div class="row">

                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">AGREGAR EMPLEADOS</h6>
                                    <div class="dropdown no-arrow">

                                    </div>
                                </div>
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
                                            <label for="nombre">NOMBRE COMPLETO:</label>
                                            <input type="text" placeholder="INGRESA EL NOMBRE..." class="form-control"
                                                id="nombre" name="nombre" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+"
                                                title="Solo letras y espacios permitidos" required
                                                oninput="this.value = this.value.replace(/[^A-Za-zñÑáéíóúÁÉÍÓÚ\s]/g, ''); this.value = this.value.toUpperCase();">
                                        </div>



                                        <!-- Campo Correo -->
                                        <div class="form-group">
                                            <label for="correo">CORREO:</label>
                                            <input type="email" placeholder="INGRESA EL CORREO..." class="form-control"
                                                id="correo" name="correo" required>
                                        </div>

                                        <!-- Campo Contraseña -->
                                        <div class="form-group">
                                            <label for="contrasena">CONTRASEÑA:</label>
                                            <div class="input-group">
                                                <input type="password"
                                                    placeholder="CONTRASEÑA..."
                                                    class="form-control" id="contrasena" name="contrasena" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        id="togglePassword">Ver</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Campo Usuario -->
                                        <div class="form-group">
                                            <label for="usuario">USUARIO:</label>
                                            <input type="text" placeholder="USUARIO..." class="form-control"
                                                id="usuario" name="usuario" required
                                                oninput="this.value = this.value.replace(/[^A-Za-z]/g, '').toUpperCase();">
                                        </div>


                                        <!-- Campo Rol -->
                                        <div class="form-group">
                                            <label for="rol">ROL:</label>
                                            <select class="form-control" id="rol" name="rol" required>
                                                <option>SELECCIONA ROL</option>
                                                <option value="ADMIN">Administrador</option>
                                                <option value="EMPLEADO">Empleado</option>
                                                <!--<option value="CLIENTE">Cliente</option>-->
                                            </select>
                                        </div>

                                        <!-- Campo Estatus -->
                                        <div class="form-group">
                                            <label for="estatus">ESTATUS:</label>
                                            <select class="form-control" id="estatus" name="estatus" required>
                                                <option value="ACTIVO">ACTIVO</option>
                                                <option value="INACTIVO">INACTIVO</option>
                                            </select>
                                        </div>

                                        <!-- Botón de enviar -->
                                        <button type="submit" class="btn btn-primary">REGISTRAR</button>
                                    </form>
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

    <script src="js/usuarios.js"></script>


</body>

</html>