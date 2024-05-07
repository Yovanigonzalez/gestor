    // Función para buscar usuarios por nombre
    function buscarUsuario() {
      // Obtenemos el valor del campo de búsqueda
      var input = document.getElementById("busquedaNombre");
      var filtro = input.value.toUpperCase();
      var tabla = document.getElementById("dataTable");
      var filas = tabla.getElementsByTagName("tr");
    
      // Iteramos sobre las filas de la tabla y ocultamos aquellas que no coincidan con la búsqueda
      for (var i = 0; i < filas.length; i++) {
        var celdaNombre = filas[i].getElementsByTagName("td")[0];
        if (celdaNombre) {
          var textoCelda = celdaNombre.textContent || celdaNombre.innerText;
          if (textoCelda.toUpperCase().indexOf(filtro) > -1) {
            filas[i].style.display = "";
          } else {
            filas[i].style.display = "none";
          }
        }
      }
    }
    
        // Función para cargar los usuarios desde el servidor
        function cargarUsuarios() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Cuando se recibe la respuesta del servidor
                var usuarios = JSON.parse(this.responseText);
    
                // Limpiar la tabla
                var tablaUsuarios = document.getElementById("tabla-usuarios");
                tablaUsuarios.innerHTML = "";
    
                // Iterar sobre los usuarios y agregarlos a la tabla
                for (var i = 0; i < usuarios.length; i++) {
                    var usuario = usuarios[i];
                    var fila = "<tr>";
                    fila += "<td>" + usuario.nombre + "</td>";
                    //fila += "<td>" + usuario.correo + "</td>";
                    fila += "<td>" + usuario.rol + "</td>";
                    fila += "<td>";
                    fila += "<button class='btn btn-success' onclick='recontratarUsuario(" +
                        usuario.id +
                        ")'>RECONTRATAR</button>";
                    fila += "</td>";
                    fila += "</tr>";
                    tablaUsuarios.innerHTML += fila;
                }
            }
        };
        xhttp.open("GET", "obtener_usuarios_inactivos.php", true); // Reemplaza "obtener_usuarios.php" con la URL de tu script PHP para obtener usuarios
        xhttp.send();
    }
    
    
    function recontratarUsuario(id) {
        // Redirigir al usuario mientras se realiza la solicitud AJAX
        window.location.href = "recontratar_usuario.php?mensaje_tipo=info&mensaje=Procesando solicitud de recontratación...";
        
        // Realizar una solicitud AJAX al servidor para cambiar el estado del usuario
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            // No se necesita manejar la respuesta del servidor aquí
        };
        xhttp.open("POST", "recontratar_usuario.php", true); // Ruta a tu script PHP para recontratar usuarios
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id=" + id);
    }
    
    
    
    
    
    // Función para editar un usuario
    // Función para editar un usuario
    function editarUsuario(id) {
      // Redirigir a la página de edición con el ID del usuario como parámetro en la URL
      window.location.href = "editar_usuario_inactivo.php?id=" + id;
    }
    
    // Función para confirmar la eliminación de un usuario
    function confirmarEliminarUsuario(id) {
      // Mostrar mensaje de confirmación
      var confirmacion = confirm(
        "¿Estás seguro de que quieres eliminar este usuario?"
      );
      // Si el usuario confirma la eliminación
      if (confirmacion) {
        // Llamar a la función para eliminar el usuario
        eliminarUsuario(id);
      }
    }
    
    // Función para eliminar un usuario
    function eliminarUsuario(id) {
      // Realizar una solicitud AJAX al servidor para cambiar el estado del usuario
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          // Manejar la respuesta del servidor
          var response = JSON.parse(this.responseText);
          if (response.success) {
            // Si la operación fue exitosa, mostrar un mensaje de éxito
            alert(response.message);
            // Recargar la lista de usuarios
            cargarUsuarios();
          } else {
            // Si hubo un error, mostrar un mensaje de error
            alert(response.message);
          }
        }
      };
      xhttp.open("POST", "eliminar_usuario.php", true); // Reemplaza "eliminar_usuario.php" con la URL de tu script PHP para eliminar usuarios
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("id=" + id);
    }
    
    // Llamar a la función para cargar usuarios cuando se cargue la página
    window.onload = function () {
      cargarUsuarios();
    };
    