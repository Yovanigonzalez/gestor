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

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>



<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar Empleado</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">REGISTRO DE EMPLEADO</h6>
                    <div class="dropdown no-arrow">

                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <!-- Contenido de registro--->
                    <form action="procesar_registro.php" method="POST">
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">NOMBRE:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off"
                                        required>
                                </div>
                                <div id="resultados"></div>


                                <div class="form-group">
                                    <label for="telefono">TELÉFONO:</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="10"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="categoria">CATEGORÍA / POSICIÓN:</label>
                                    <select class="form-control" id="categoria" name="categoria" required>
                                        <option>SELECCIONA UNA CATEGORÍA / POSICIÓN:</option>
                                        <option value="MÉDICO">MÉDICO</option>
                                        <option value="ENFERMERA">ENFERMERA</option>
                                        <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="direccion">DIRECCIÓN:</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion"
                                        oninput="convertirAMayusculas(this)" required>
                                </div>




                                <div class="form-group">
                                    <label for="numero_interno">NÚMERO INTERNO:</label>
                                    <input type="text" class="form-control" id="numero_interno" name="numero_interno"
                                        pattern="[0-9]{1,10}" maxlength="10" required>
                                </div>



                            </div>

                            <div class="col-md-6">

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





                                <div class="form-group">
                                    <label for="estado">ESTADO:</label>
                                    <select class="form-control" id="estado" name="estado" required>
                                        <option>SELECCIONA UN ESTADO:</option>
                                        <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                                        <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
                                        <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
                                        <option value="CAMPECHE">CAMPECHE</option>
                                        <option value="CHIAPAS">CHIAPAS</option>
                                        <option value="CHIHUAHUA">CHIHUAHUA</option>
                                        <option value="CIUDAD DE MÉXICO">CIUDAD DE MÉXICO</option>
                                        <option value="COAHUILA">COAHUILA</option>
                                        <option value="COLIMA">COLIMA</option>
                                        <option value="DURANGO">DURANGO</option>
                                        <option value="ESTADO DE MÉXICO">ESTADO DE MÉXICO</option>
                                        <option value="GUANAJUATO">GUANAJUATO</option>
                                        <option value="GUERRERO">GUERRERO</option>
                                        <option value="HIDALGO">HIDALGO</option>
                                        <option value="JALISCO">JALISCO</option>
                                        <option value="MICHOACÁN">MICHOACÁN</option>
                                        <option value="MORELOS">MORELOS</option>
                                        <option value="NAYARIT">NAYARIT</option>
                                        <option value="NUEVO LEÓN">NUEVO LEÓN</option>
                                        <option value="OAXACA">OAXACA</option>
                                        <option value="PUEBLA">PUEBLA</option>
                                        <option value="QUERÉTARO">QUERÉTARO</option>
                                        <option value="QUINTANA ROO">QUINTANA ROO</option>
                                        <option value="SAN LUIS POTOSÍ">SAN LUIS POTOSÍ</option>
                                        <option value="SINALOA">SINALOA</option>
                                        <option value="SONORA">SONORA</option>
                                        <option value="TABASCO">TABASCO</option>
                                        <option value="TAMAULIPAS">TAMAULIPAS</option>
                                        <option value="TLAXCALA">TLAXCALA</option>
                                        <option value="VERACRUZ">VERACRUZ</option>
                                        <option value="YUCATÁN">YUCATÁN</option>
                                        <option value="ZACATECAS">ZACATECAS</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                  <label for="compania">COMPAÑÍA:</label>
                                  <select class="form-control" id="companiaSelect" name="compania" required>
                                      <option value="">SELECCIONA UNA COMPAÑIA</option>
                                      <option value="COMPAÑIA 1">COMPAÑIA 1</option>
                                      <option value="COMPAÑIA 2">COMPAÑIA 2</option>
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






                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">REGISTRAR EMPLEADO</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

 
    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">



        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include 'footer.php'; ?>
<!-- End of Footer -->
<script src="js/empleado.js"></script>

<script>
    $(document).ready(function () {
  // Función para manejar la selección de un empleado
  function seleccionarEmpleado(nombre) {
    // Agregar el nombre seleccionado al campo de nombre
    $("#nombre").val(nombre);

    // Limpiar los resultados de la búsqueda
    $("#resultados").empty();
  }

  $("#nombre").keyup(function () {
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
        success: function (response) {
          // Limpiar el contenedor de resultados
          $("#resultados").empty();

          // Mostrar los resultados y manejar la selección
          $.each(response, function (index, empleado) {
            $("#resultados").append(
              '<div class="resultado">' + empleado.nombre + "</div>"
            );
          });

          // Manejar la selección de un empleado
          $(".resultado").click(function () {
            var nombreSeleccionado = $(this).text();
            seleccionarEmpleado(nombreSeleccionado);
          });
        },
      });
    } else {
      // Si el campo de búsqueda está vacío, limpiar los resultados
      $("#resultados").empty();
    }
  });
});

$(document).ready(function () {
  $("#telefono").on("input", function () {
    var telefono = $(this).val();
    // Eliminar cualquier carácter que no sea un número
    telefono = telefono.replace(/\D/g, "");
    // Truncar la entrada para que solo contenga los primeros 10 dígitos
    telefono = telefono.slice(0, 10);
    $(this).val(telefono);
  });
});

$(document).ready(function () {
  $("#numero_interno, #numero_externo, #codigo_postal").on(
    "input",
    function () {
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

$(document).ready(function () {
  $("#ciudad").on("input", function () {
    var ciudad = $(this).val();
    // Eliminar cualquier carácter que no sea una letra o un espacio
    ciudad = ciudad.replace(/[^a-zA-Z\s]/g, "");
    $(this).val(ciudad);
  });
});

$(document).ready(function () {
  $("#compania").on("input", function () {
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
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


</body>


</html>