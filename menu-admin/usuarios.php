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



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                    <?php
// Conexión a la base de datos (reemplaza los valores con los de tu configuración)
include '../config/conexion.php';

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener el total de empleados activos
$sql = "SELECT COUNT(*) AS total_empleados FROM usuarios WHERE estatus = 'ACTIVO' AND rol = 'EMPLEADO'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar el resultado
    $row = $result->fetch_assoc();
    $total_empleados = $row["total_empleados"];
} else {
    $total_empleados = 0;
}

$conn->close();
?>

<!-- Coloca este código en tu página HTML donde desees mostrar el total de empleados -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total de Empleados</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_empleados; ?></div>
                </div>
                <!-- Total de Empleados -->
                <div class="col-auto">
                    <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total de Usuarios</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <!-- Total de Usuarios -->
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div> 

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
                    fila += "<td>";
                    fila += "<button class='btn btn-primary mr-1' onclick='editarUsuario(" + usuario.id + ")'>Editar</button>";
                    fila += "<button class='btn btn-danger' onclick='confirmarEliminarUsuario(" + usuario.id + ")'>Eliminar</button>";
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

// Función para eliminar un usuario
function eliminarUsuario(id) {
    // Realizar una solicitud AJAX al servidor para cambiar el estado del usuario
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
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