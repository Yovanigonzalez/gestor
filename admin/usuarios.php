<?php
session_start();

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

    <title>Usuarios</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>



<div class="container">
    <!-- Content Row -->
    <div class="row justify-content-center">

        <!-- Area Chart -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Gestión de Empleados</h6>
                    <div class="dropdown no-arrow">
                        <!-- Any dropdown content goes here -->
                    </div>
<<<<<<< HEAD
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Tabla para mostrar usuarios -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <!--<th>Correo Electrónico</th>-->
                                    <th>Rol</th>
                                    <th>Accioenes</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-usuarios">
                                <!-- Los usuarios se cargarán aquí dinámicamente -->
=======

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Gestión de Empleados</h6>
                                <div class="dropdown no-arrow">

                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <!-- Tabla para mostrar usuarios -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <div class="form-group">
    <input type="text" class="form-control" id="busquedaNombre" placeholder="Buscar por nombre" onkeyup="buscarUsuario()">
</div>

<script>
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
</script>

                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <!--<th>Correo Electrónico</th>-->
                                                <th>Rol</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabla-usuarios">
                                            <!-- Los usuarios se cargarán aquí dinámicamente -->
>>>>>>> 6e2c76ba1dcb6fda8b242d869bb0a052c199abcd
                                            <script>
// Función para cargar los usuarios desde el servidor
function cargarUsuarios() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
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
                fila += "<td>" + (usuario.estatus == 1 ? "Activo" : "Inactivo") + "</td>"; // Columna de estado
                fila += "<td>";
                fila += "<button class='btn btn-primary mr-1 d-lg-none' onclick='editarUsuario(" + usuario.id + ")'><i class='fas fa-pencil-alt'></i></button>";
                fila += "<button class='btn btn-danger d-lg-none' onclick='confirmarEliminarUsuario(" + usuario.id + ")'><i class='fas fa-trash-alt'></i></button>";
                fila += "<button class='btn btn-primary mr-1 d-none d-lg-inline-block' onclick='editarUsuario(" + usuario.id + ")'>Modificar</button>";
                fila += "<button class='btn btn-danger d-none d-lg-inline-block' onclick='confirmarEliminarUsuario(" + usuario.id + ")'>Eliminar</button>";
                fila += "<button class='btn btn-success ml-1' onclick='cambiarEstadoUsuario(" + usuario.id + ")'>" + (usuario.estatus == 1 ? "Desactivar" : "Activar") + "</button>";
                fila += "</td>";
                fila += "</tr>";
                tablaUsuarios.innerHTML += fila;
            }
        }
    };
    xhttp.open("GET", "obtener_usuarios.php", true); // Reemplaza "obtener_usuarios.php" con la URL de tu script PHP para obtener usuarios
    xhttp.send();
}


// Función para editar un usuario
function editarUsuario(id) {
    // Redirigir a la página de edición con el ID del usuario como parámetro en la URL
    window.location.href = "editar_usuario.php?id=" + id;
}

// Función para confirmar la eliminación de un usuario
function confirmarEliminarUsuario(id) {
    // Mostrar mensaje de confirmación
    var confirmacion = confirm("¿Estás seguro de que quieres eliminar este usuario?");
    // Si el usuario confirma la eliminación
    if (confirmacion) {
        // Llamar a la función para eliminar el usuario
        eliminarUsuario(id);
    }
}

// Función para cambiar el estado de un usuario
function cambiarEstadoUsuario(id, estado) {
    // Realizar una solicitud AJAX al servidor para cambiar el estado del usuario
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Manejar la respuesta del servidor
            var response = JSON.parse(this.responseText);
            if (response.success) {
                // Si la operación fue exitosa, mostrar un mensaje de éxito
                alert(response.message);
                // Recargar la página para reflejar el cambio
                location.reload();
            } else {
                // Si hubo un error, mostrar un mensaje de error
                alert(response.message);
            }
        }
    };
    xhttp.open("POST", "cambiar_estado_usuario.php", true); // Reemplaza "cambiar_estado_usuario.php" con la URL de tu script PHP para cambiar el estado de usuarios
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Pasa el ID del usuario y el estado actual al script PHP
    xhttp.send("id=" + id + "&estado=" + (estado == 1 ? 0 : 1));
}




// Llamar a la función para cargar usuarios cuando se cargue la página
window.onload = function() {
    cargarUsuarios();
};




</script>




                                        </tbody>
                                    </table>
                                </div>
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

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


</body>

</html>