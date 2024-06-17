<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tratamiento</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/citas.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">TRATAMIENTO</h1>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">TRATAMIENTO</h6>
                        <div class="dropdown no-arrow">
                            <!-- Aquí puedes poner el contenido de tu menú desplegable si es necesario -->
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Formulario -->
                        <form action="guardar_tratamiento.php" method="POST">
                            <div class="row">
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
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <?php
                                        include '../config/conexion.php';
                                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $sql = "SELECT * FROM tabla_diagnostico WHERE id = ?";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("i", $id);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='expediente'>EXPEDIENTE:</label>";
                                                    echo "<input type='text' class='form-control' id='expediente' name='expediente' value='" . htmlspecialchars($row['expediente']) . "' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='servicio'>ESTUDIO:</label>";
                                                    echo "<input type='text' class='form-control' id='servicio' name='servicio' value='" . htmlspecialchars($row['servicio']) . "' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='nombre_cliente'>NOMBRE:</label>";
                                                    echo "<input type='text' class='form-control' id='nombre_cliente' name='nombre_cliente' value='" . htmlspecialchars($row['nombre_cliente']) . "' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='ap_paterno'>APELLIDO PATERNO:</label>";
                                                    echo "<input type='text' class='form-control' id='ap_paterno' name='ap_paterno' value='" . htmlspecialchars($row['ap_paterno']) . "' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='ap_materno'>APELLIDO MATERNO:</label>";
                                                    echo "<input type='text' class='form-control' id='ap_materno' name='ap_materno' value='" . htmlspecialchars($row['ap_materno']) . "' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='razon'>RAZÓN:</label>";
                                                    echo "<textarea class='form-control' id='razon' name='razon' readonly>" . htmlspecialchars($row['razon']) . "</textarea>";
                                                    echo "</div>";
                                                    //echo "<div class='form-group'>";
                                                    //echo "<label for='id_nombre_seleccionado'>ID:</label>";
                                                    //echo "<input type='text' class='form-control' id='id_nombre_seleccionado' name='id_nombre_seleccionado' value='" . htmlspecialchars($row['id_nombre_seleccionado']) . "' readonly>";
                                                    //echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='resultados'>RESULTADOS:</label>";
                                                    echo "<textarea class='form-control' id='resultados' name='resultados' readonly>" . htmlspecialchars($row['resultados']) . "</textarea>";
                                                    echo "</div>";
                                                }
                                            } else {
                                                echo "<p>No se encontraron datos de tratamiento para el ID proporcionado.</p>";
                                            }
                                            $stmt->close();
                                            $conn->close();
                                        } else {
                                            echo "<p></p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Campos adicionales a la derecha -->
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">DESCRIPCIÓN:</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" oninput="convertirAMayusculas(this)"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="recomendaciones">RECOMENDACIONES:</label>
                                        <textarea class="form-control" id="recomendaciones" name="recomendaciones" oninput="convertirAMayusculas(this)"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="medicamentos">MEDICAMENTOS:</label>
                                        <textarea class="form-control" id="medicamentos" name="medicamentos" oninput="convertirAMayusculas(this); mostrarLista(this.value)"></textarea>
                                        <ul id="listaMedicamentos"></ul>
                                    </div>

                                    <script>
                                        function mostrarLista(texto) {
                                            // Dividir el texto en líneas
                                            var lineas = texto.split('\n');
                                            var listaHTML = '';

                                            // Construir la lista HTML
                                            for (var i = 0; i < lineas.length; i++) {
                                                var medicamento = lineas[i].trim();
                                                if (medicamento !== '') {
                                                    listaHTML += '<li>' + medicamento + '</li>';
                                                }
                                            }

                                            // Mostrar la lista
                                            document.getElementById('listaMedicamentos').innerHTML = listaHTML;
                                        }
                                    </script>


                                    <script>
                                        function convertirAMayusculas(elemento) {
                                            elemento.value = elemento.value.toUpperCase();
                                        }
                                    </script>

                                        <!--<div class="form-group">
                                            <label for="progreso">Progreso:</label>
                                            <textarea class="form-control" id="progreso" name="progreso"></textarea>
                                        </div>-->
                                        <?php
                                        include '../config/conexion.php';

                                        // Consulta para obtener el último folio de diagnóstico
                                        $sql = "SELECT MAX(folio_diagnostico) AS ultimo_folio FROM tabla_tratamiento";
                                        $resultado = $conn->query($sql);

                                        if ($resultado->num_rows > 0) {
                                            $fila = $resultado->fetch_assoc();
                                            // Obtener el último folio y sumarle 1
                                            $folio_siguiente = $fila['ultimo_folio'] + 1;
                                        } else {
                                            // Si no hay registros, comenzar con el folio 1
                                            $folio_siguiente = 1;
                                        }

                                        // Cerrar la conexión a la base de datos
                                        $conn->close();
                                        ?>

                                        <!-- En el formulario HTML, muestra el folio obtenido y deshabilita la edición -->
                                        <div class="form-group">
                                            <label for="folio_diagnostico">FOLIO DE DIAGNÓSTICO:</label>
                                            <input type="text" class="form-control" id="folio_diagnostico" name="folio_diagnostico" value="<?php echo $folio_siguiente; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="fecha_inicio">FECHA INICIO:</label>
                                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" min="<?php echo date('Y-m-d'); ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="fecha_fin">FECHA FIN:</label>
                                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" min="<?php echo date('Y-m-d'); ?>">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <button id="btn-registrar" type="submit" class="btn btn-primary">REGISTRAR TRATAMIENTO</button>
                        </form>
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
