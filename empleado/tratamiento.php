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
                        <form action="guardar_citas.php" method="POST" onsubmit="return validarFormulario()">
                            <div class="row">
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
                                                    echo "<label for='expediente'>Expediente:</label>";
                                                    echo "<input type='text' class='form-control' id='expediente' name='expediente' value='" . htmlspecialchars($row['expediente']) . "' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='servicio'>Servicio:</label>";
                                                    echo "<input type='text' class='form-control' id='servicio' name='servicio' value='" . htmlspecialchars($row['servicio']) . "' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='nombre_cliente'>Nombre del Cliente:</label>";
                                                    echo "<input type='text' class='form-control' id='nombre_cliente' name='nombre_cliente' value='" . htmlspecialchars($row['nombre_cliente']) . "' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='ap_paterno'>Apellido Paterno:</label>";
                                                    echo "<input type='text' class='form-control' id='ap_paterno' name='ap_paterno' value='" . htmlspecialchars($row['ap_paterno']) . "' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='ap_materno'>Apellido Materno:</label>";
                                                    echo "<input type='text' class='form-control' id='ap_materno' name='ap_materno' value='" . htmlspecialchars($row['ap_materno']) . "' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='razon'>Razón:</label>";
                                                    echo "<textarea class='form-control' id='razon' name='razon' readonly>" . htmlspecialchars($row['razon']) . "</textarea>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='id_nombre_seleccionado'>ID Nombre Seleccionado:</label>";
                                                    echo "<input type='text' class='form-control' id='id_nombre_seleccionado' name='id_nombre_seleccionado' value='" . htmlspecialchars($row['id_nombre_seleccionado']) . "' readonly>";
                                                    echo "</div>";
                                                    echo "<div class='form-group'>";
                                                    echo "<label for='resultados'>Resultados:</label>";
                                                    echo "<textarea class='form-control' id='resultados' name='resultados' readonly>" . htmlspecialchars($row['resultados']) . "</textarea>";
                                                    echo "</div>";
                                                }
                                            } else {
                                                echo "<p>No se encontraron datos de tratamiento para el ID proporcionado.</p>";
                                            }
                                            $stmt->close();
                                            $conn->close();
                                        } else {
                                            echo "<p>No puedes hacer un tratamiento porque recuerda que para poder hacerlo, primero deberás hacer el diagnóstico.</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Campos adicionales a la derecha -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción:</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="recomendaciones">Recomendaciones:</label>
                                            <textarea class="form-control" id="recomendaciones" name="recomendaciones"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="medicamentos">Medicamentos:</label>
                                            <textarea class="form-control" id="medicamentos" name="medicamentos"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="progreso">Progreso:</label>
                                            <textarea class="form-control" id="progreso" name="progreso"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="folio_diagnostico">Folio de Diagnóstico:</label>
                                            <input type="text" class="form-control" id="folio_diagnostico" name="folio_diagnostico">
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha_inicio">Fecha Inicio:</label>
                                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha_fin">Fecha Fin:</label>
                                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="btn-registrar" type="submit" class="btn btn-primary">REGISTRAR CLIENTE</button>
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
