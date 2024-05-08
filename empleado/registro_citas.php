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
                        <form action="guardar-auto-registro.php" method="POST">
                            <!-- Aquí van los otros elementos del formulario -->

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="nombre">NOMBRE:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            oninput="this.value = this.value.toUpperCase()" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="ap_paterno">APELLIDO PATERNO:</label>
                                        <input type="text" class="form-control" id="ap_paterno" name="ap_paterno"
                                            oninput="this.value = this.value.toUpperCase()" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="ap_materno">APELLIDO MATERNO:</label>
                                        <input type="text" class="form-control" id="ap_materno" name="ap_materno"
                                            oninput="this.value = this.value.toUpperCase()" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="telefono">TELÉFONO:</label>
                                        <input type="tel" class="form-control" id="telefono" name="telefono"
                                            maxlength="10" required>
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
                                            oninput="this.value = this.value.toUpperCase()">
                                    </div>

                                    <div class="form-group">
                                        <label for="ciudad">CIUDAD:</label>
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" maxlength="58"
                                            oninput="convertirAMayusculas(this)" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="whatsapp">WHATSAPP:</label>
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                            oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                    <div class="form-group">
                                        <label for="estatus">ESTATUS:</label>
                                        <select class="form-control" id="estatus" name="estatus" required>
                                            <option value="ACTIVO">ACTIVO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">REGISTRAR CLIENTE</button>
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



    <!-- End of Footer -->
    </div>

    </div>


</body>


</html>