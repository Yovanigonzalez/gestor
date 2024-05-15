<?php include 'menu.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar datos del clientes</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/citas.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">EDITAR DATOS DEL CLIENTE</h1>
        </div>

        <div class="row">

            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">EDITAR DATOS DEL CLIENTE</h6>
                        <div class="dropdown no-arrow">
                            <!-- Aquí puedes poner el contenido de tu menú desplegable si es necesario -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="clientTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
<?php
// Conexión a la base de datos
include '../config/conexion.php';

// Verificar si se recibió el ID del cliente
if(isset($_GET['id'])) {
    // Obtener el ID del cliente de la URL
    $id = $_GET['id'];

    // Consulta para obtener los datos del cliente
    $sql = "SELECT * FROM auto_registro WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los datos del cliente en un formulario para editar
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Cliente</title>
            <!-- Bootstrap CSS -->
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container">
                <!--<h2>Editar Cliente</h2>-->
                <form action="actualizar_cliente.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo strtoupper($row['nombre']); ?>">
</div>
<div class="form-group">
    <label for="ap_paterno">Apellido Paterno:</label>
    <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="<?php echo strtoupper($row['ap_paterno']); ?>">
</div>
<div class="form-group">
    <label for="ap_materno">Apellido Materno:</label>
    <input type="text" class="form-control" id="ap_materno" name="ap_materno" value="<?php echo strtoupper($row['ap_materno']); ?>">
</div>
<div class="form-group">
    <label for="estatura">Estatura:</label>
    <input type="text" class="form-control" id="estatura" name="estatura" value="<?php echo $row['estatura']; ?>">
</div>
<div class="form-group">
    <label for="alergias">Alergias:</label>
    <input type="text" class="form-control" id="alergias" name="alergias" value="<?php echo strtoupper($row['alergias']); ?>">
</div>
<div class="form-group">
    <label for="enfermedades">Enfermedades:</label>
    <input type="text" class="form-control" id="enfermedades" name="enfermedades" value="<?php echo strtoupper($row['enfermedades']); ?>">
</div>
<div class="form-group">
    <label for="fracturas">Fracturas:</label>
    <input type="text" class="form-control" id="fracturas" name="fracturas" value="<?php echo strtoupper($row['fracturas']); ?>">
</div>
<div class="form-group">
    <label for="antecedentes">Antecedentes:</label>
    <input type="text" class="form-control" id="antecedentes" name="antecedentes" value="<?php echo strtoupper($row['antecedentes']); ?>">
</div>
<div class="form-group">
    <label for="otros">Otros:</label>
    <input type="text" class="form-control" id="otros" name="otros" value="<?php echo strtoupper($row['otros']); ?>">
</div>

<script>
    // Captura los campos de entrada que quieres convertir a mayúsculas automáticamente
    var campos = document.querySelectorAll('input[type="text"]:not(#estatura)');

    // Itera sobre cada campo y agrega un evento de entrada
    campos.forEach(function(campo) {
        campo.addEventListener('input', function() {
            // Convierte el valor del campo a mayúsculas y asigna el resultado al campo
            this.value = this.value.toUpperCase();
        });
    });
</script>

<!-- Agrega más campos de formulario aquí según tus necesidades -->
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontró el cliente";
    }
} else {
    echo "ID del cliente no proporcionado";
}
$conn->close();
?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Aquí se mostrarán los clientes -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- End of Footer -->

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
