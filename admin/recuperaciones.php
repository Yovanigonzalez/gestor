<?php session_start(); // Iniciar la sesión si aún no está iniciada
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

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>



                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Recuperacion de contraseña</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Todos los empleados que requieren recuperacion de contraseña</h6>
                                <div class="dropdown no-arrow">

                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                            <div class="card-body">
    <!-- Tabla para mostrar usuarios -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-usuarios">
                <?php
                include '../config/conexion.php';

                // Verificar conexión
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query para obtener los datos de la tabla 'recuperacion'
                $sql = "SELECT id, nombre, correo FROM recuperacion";
                $result = $conn->query($sql);

                // Verificar si hay filas en el resultado
                if ($result->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['correo'] . "</td>";
                        echo "<td>
                                <a href='usuarios.php?id=" . $row['id'] . "' class='btn btn-primary'>Editar</a>
                                <a href='eliminar_usuario_recuperacion.php?id=" . $row['id'] . "' onclick='return confirmarEliminacion();' class='btn btn-danger'>Eliminar</a>
                              </td>";
                        echo "</tr>";
                    }
                                    } else {
                    echo "<tr><td colspan='3'>No hay usuarios para mostrar</td></tr>";
                }

                // Cerrar la conexión a la base de datos
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function confirmarEliminacion() {
        return confirm('¿Estás seguro de que deseas eliminar este usuario?');
    }
</script>

</div>
                        </div>
                        </div>
                        </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">



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


</body>

</html>