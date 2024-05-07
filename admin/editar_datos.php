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

    <title>Editar datos de admin</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">EDITAR DATOS DE ADMIN</h1>
    </div>


    <div class="row">

        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">EDITAR DATOS</h6>
                    <div class="dropdown no-arrow">

                    </div>
                </div>
                <div class="card-body">

                    <!-- Contenido de registro--->
                    <form action="actualizar_datos.php" method="POST" enctype="multipart/form-data">
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
                <label for="nombre_completo">Nombre Completo:</label>
                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" autocomplete="off" required>
            </div>
            <!-- Campo oculto para almacenar el ID del empleado -->
            <input type="hidden" id="id_empleado" name="id_empleado">
            <div id="resultados"></div>

            <!-- Campo para Correo -->
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>

            <!-- Campo para Contraseña -->
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="text" class="form-control" id="contraseña" name="contraseña" pattern="[0-9]{1,10}" maxlength="10" required>
            </div>


        </div>
        <div class="col-md-6">
            <!-- Campo para Usuario -->
                        <!-- Campo para Subir Foto -->
                        <div class="form-group">
                <label for="foto">Subir Foto:</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>

            
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Modificar Datos</button>
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


<!-- End of Footer -->
</div>

</div>


</body>


</html>