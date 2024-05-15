<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar datos del clientes</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/citas.css" rel="stylesheet">


</head>

<body>

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">EDITAR DATOS DEL CLIENTE</h1>
        </div>

        <div class="row">

            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">EDITAR DATOS DEL CLIENTE</h6>
                        <div class="dropdown no-arrow">
                            <!-- Aquí puedes poner el contenido de tu menú desplegable si es necesario -->
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Motor de búsqueda -->
                        <input type="text" id="searchInput" class="form-control" onkeyup="search()" placeholder="Buscar cliente...">
                        <!-- Tabla -->
                        <!--<div class="table-responsive">-->
                            <table class="table table-bordered" id="clientTable" width="100%" cellspacing="0">
                            <?php
                                // Verifica si hay un mensaje en la URL
                                if(isset($_GET['mensaje']) && isset($_GET['tipo_exito'])) {
                                    $mensaje = $_GET['mensaje'];
                                    $tipo_exito = $_GET['tipo_exito'];
                                    
                                    // Mostrar el mensaje de éxito
                                    echo "<div class=\"alert alert-$tipo_exito\">$mensaje</div>";
                                } elseif(isset($_GET['mensaje']) && isset($_GET['tipo_error'])) {
                                    $mensaje = $_GET['mensaje'];
                                    $tipo_error = $_GET['tipo_error'];
                                    
                                    // Mostrar el mensaje de error
                                    echo "<div class=\"alert alert-$tipo_error\">$mensaje</div>";
                                }
                                ?>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Ap. Paterno</th>
                                        <th>Ap. Materno</th>
                                        <th>Estatura</th>
                                        <th>Alergias</th>
                                        <th>Enfermedades</th>
                                        <th>Fracturas</th>
                                        <th>Antecedentes</th>
                                        <th>Otros</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Aquí se mostrarán los clientes -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- End of Footer -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function search() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("clientTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Busca en la segunda columna (nombre)
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        $(document).ready(function () {
            // Cargar datos de los clientes desde la base de datos al cargar la página
            $.ajax({
                url: 'get_clients.php', // Archivo PHP que obtiene los datos de los clientes
                type: 'POST',
                success: function (response) {
                    $('#clientTable tbody').html(response);
                }
            });
        });
    </script>

</body>

</html>
