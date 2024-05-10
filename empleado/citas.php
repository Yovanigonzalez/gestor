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
                                        <input type="text" class="form-control" id="fecha_hora" name="fecha_hora"
                                            readonly>
                                    </div>

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
                                        <label for="fecha_estudio">FECHA PARA ESTUDIO:</label>
                                        <input type="date" class="form-control" id="fecha_estudio" name="fecha_estudio"
                                            required>
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
                                        <input type="number" class="form-control" id="expediente" name="expediente" readonly>
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
    <script src="js/citas.js"></script>

    <script>
    // Función para seleccionar un resultado y llenar los campos
    function seleccionarResultado(id, nombre, ap_paterno, ap_materno, numero_expediente) {
        document.getElementById("nombre").value = nombre;
        document.getElementById("ap_paterno").value = ap_paterno;
        document.getElementById("ap_materno").value = ap_materno;
        document.getElementById("id_nombre_seleccionado").value = id;

        // Actualizar el valor del campo NUMERO DE EXPEDIENTE
        document.getElementById("expediente").value = numero_expediente;

        // Limpiar el contenido del elemento de resultados de búsqueda
        document.getElementById("resultado-busqueda").innerHTML = "";

        // Habilitar campos de apellido paterno y apellido materno y establecer sus valores
        document.getElementById("ap_paterno").disabled = false;
        document.getElementById("ap_materno").disabled = false;
        document.getElementById("ap_paterno").style.backgroundColor = "#eaecf4";
        document.getElementById("ap_materno").style.backgroundColor = "#eaecf4";

        // Activar el evento de clic en el botón "Registrar cliente"
        document.getElementById("btn-registrar").click();
    }
</script>


<script>
    // Función para manejar la búsqueda en tiempo real
function buscarNombre(str) {
  if (str.length == 0) {
    // Si no hay entrada, limpiar resultados y deshabilitar campos
    document.getElementById("resultado-busqueda").innerHTML = "";
    document.getElementById("ap_paterno").value = "";
    document.getElementById("ap_materno").value = "";
    document.getElementById("ap_paterno").disabled = true;
    document.getElementById("ap_materno").disabled = true;
    document.getElementById("ap_paterno").style.backgroundColor = "#eaecf4";
    document.getElementById("ap_materno").style.backgroundColor = "#eaecf4";
    return;
  } else {
    // Habilitar campos y cambiar color de fondo a blanco
    document.getElementById("ap_paterno").disabled = false;
    document.getElementById("ap_materno").disabled = false;
    document.getElementById("ap_paterno").style.backgroundColor = "#eaecf4";
    document.getElementById("ap_materno").style.backgroundColor = "#eaecf4";

    // Enviar solicitud al servidor para buscar nombres que coincidan con la entrada
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("resultado-busqueda").innerHTML =
          this.responseText;
      }
    };
    xmlhttp.open("GET", "buscar_nombre.php?q=" + str, true);
    xmlhttp.send();
  }
}

// Función para seleccionar un resultado y llenar los campos
// Función para seleccionar un resultado y llenar los campos


function limpiarWhatsApp(input) {
  // Eliminar caracteres no numéricos
  input.value = input.value.replace(/\D/g, "");

  // Limitar a 10 dígitos
  if (input.value.length > 10) {
    input.value = input.value.slice(0, 10);
  }
}

function validarTelefono(input) {
    var telefono = input.value;
    var telefonoHelp = document.getElementById("telefonoHelp");

    // Eliminar espacios en blanco y caracteres no numéricos
    telefono = telefono.replace(/\s+/g, '').replace(/[^0-9]/gi, '');

    if (telefono.length === 10) {
        // El número tiene 10 dígitos, se elimina el mensaje de ayuda
        telefonoHelp.textContent = '';
    } else {
        // El número no tiene 10 dígitos, mostrar un mensaje de ayuda
        telefonoHelp.textContent = 'El teléfono debe tener exactamente 10 dígitos.';
    }
}

function validarWhatsApp(input) {
    var whatsapp = input.value;
    var whatsappHelp = document.getElementById("whatsappHelp");

    // Eliminar espacios en blanco y caracteres no numéricos
    whatsapp = whatsapp.replace(/\s+/g, '').replace(/[^0-9]/gi, '');

    if (whatsapp.length === 10) {
        // El número tiene 10 dígitos, se elimina el mensaje de ayuda
        whatsappHelp.textContent = '';
    } else {
        // El número no tiene 10 dígitos, mostrar un mensaje de ayuda
        whatsappHelp.textContent = 'El número de WhatsApp debe tener exactamente 10 dígitos.';
    }
}

function validarCodigoPostal(input) {
  var codigoPostal = input.value;
  var codigoPostalHelp = document.getElementById("codigoPostalHelp");

  // Eliminar espacios en blanco y caracteres no numéricos
  codigoPostal = codigoPostal.replace(/\s+/g, '').replace(/[^0-9]/gi, '');

  if (codigoPostal.length === 5) {
      // El código postal tiene 5 dígitos, se elimina el mensaje de ayuda
      codigoPostalHelp.textContent = '';
  } else {
      // El código postal no tiene 5 dígitos, mostrar un mensaje de ayuda
      codigoPostalHelp.textContent = 'El código postal debe tener exactamente 5 dígitos.';
  }
}


    function validarFormulario() {
        // Obtener los valores de los campos
        var telefono = document.getElementById("telefono").value;
        var whatsapp = document.getElementById("whatsapp").value;
        var codigoPostal = document.getElementById("codigo_postal").value;
        var fechaNacimiento = document.getElementById("fecha_nacimiento").value;

        // Validar longitud del teléfono
        if (telefono.length !== 10) {
            alert("El teléfono debe tener 10 dígitos.");
            return false; // Detener el envío del formulario
        }

        // Validar longitud del WhatsApp
        if (whatsapp.length !== 10) {
            alert("El WhatsApp debe tener 10 dígitos.");
            return false; // Detener el envío del formulario
        }

        // Validar longitud del código postal
        if (codigoPostal.length !== 5) {
            alert("El código postal debe tener 5 dígitos.");
            return false; // Detener el envío del formulario
        }

        // Validar que la fecha de nacimiento no esté vacía
        if (fechaNacimiento === "") {
            alert("Debes seleccionar una fecha de nacimiento.");
            return false; // Detener el envío del formulario
        }

        // Si pasa todas las validaciones, el formulario se envía
        return true;
    }

</script>
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
    var fechaHoraFormateada = fechaHoraActual.toISOString().slice(0, 10) + " -- " + horas.toString().padStart(2, '0') +
        ":" + minutos.toString().padStart(2, '0') + " " + ampm;

    // Establecer el valor en el campo de entrada
    document.getElementById("fecha_hora").value = fechaHoraFormateada;
    </script>
    <!-- End of Footer -->
    </div>

    </div>


</body>


</html>