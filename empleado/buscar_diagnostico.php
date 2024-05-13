<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Diagnostico</title>

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
            <h1 class="h3 mb-0 text-gray-800">DIAGNOSTICO</h1>
        </div>

        <div class="row">

            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">DIAGNOSTICO</h6>
                        <div class="dropdown no-arrow">
                            <!-- Aquí puedes poner el contenido de tu menú desplegable si es necesario -->
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Motor de búsqueda -->

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="searchInput"
                                placeholder="BUSCAR NUMERO DE EXPEDINETE...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">BUSCAR</button>
                            </div>
                        </div>
                        <!-- Tabla -->
                        <div class="table-responsive" id="searchResults">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>Nombre Cliente</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Número de Expediente</th>
                                        <th>Folio de Diagnostico</th>
                                        <th>Descargar Diagnostico</th> <!-- Nueva columna agregada -->
                                    </tr>
                                </thead>
                                <!-- Aquí se mostrarán los resultados de la búsqueda -->
                                <tbody></tbody>
                            </table>
                        </div>
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
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var searchTerm = $(this).val();
        if (searchTerm != '') {
            $.ajax({
                url: 'search_diagnostico.php',
                method: 'POST',
                data: { searchTerm: searchTerm }, // Asegúrate de que searchTerm se pase correctamente
                success: function(data) {
                    $('#searchResults').html(data);
                }
            });
        } else {
            $('#searchResults').html('');
        }
    });
});

    </script>

</body>

</html>
