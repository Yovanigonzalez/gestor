<?php
session_start();

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

    <title>Usuarios Inactivos</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EMPLEADOS DESPEDIDOS</h1>
    </div>


    <div class="row">

        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">EMPLEADOS INACTIVOS</h6>
                    <div class="dropdown no-arrow">

                    </div>
                </div>
                <div class="card-body">
                    <!-- Tabla para mostrar usuarios -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="form-group">
                                <input type="text" class="form-control" id="busquedaNombre"
                                    placeholder="BUSCAR POR NOMBRE" onkeyup="buscarUsuario()">
                            </div>

                        <?php
                        // Verificar si hay un mensaje en la sesión
                        if (isset($_SESSION['mensaje']) && isset($_SESSION['mensaje_tipo'])) {
                            $mensaje_tipo = $_SESSION['mensaje_tipo'];
                            $mensaje = $_SESSION['mensaje'];
                            echo "<div class=\"alert alert-$mensaje_tipo\">$mensaje</div>";
                            unset($_SESSION['mensaje']); // Eliminar el mensaje para evitar que se muestre de nuevo en futuras visitas
                            unset($_SESSION['mensaje_tipo']); // Eliminar el tipo de mensaje
                        }
                        ?>
                            <thead>
                                <tr>
                                    <th>NOMBRE</th>
                                    <!--<th>Correo Electrónico</th>-->
                                    <th>ROL</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-usuarios">
                                <!-- Los usuarios se cargarán aquí dinámicamente -->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-6 mb-4">



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

<script src="js/usuarios_inactivos.js"></script>

</html>