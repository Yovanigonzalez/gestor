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

</head>



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">RECUPERACION DE CONTRASEÑA</h1>
    </div>


    <div class="row">

        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">EMPPLEADOS QUE REQUIEREN RECUPERACION DE CONTRASEÑA</h6>
                    <div class="dropdown no-arrow">

                    </div>
                </div>
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
                                        <th>NOMBRE</th>
                                        <th>CORREO</th>
                                        <th>ACCIONES</th>
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
                                                    <a href='usuarios.php?id=" . $row['id'] . "' class='btn btn-primary'>EDITAR</a>
                                                    <a href='eliminar_usuario_recuperacion.php?id=" . $row['id'] . "' onclick='return confirmarEliminacion();' class='btn btn-danger'>ELIMINAR</a>
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

<script src="js/recuperaciones.js"></script>

</html>