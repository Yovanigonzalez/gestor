<!-- Es un formulario de registro para clientes.
El formulario incluye campos para el nombre del cliente, apellido, número de teléfono, fecha de nacimiento, sexo,
dirección, ciudad, número de WhatsApp y estado. El formulario también incluye validación para algunos campos como
como campos obligatorios, formato de número de teléfono y coincidencia de patrones para el campo de número interno. -->

<?php include 'menu.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro de Citas</title>

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
            <h1 class="h3 mb-0 text-gray-800">REGISTRO DE CITAS</h1>
        </div>

        <div class="row">

            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">REGISTRO DE CITAS</h6>
                        <div class="dropdown no-arrow">

                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Contenido de registro--->
                        <form action="guardar_citas.php" method="POST" onsubmit="return validarFormulario()">
                            <!-- Aquí van los otros elementos del formulario -->

                            <div class="row">
                                <div class="col-md-6">

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

                                    <div class="form-group">
                                        <label for="fecha_hora">FECHA - HORA:</label>
                                        <input type="text" class="form-control" id="fecha_hora" name="fecha_hora"
                                            readonly>
                                    </div>

                                    <script>
                                    // Obtener la fecha y hora actual
                                    var fechaHoraActual = new Date();
                                    var fechaHoraFormateada = fechaHoraActual.toISOString().slice(0, 19).replace('T',
                                        ' '); // Formato: YYYY-MM-DD HH:MM:SS
                                    document.getElementById("fecha_hora").value = fechaHoraFormateada;
                                    </script>


                                    <?php
                                    // Obtener el nombre de usuario de la sesión
                                    $nombre_usuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : 'Nombre';
                                    ?>

                                    <div class="form-group">
                                        <label for="usuario">DOCTOR:</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario"
                                            value="<?php echo htmlspecialchars($nombre_usuario); ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="nombre">NOMBRE DEL CLIENTE:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            oninput="buscarNombre(this.value)" required>
                                        <div id="resultado-busqueda"></div>
                                        <!-- Aquí se mostrarán los resultados de la búsqueda en tiempo real -->
                                    </div>

                                    <!-- Campo oculto para almacenar el ID del nombre seleccionado -->
                                    <input type="hidden" id="id_nombre_seleccionado" name="id_nombre_seleccionado">




                                    <div class="form-group">
                                        <label for="ap_paterno">APELLIDO PATERNO:</label>
                                        <input type="text" class="form-control apellido" id="ap_paterno"
                                            name="ap_paterno" required readonly style="background-color: #eaecf4;">
                                    </div>
                                    <div class="form-group">
                                        <label for="ap_materno">APELLIDO MATERNO:</label>
                                        <input type="text" class="form-control apellido" id="ap_materno"
                                            name="ap_materno" required readonly style="background-color: #eaecf4;">
                                    </div>

                                    <?php
                                    // Conexión a la base de datos
                                    include '../config/conexion.php';

                                    // Verificar la conexión
                                    if ($conn->connect_error) {
                                        die("Conexión fallida: " . $conn->connect_error);
                                    }

                                    // Consulta SQL para obtener los servicios
                                    $sql = "SELECT * FROM servicios";
                                    $result = $conn->query($sql);
                                    ?>

                                    <!-- Formulario HTML -->
                                    <div class="form-group">
                                        <label for="servicio">SELECCIONA UN ESTUDIO:</label>
                                        <select class="form-control" id="servicio" name="servicio" required>
                                            <option value="" selected disabled>SELECCIONA UN ESTUDIO:</option>
                                            <?php
                                            // Mostrar opciones de servicios obtenidos de la base de datos
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['nombre'] . "' data-precio='" . $row['precio'] . "' data-duracion='" . $row['duracion'] . "' data-compania='" . $row['compania'] . "' data-estatus='" . $row['estatus'] . "'>" . $row['nombre'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="precio">PRECIO:</label>
                                        <input type="text" class="form-control" id="precio" name="precio" readonly>
                                    </div>

                                </div>
                                <div class="col-md-6">



                                    <div class="form-group">
                                        <label for="duracion">DURACIÓN:</label>
                                        <input type="text" class="form-control" id="duracion" name="duracion" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="compania">COMPAÑÍA:</label>
                                        <input type="text" class="form-control" id="compania" name="compania" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="estatus">ESTATUS:</label>
                                        <input type="text" class="form-control" id="estatus" name="estatus" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="fecha_hora_estudio">FECHA Y HORA PARA ESTUDIO:</label>
                                        <input type="datetime-local" class="form-control" id="fecha_hora_estudio" name="fecha_hora_estudio" required min="<?php echo date('Y-m-d\TH:i'); ?>">
                                    </div>



                                    <!-- Script para manejar el cambio en tiempo real en el campo de selección de servicios -->
                                    <script>
                                    document.getElementById("servicio").addEventListener("input", function() {
                                        var selectedOption = this.options[this.selectedIndex];

                                        // Obtener los datos del servicio seleccionado
                                        var precio = selectedOption.getAttribute('data-precio');
                                        var duracion = selectedOption.getAttribute('data-duracion');
                                        var compania = selectedOption.getAttribute('data-compania');
                                        var estatus = selectedOption.getAttribute('data-estatus');

                                        // Actualizar los campos con los datos del servicio seleccionado
                                        document.getElementById("precio").value = precio;
                                        document.getElementById("duracion").value = duracion;
                                        document.getElementById("compania").value = compania;
                                        document.getElementById("estatus").value = estatus;
                                    });
                                    </script>


                                    <div class="form-group">
                                        <label for="razon">RAZÓN POR LA CUAL SE VA A REALIZAR ESE ESTUDIO:</label>
                                        <input type="text" class="form-control" id="razon" name="razon"
                                            oninput="this.value = this.value.toUpperCase()" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="expediente">NUMERO DE EXPEDIENTE:</label>
                                        <input type="number" class="form-control" id="expediente" name="expediente"
                                            readonly>
                                    </div>




                                </div>
                            </div>
                            <button id="btn-registrar" type="submit" class="btn btn-primary">REGISTRAR CITA</button>
                        </form>

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

    <script src="js/compañia.js"></script>
    <script src="js/citas.js"></script>

    <!-- End of Footer -->
    </div>

    </div>


</body>


</html>