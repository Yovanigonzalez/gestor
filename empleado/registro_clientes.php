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

    <title>Registro de cliente</title>

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
            <h1 class="h3 mb-0 text-gray-800">REGISTRO CLIENTE</h1>
        </div>

        <div class="row">

            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">REGISTRO CLIENTE</h6>
                        <div class="dropdown no-arrow">

                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Contenido de registro--->
                        <form action="guardar_cliente.php" method="POST" onsubmit="return validarFormulario()">                            <!-- Aquí van los otros elementos del formulario -->

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
                                        <label for="nombre">NOMBRE:</label>
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



                                    <div class="form-group">
                                        <label for="telefono">TELÉFONO:</label>
                                        <input type="tel" class="form-control" id="telefono" name="telefono"
                                            maxlength="10" required oninput="validarTelefono(this)">
                                        <small id="telefonoHelp" class="form-text text-danger"></small>
                                    </div>


                                    <div class="form-group">
                                        <label for="fecha_nacimiento">FECHA DE NACIMIENTO:</label>
                                        <input type="date" class="form-control" id="fecha_nacimiento"
                                            name="fecha_nacimiento" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="genero">GENERO:</label>
                                        <select class="form-control" id="genero" name="genero" required>
                                            <option value="HOMBRE">HOMBRE</option>
                                            <option value="MUJER">MUJER</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="usuario">USUARIO:</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario"
                                            oninput="this.value = this.value.toUpperCase()" required>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="direccion">DIRECCIÓN:</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion"
                                            oninput="convertirAMayusculas(this)" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="numero_interno">NÚMERO INTERNO:</label>
                                        <input type="text" class="form-control" id="numero_interno"
                                            name="numero_interno" pattern="[0-9]{1,10}" maxlength="10" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_externo">NÚMERO EXTERNO:</label>
                                        <input type="text" class="form-control" id="numero_externo"
                                            name="numero_externo">
                                    </div>

                                    <div class="form-group">
                                        <label for="codigo_postal">CODIGO POSTAL:</label>
                                        <input type="text" class="form-control" id="codigo_postal" name="codigo_postal"
                                            maxlength="5" required oninput="validarCodigoPostal(this)">
                                        <small id="codigoPostalHelp" class="form-text text-danger"></small>
                                    </div>


                                    <div class="form-group">
                                        <label for="ciudad">CIUDAD:</label>
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" maxlength="58"
                                            oninput="convertirAMayusculas(this)" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="whatsapp">WHATSAPP:</label>
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                            maxlength="10" required oninput="validarWhatsApp(this)">
                                        <small id="whatsappHelp" class="form-text text-danger"></small>
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
    <script src="js/empleado.js"></script>
    <script src="js/citas.js"></script>


    <!-- End of Footer -->
    </div>

    </div>


</body>


</html>