<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico</title>
</head>
<body>
    <h1>Diagnóstico</h1>
    <?php
    // Verificar si se recibieron los datos necesarios a través de la URL
    if (isset($_GET['expediente']) && isset($_GET['servicio']) && isset($_GET['nombre_cliente']) && isset($_GET['ap_paterno']) && isset($_GET['ap_materno']) && isset($_GET['razon']) && isset($_GET['id_nombre_seleccionado'])) {
        // Obtener los datos pasados a través de la URL
        $expediente = $_GET['expediente'];
        $servicio = $_GET['servicio'];
        $nombre_cliente = $_GET['nombre_cliente'];
        $ap_paterno = $_GET['ap_paterno'];
        $ap_materno = $_GET['ap_materno'];
        $razon = $_GET['razon'];
        $id_nombre_seleccionado = $_GET['id_nombre_seleccionado'];

        // Aquí puedes utilizar los datos para mostrar información relevante o realizar otras acciones
        echo "<p>Expediente: $expediente</p>";
        echo "<p>Servicio: $servicio</p>";
        echo "<p>Nombre del Cliente: $nombre_cliente</p>";
        echo "<p>Apellido Paterno: $ap_paterno</p>";
        echo "<p>Apellido Materno: $ap_materno</p>";
        echo "<p>Razón: $razon</p>";
        echo "<p>Id Nombre Seleccionado: $id_nombre_seleccionado</p>";

        // También puedes realizar consultas a la base de datos u otras operaciones necesarias
    } else {
        echo "<p>No se recibieron todos los datos necesarios.</p>";
    }
    ?>
</body>
</html>
