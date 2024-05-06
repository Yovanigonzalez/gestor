$(document).ready(function () {
    // Función para manejar la selección de un empleado
    // Modificar la función para que reciba el ID del usuario seleccionado
    function seleccionarEmpleado(id, nombre) {
      // Agregar el ID seleccionado a un campo oculto en el formulario
      $("#id_empleado").val(id);
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
                '<div class="resultado" data-id="' +
                  empleado.id +
                  '">' +
                  empleado.nombre +
                  "</div>"
              );
            });
  
            // Manejar la selección de un empleado
            // Modificar la llamada a la función para incluir el ID
            $(".resultado").click(function () {
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
  
    $("#telefono").on("input", function () {
      var telefono = $(this).val();
      // Eliminar cualquier carácter que no sea un número
      telefono = telefono.replace(/\D/g, "");
      // Truncar la entrada para que solo contenga los primeros 10 dígitos
      telefono = telefono.slice(0, 10);
      $(this).val(telefono);
    });
  
    $("#numero_interno, #numero_externo, #codigo_postal").on("input", function () {
      var inputValue = $(this).val();
      // Eliminar cualquier carácter que no sea un número
      inputValue = inputValue.replace(/\D/g, "");
      // Truncar la entrada a 10 caracteres para "NÚMERO INTERNO" y "NÚMERO EXTERNO"
      if ($(this).attr("id") === "numero_interno" || $(this).attr("id") === "numero_externo") {
        inputValue = inputValue.slice(0, 10);
      }
      // Limitar la entrada a exactamente 5 dígitos para "CÓDIGO POSTAL"
      if ($(this).attr("id") === "codigo_postal") {
        inputValue = inputValue.slice(0, 5);
      }
      $(this).val(inputValue);
    });
  
    $("#ciudad").on("input", function () {
      var ciudad = $(this).val();
      // Eliminar cualquier carácter que no sea una letra o un espacio
      ciudad = ciudad.replace(/[^a-zA-Z\s]/g, "");
      $(this).val(ciudad);
    });
  
    $("#compania").on("input", function () {
      var compania = $(this).val();
      // Eliminar cualquier carácter que no sea una letra o un espacio
      compania = compania.replace(/[^a-zA-Z\s]/g, "");
      $(this).val(compania);
    });
  
    //Convertit a mayusculas
    function convertirAMayusculas(elemento) {
      elemento.value = elemento.value.toUpperCase();
    }
  });
  