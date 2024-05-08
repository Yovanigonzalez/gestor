<?php include 'menu.php';?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro de cliente</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>



<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">AUTO-REGISTRO</h1>
    </div>


    <div class="row">

        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">AUTO-REGISTRO</h6>
                    <div class="dropdown no-arrow">

                    </div>
                </div>
                <div class="card-body">

                    <!-- Contenido de registro--->
                    <form action="guardar-auto-registro.php" method="POST">
    <!-- Aquí van los otros elementos del formulario -->

    <div class="row">
        <div class="col-md-6">
        <?php
        // Verificar si hay un mensaje y mostrarlo
        if(isset($_SESSION['mensaje']) && isset($_SESSION['mensaje_tipo'])) {
            $mensaje_tipo = $_SESSION['mensaje_tipo'];
            $mensaje = $_SESSION['mensaje'];
            
            // Mostrar el mensaje con un estilo según su tipo
            echo "<div class=\"alert alert-$mensaje_tipo\">$mensaje</div>";
            
            // Limpiar las variables de sesión después de mostrar el mensaje
            unset($_SESSION['mensaje']);
            unset($_SESSION['mensaje_tipo']);
        }
    ?>

            <div class="form-group">
                <label for="nombre">NOMBRE:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" oninput="this.value = this.value.toUpperCase()" required>
            </div>
            <div class="form-group">
                <label for="ap_paterno">APELLIDO PATERNO:</label>
                <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" oninput="this.value = this.value.toUpperCase()" required>
            </div>
            <div class="form-group">
                <label for="ap_materno">APELLIDO MATERNO:</label>
                <input type="text" class="form-control" id="ap_materno" name="ap_materno" oninput="this.value = this.value.toUpperCase()" required>
            </div>
            <div class="form-group">
                <label for="estatura">ESTATURA:</label>
                <input type="text" class="form-control" id="estatura" name="estatura" required>
            </div>
            <div class="form-group">
                <label for="alergias">ALERGIAS:</label>
                <input type="text" class="form-control" id="alergias" name="alergias" oninput="this.value = this.value.toUpperCase()" required>
            </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
                <label for="enfermedades">ENFERMEDADES CRONICAS:</label>
                <input type="text" class="form-control" id="enfermedades" name="enfermedades" oninput="this.value = this.value.toUpperCase()" required>
            </div>

            <div class="form-group">
                <label for="fracturas">FRACTURAS:</label>
                <input type="text" class="form-control" id="fracturas" name="fracturas" oninput="this.value = this.value.toUpperCase()" required>
            </div>
            <div class="form-group">
                <label for="antecedentes">ANTECEDENTES FAMILIARES:</label>
                <input type="text" class="form-control" id="antecedentes" name="antecedentes" oninput="this.value = this.value.toUpperCase()" required>
            </div>
            <div class="form-group">
                <label for="otros">OTROS:</label>
                <input type="text" class="form-control" id="otros" name="otros" oninput="this.value = this.value.toUpperCase()">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">REGISTRAR CLIENTE</button>
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