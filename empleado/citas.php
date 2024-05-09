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
                        <form action="guardar_citas.php" method="POST" onsubmit="return validarFormulario()">                            <!-- Aquí van los otros elementos del formulario -->

                            <div class="row">
                                <div class="col-md-6">

                                    <?php
                                    // Verifica si hay un mensaje en la sesión
                                    if(isset($_SESSION['mensaje']) && isset($_SESSION['mensaje_tipo'])) {
                                        $mensaje_tipo = $_SESSION['mensaje_tipo'];
                                        $mensaje = $_SESSION['mensaje'];
                                        // Mostrar la alerta de acuerdo al tipo de mensaje
                                        if ($mensaje_tipo === 'error') {
                                            // Mensaje de error personalizado para cuando el nombre del empleado ya existe
                                            if (strpos($mensaje, 'El nombre del empleado ya fue registrado anteriormente') !== false) {
                                                echo "<div class=\"alert alert-danger\">El nombre del empleado ya fue registrado anteriormente.</div>";
                                            } elseif (strpos($mensaje, 'El ID del empleado ya fue registrado anteriormente') !== false) {
                                                // Mensaje de error personalizado para cuando el ID del empleado ya existe
                                                echo "<div class=\"alert alert-danger\">El ID del empleado ya fue registrado anteriormente.</div>";
                                            } else {
                                                // Otro tipo de mensaje de error
                                                echo "<div class=\"alert alert-danger\">$mensaje</div>";
                                            }
                                        } else {
                                            // Otros tipos de mensajes (éxito, advertencia, etc.)
                                            echo "<div class=\"alert alert-$mensaje_tipo\">$mensaje</div>";
                                        }
                                        unset($_SESSION['mensaje']); // Elimina el mensaje para evitar que se muestre de nuevo en futuras visitas
                                        unset($_SESSION['mensaje_tipo']); // Elimina el tipo de mensaje
                                    }
                                    ?>



                                    <div class="form-group">
                                        <label for="fecha_hora">FECHA - HORA:</label>
                                        <input type="text" class="form-control" id="fecha_hora" name="fecha_hora" readonly>
                                    </div>


                                    <div class="form-group">
                                        <label for="genero">CAT ESTADO:</label>
                                        <select class="form-control" id="genero" name="genero" required>
                                            <option value="HOMBRE">HOMBRE</option>
                                            <option value="MUJER">MUJER</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                <div class="form-group">
                                        <label for="usuario">CLIENTE:</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario"
                                            oninput="this.value = this.value.toUpperCase()" required>
                                    </div>

                                <div class="form-group">
                                        <label for="estatus">ESTATUS:</label>
                                        <select class="form-control" id="estatus" name="estatus" required>
                                            <option value="ACTIVO">ACTIVO</option>
                                        </select>
                                    </div>



                                </div>
                            </div>
                            <button id="btn-registrar" type="submit" class="btn btn-primary">REGISTRAR CLIENTE</button>
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

    <script>
                                        // Obtener la fecha y hora actual en el huso horario GMT-6
                                        var fechaHoraActual = new Date();
                                        var offset = -6; // GMT-6
                                        var horaActual = fechaHoraActual.getUTCHours() + offset;
                                        if (horaActual < 0) {
                                            horaActual += 24; // Si es menor que 0, se suma 24 horas para obtener la hora correcta
                                        }

                                        // Obtener las horas y minutos en formato de 6 horas
                                        var horas = horaActual % 12 || 12; // Si es 0, se cambia a 12
                                        var minutos = fechaHoraActual.getUTCMinutes();
                                        var ampm = horaActual < 12 ? 'AM' : 'PM';

                                        // Formatear la fecha y hora en el formato deseado (YYYY-MM-DDThh:mm AM/PM)
                                        var fechaHoraFormateada = fechaHoraActual.toISOString().slice(0, 10) + " -- " + horas.toString().padStart(2, '0') + ":" + minutos.toString().padStart(2, '0') + " " + ampm;

                                        // Establecer el valor en el campo de entrada
                                        document.getElementById("fecha_hora").value = fechaHoraFormateada;
                                    </script>
    <!-- End of Footer -->
    </div>

    </div>


</body>


</html>