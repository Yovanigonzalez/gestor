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
function seleccionarResultado(id, nombre, ap_paterno, ap_materno) {
  document.getElementById("nombre").value = nombre;
  document.getElementById("ap_paterno").value = ap_paterno;
  document.getElementById("ap_materno").value = ap_materno;
  document.getElementById("id_nombre_seleccionado").value = id;

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
