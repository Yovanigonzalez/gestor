<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnostico</title>
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


                        <!-- Campos de formulario -->
                        <div id="searchResults">
                            <form action="guardar_citas.php" method="POST" onsubmit="return validarFormulario()">
                                <?php
                                // Establecer la conexión a la base de datos (reemplaza los valores con los correspondientes a tu configuración)
                                include '../config/conexion.php';
                                if ($conn->connect_error) {
                                    die("La conexión falló: " . $conn->connect_error);
                                }

                                // Verificar si se recibieron todos los datos necesarios a través de la URL
                                if (isset($_GET['expediente']) && isset($_GET['servicio']) && isset($_GET['nombre_cliente']) && isset($_GET['ap_paterno']) && isset($_GET['ap_materno']) && isset($_GET['razon']) && isset($_GET['id_nombre_seleccionado'])) {
                                    // Obtener los datos pasados a través de la URL
                                    $expediente = $_GET['expediente'];
                                    $servicio = $_GET['servicio'];
                                    $nombre_cliente = $_GET['nombre_cliente'];
                                    $ap_paterno = $_GET['ap_paterno'];
                                    $ap_materno = $_GET['ap_materno'];
                                    $razon = $_GET['razon'];
                                    $id_nombre_seleccionado = $_GET['id_nombre_seleccionado'];

                                    // Mostrar los datos recibidos en la página HTML
                                    echo "<div class='row'>";
                                    echo "<div class='col-md-6'>";
                                    echo "<div class='form-group'>";
                                    echo "<label for='expediente'>NUMERO DE EXPEDIENTE:</label>";
                                    echo "<input type='number' class='form-control' id='expediente' name='expediente' value='$expediente' readonly>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                    echo "<label for='servicio'>SERVICIO:</label>";
                                    echo "<input type='text' class='form-control' id='servicio' name='servicio' value='$servicio' readonly>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                    echo "<label for='nombre_cliente'>NOMBRE DEL CLIENTE:</label>";
                                    echo "<input type='text' class='form-control' id='nombre_cliente' name='nombre_cliente' value='$nombre_cliente' readonly>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                    echo "<label for='ap_paterno'>APELLIDO PATERNO:</label>";
                                    echo "<input type='text' class='form-control' id='ap_paterno' name='ap_paterno' value='$ap_paterno' readonly>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                    echo "<label for='ap_materno'>APELLIDO MATERNO:</label>";
                                    echo "<input type='text' class='form-control' id='ap_materno' name='ap_materno' value='$ap_materno' readonly>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                    echo "<label for='razon'>RAZÓN:</label>";
                                    echo "<input type='text' class='form-control' id='razon' name='razon' value='$razon' readonly>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                    echo "<label for='id_nombre_seleccionado'>ID NOMBRE SELECCIONADO:</label>";
                                    echo "<input type='text' class='form-control' id='id_nombre_seleccionado' name='id_nombre_seleccionado' value='$id_nombre_seleccionado' readonly>";
                                    echo "</div>";
                                    echo "</div>";

                                    // Realizar una consulta a la base de datos para obtener más información sobre id_nombre_seleccionado
                                    $sql = "SELECT * FROM auto_registro WHERE id = $id_nombre_seleccionado";
                                    $result = $conn->query($sql);

                                    // Verificar si se encontraron resultados
                                    if ($result->num_rows > 0) {
                                        // Mostrar los resultados en campos de formulario
                                        echo "<div class='col-md-6'>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<div class='form-group'>";
                                            echo "<label for='estatura'>Estatura:</label>";
                                            echo "<input type='text' class='form-control' id='estatura' name='estatura' value='" . $row['estatura'] . "' readonly>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='alergias'>Alergias:</label>";
                                            echo "<input type='text' class='form-control' id='alergias' name='alergias' value='" . $row['alergias'] . "' readonly>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='enfermedades'>Enfermedades:</label>";
                                            echo "<input type='text' class='form-control' id='enfermedades' name='enfermedades' value='" . $row['enfermedades'] . "' readonly>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='fracturas'>Fracturas:</label>";
                                            echo "<input type='text' class='form-control' id='fracturas' name='fracturas' value='" . $row['fracturas'] . "' readonly>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='antecedentes'>Antecedentes:</label>";
                                            echo "<input type='text' class='form-control' id='antecedentes' name='antecedentes' value='" . $row['antecedentes'] . "' readonly>";
                                            echo "</div>";
                                            echo "<div class='form-group'>";
                                            echo "<label for='otros'>Otros:</label>";
                                            echo "<input type='text' class='form-control' id='otros' name='otros' value='" . $row['otros'] . "' readonly>";
                                            echo "</div>";
                                        }
                                        echo "</div>"; // Cierre de col-md-5
                                        echo "</div>"; // Cierre de row
                                    } else {
                                        echo "<p>No se encontraron resultados para el ID proporcionado.</p>";
                                    }
                                } else {
                                    echo "<p>No se recibieron todos los datos necesarios.</p>";
                                }

                                // Cerrar la conexión a la base de datos
                                $conn->close();
                                ?>
                                <button id="btn-registrar" type="submit" class="btn btn-primary">REGISTRAR CLIENTE</button>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
