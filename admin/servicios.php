<?php include 'menu.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro de Servicios</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">REGISTRO DE SERVICIOS</h1>
    </div>


    <div class="row">

        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">REGISTRO DE SERVICIOS</h6>
                    <div class="dropdown no-arrow">

                    </div>
                </div>
                <div class="card-body">

                    <!-- Contenido de registro--->
                    <form action="procesar_servicios.php" method="POST">
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">NOMBRE:</label>
                                    <select class="form-control" id="nombre" name="nombre" required>
                                        <option value="" disabled selected>SELECCIONA UN NOMBRE DE SERVICIO</option>
                                        <option value="CONSULTA GENERAL">CONSULTA GENERAL</option>
                                        <option value="EXAMEN DE SANGRE">EXAMEN DE SANGRE</option>
                                        <option value="ECOGRAFÍA">ECOGRAFÍA</option>
                                        <option value="RADIOGRAFÍA">RADIOGRAFÍA</option>
                                        <!-- Agrega más opciones según los nombres de servicio disponibles -->
                                    </select>
                                </div>


                                <!-- Campo para Descripción -->

                                <div class="form-group">
                                    <label for="descripcion">DESCRIPCION:</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" required
                                        oninput="convertirAMayusculas(this)">
                                </div>



                                <!-- Campo para Precio -->
                                <div class="form-group">
                                    <label for="precio">PRECIO:</label>
                                    <input type="text" class="form-control" id="precio" name="precio" oninput="validarPrecio(this)" required>
                                </div>

                                <script>
                                    function validarPrecio(input) {
                                        // Expresión regular para verificar si solo hay números
                                        var regex = /^[0-9]*$/;

                                        // Si el valor no contiene solo números, borrarlo
                                        if (!regex.test(input.value)) {
                                            input.value = '';
                                        }
                                    }
                                </script>


                                <!-- Campo para Categoría de Servicio -->
                                <div class="form-group">
                                    <label for="categoria_servicio">CATEGORIA SERVICIO:</label>
                                    <select class="form-control" id="categoria_servicio" name="categoria_servicio"
                                        required>
                                        <option value="" disabled selected>SELECCIONA UNA CATEGORÍA</option>
                                        <option value="CONSULTA GENERAL">CONSULTA GENERAL</option>
                                        <option value="EXAMEN DE SANGRE">EXAMEN DE SANGRE</option>
                                        <option value="ECOGRAFÍA">ECOGRAFÍA</option>
                                        <option value="RADIOGRAFÍA">RADIOGRAFÍA</option>
                                        <!-- Agrega más opciones según las categorías disponibles -->
                                    </select>
                                </div>

                                <!-- Campos para Dirección -->

                            </div>

                            <div class="col-md-6">
                                <!-- Campo para Duración -->
                                <div class="form-group">
                                    <label for="duracion">DURACION:</label>
                                    <select class="form-control" id="duracion" name="duracion" required>
                                        <option value="" disabled selected>SELECCIONA LA DURACIÓN DEL SERVICIO</option>
                                        <option value="30 MINUTOS">30 MINUTOS</option>
                                        <option value="1 HORA">1 HORA</option>
                                        <option value="1 HORA 30 MINUTOS">1 HORA 30 MINUTOS</option>
                                        <option value="2 HORAS">2 HORAS</option>
                                        <!-- Agrega más opciones según las duraciones disponibles -->
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="estado_servicio">ESTADO SERVICIO:</label>
                                    <select class="form-control" id="estado_servicio" name="estado_servicio" required>
                                        <option value="" disabled selected>SELECCIONA EL ESTADO DE SERVICIO</option>
                                        <option value="DISPONIBLE">DISPONIBLE</option>
                                        <!-- Agrega más opciones según los estados disponibles -->
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="compania">COMPAÑÍA:</label>
                                    <select class="form-control" id="companiaSelect" name="compania" required>
                                        <option value="">SELECCIONA UNA COMPAÑIA</option>
                                        <option value="COMPAÑIA 1">COMPAÑIA 1</option>
                                        <!--<option value="COMPAÑIA 2">COMPAÑIA 2</option>-->
                                    </select>
                                    <!-- Este campo de texto se ocultará y se actualizará con JavaScript -->
                                    <input type="hidden" id="compania" name="compania" required>
                                </div>
                                <script>
                                document.getElementById("companiaSelect").addEventListener("change", function() {
                                    var selectedOption = this.options[this.selectedIndex].value;
                                    document.getElementById("compania").value = selectedOption;
                                });
                                </script>


                                <div class="form-group">
                                    <label for="estatus">ESTATUS:</label>
                                    <select class="form-control" id="estatus" name="estatus" required>
                                        <option value="ACTIVO">ACTIVO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">REGISTRAR EMPLEADO</button>
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


<script>
    function convertirAMayusculas(input) {
        input.value = input.value.toUpperCase();
    }
</script>

<!-- End of Footer -->
</div>

</div>


</body>


</html>