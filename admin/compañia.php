<?php
session_start(); // Inicia la sesión si aún no está iniciada
?>

<?php include 'menu.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro de empleado</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registro de Compañia</h1>
    </div>


    <div class="row">

        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">REGISTRO DE COMPAÑIA</h6>
                    <div class="dropdown no-arrow">

                    </div>
                </div>
                <div class="card-body">

                    <!-- Contenido de registro--->
                    <form action="procesar_registro.php" method="POST">
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
                                    <label for="nombre">NOMBRE COMPLETO:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off"
                                        required>
                                </div>
                                <!-- Campo oculto para almacenar el ID del empleado -->
                                <input type="hidden" id="id_empleado" name="id_empleado">
                                <div id="resultados"></div>


                                <!-- Campo para Email -->
                                <div class="form-group">
                                    <label for="email">CORREO:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <!-- Campo para Número de Celular -->
                                <div class="form-group">
                                    <label for="telefono">TELÉFONO:</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="10"
                                        required>
                                </div>

                                <!-- Campo para Sector Industrial -->
                                <div class="form-group">
                                    <label for="sector_industrial">SECTOR INDUSTRIAL:</label>
                                    <input type="text" class="form-control" id="sector_industrial"
                                        name="sector_industrial" required>
                                </div>
                                <!-- Campos para Dirección -->
                                <div class="form-group">
                                    <label for="direccion1">DIRECCIÓN LINEA 1:</label>
                                    <input type="text" class="form-control" id="direccion1" name="direccion1"
                                        oninput="convertirAMayusculas(this)" required>
                                </div>

                                <div class="form-group">
                                    <label for="direccion2">DIRECCIÓN LINEA 2:</label>
                                    <input type="text" class="form-control" id="direccion2" name="direccion2"
                                        oninput="convertirAMayusculas(this)" required>
                                </div>

                            </div>

                            <div class="col-md-6">


                                <!-- Campo para Sitio Web -->
                                <div class="form-group">
                                    <label for="sitio_web">SITIO WEB:</label>
                                    <input type="url" class="form-control" id="sitio_web" name="sitio_web">
                                </div>
                                <!-- Campo para Estatus -->
                                <div class="form-group">
                                    <label for="estatus">ESTATUS:</label>
                                    <select class="form-control" id="estatus" name="estatus" required>
                                        <option value="ACTIVO">ACTIVO</option>
                                    </select>
                                </div>





                                <div class="form-group">
                                    <label for="numero_interno">NÚMERO INTERNO:</label>
                                    <input type="text" class="form-control" id="numero_interno" name="numero_interno"
                                        pattern="[0-9]{1,10}" maxlength="10" required>
                                </div>

                                <div class="form-group">
                                    <label for="numero_externo">NÚMERO EXTERNO:</label>
                                    <input type="text" class="form-control" id="numero_externo" name="numero_externo">
                                </div>

                                <div class="form-group">
                                    <label for="codigo_postal">CÓDIGO POSTAL:</label>
                                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal"
                                        required>
                                </div>


                                <div class="form-group">
                                    <label for="ciudad">CIUDAD:</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad" maxlength="58"
                                        oninput="convertirAMayusculas(this)" required>
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
<!-- End of Footer -->
<script>
$(document).ready(function() {
    // Función para manejar la selección de un empleado
    function seleccionarEmpleado(id, nombre) {
        // Agregar el nombre seleccionado al campo de nombre
        $("#nombre").val(nombre);
        // Almacenar el ID del empleado seleccionado en el campo oculto
        $("#id_empleado").val(id);

        // Limpiar los resultados de la búsqueda
        $("#resultados").empty();
    }


    $("#nombre").keyup(function() {
        var query = $(this).val();

        // Verificar si el campo de búsqueda no está vacío
        if (query.trim() !== "") {
            // Enviar la consulta AJAX al servidor
            $.ajax({
                url: "buscar_empleados.php",
                type: "GET",
                data: {
                    query: query,
                },
                dataType: "json",
                success: function(response) {
                    // Limpiar el contenedor de resultados
                    $("#resultados").empty();

                    // Mostrar los resultados y manejar la selección
                    $.each(response, function(index, empleado) {
                        $("#resultados").append(
                            '<div class="resultado" data-id="' + empleado.id +
                            '">' + empleado.nombre + "</div>"
                        );
                    });


                    // Manejar la selección de un empleado
                    $(".resultado").click(function() {
                        var idSeleccionado = $(this).data("id");
                        var nombreSeleccionado = $(this).text();
                        seleccionarEmpleado(idSeleccionado, nombreSeleccionado);
                    });
                },
            });
        } else {
            // Si el campo de búsqueda está vacío, limpiar los resultados
            $("#resultados").empty();
        }
    });
});



$(document).ready(function() {
    $("#telefono").on("input", function() {
        var telefono = $(this).val();
        // Eliminar cualquier carácter que no sea un número
        telefono = telefono.replace(/\D/g, "");
        // Truncar la entrada para que solo contenga los primeros 10 dígitos
        telefono = telefono.slice(0, 10);
        $(this).val(telefono);
    });
});

$(document).ready(function() {
    $("#numero_interno, #numero_externo, #codigo_postal").on(
        "input",
        function() {
            var inputValue = $(this).val();
            // Eliminar cualquier carácter que no sea un número
            inputValue = inputValue.replace(/\D/g, "");
            // Truncar la entrada a 10 caracteres para "NÚMERO INTERNO" y "NÚMERO EXTERNO"
            if (
                $(this).attr("id") === "numero_interno" ||
                $(this).attr("id") === "numero_externo"
            ) {
                inputValue = inputValue.slice(0, 10);
            }
            // Limitar la entrada a exactamente 5 dígitos para "CÓDIGO POSTAL"
            if ($(this).attr("id") === "codigo_postal") {
                inputValue = inputValue.slice(0, 5);
            }
            $(this).val(inputValue);
        }
    );
});

$(document).ready(function() {
    $("#ciudad").on("input", function() {
        var ciudad = $(this).val();
        // Eliminar cualquier carácter que no sea una letra o un espacio
        ciudad = ciudad.replace(/[^a-zA-Z\s]/g, "");
        $(this).val(ciudad);
    });
});

$(document).ready(function() {
    $("#compania").on("input", function() {
        var compania = $(this).val();
        // Eliminar cualquier carácter que no sea una letra o un espacio
        compania = compania.replace(/[^a-zA-Z\s]/g, "");
        $(this).val(compania);
    });
});

//Convertit a mayusculas

function convertirAMayusculas(elemento) {
    elemento.value = elemento.value.toUpperCase();
}

function convertirAMayusculas(elemento) {
    elemento.value = elemento.value.toUpperCase();
}

function convertirAMayusculas(elemento) {
    elemento.value = elemento.value.toUpperCase();
}
</script>
</div>

</div>


</body>


</html>