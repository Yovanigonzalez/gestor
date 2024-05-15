<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Fuentes personalizadas para esta plantilla-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Estilos personalizados para esta plantilla-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>


<!-- Contenido de la página -->
<div class="container-fluid">



    <!-- Fila de contenido -->
    <div class="row">

        <!-- Tarjeta de ingresos (mensuales) -->



        <?php
                    // Conexión a la base de datos (reemplaza los valores con los de tu configuración)
                    include '../config/conexion.php';

                    // Verificar conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    // Consulta para obtener el total de empleados activos
                    $sql = "SELECT COUNT(*) AS total_empleados FROM auto_registro";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Mostrar el resultado
                        $row = $result->fetch_assoc();
                        $total_empleados = $row["total_empleados"];
                    } else {
                        $total_empleados = 0;
                    }

                    $conn->close();
                    ?>

                    <!-- Mostrar el total de empleados -->


                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Total de Clientes</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_empleados; ?></div>
                                    </div>
                                    <!-- Total de Usuarios -->
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Tarjeta de ingresos (anuales) -->


                    <!-- Tarjeta de solicitudes pendientes -->
                    <!--<div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tareas
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <!-- Tarjeta de solicitudes pendientes -->


                <!-- Fila de contenido -->




    </body>

</html>
