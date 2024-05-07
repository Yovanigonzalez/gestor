<?php
session_start();

// Verifica si se han enviado datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_empleado = $_POST['id_empleado']; // Nuevo campo añadido
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $categoria = $_POST['categoria'];
    $direccion = $_POST['direccion'];
    $numero_interno = $_POST['numero_interno'];
    $numero_externo = $_POST['numero_externo'];
    $codigo_postal = $_POST['codigo_postal'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];
    $compania = $_POST['compania'];

    // Conectar a la base de datos (cambiar estos valores según tu configuración)
    include '../config/conexion.php';

    // Verificar la conexión
    if ($conn->connect_error) {
        $_SESSION['mensaje_tipo'] = 'error';
        $_SESSION['mensaje'] = "Error al conectar con la base de datos: " . $conn->connect_error;
        header("Location: empleado.php");
        exit();
    }

    // Verificar si ya existe un empleado con el mismo id_empleado
    $sql_verificar = "SELECT * FROM empleados WHERE id_empleado = '$id_empleado'";
    $result_verificar = $conn->query($sql_verificar);
    
    if ($result_verificar->num_rows > 0) {
        // Ya existe un empleado con el mismo id_empleado
        $_SESSION['mensaje_tipo'] = 'error';
        $_SESSION['mensaje'] = "Error: El nombre del empleado ya fue registrado anteriormente.";
        header("Location: empleado.php");
        exit();
    }

    // Verificar si ya existe un empleado con el mismo nombre
    $sql_verificar_nombre = "SELECT * FROM empleados WHERE nombre = '$nombre'";
    $result_verificar_nombre = $conn->query($sql_verificar_nombre);
    
    if ($result_verificar_nombre->num_rows > 0) {
        // Ya existe un empleado con el mismo nombre
        $_SESSION['mensaje_tipo'] = 'error';
        $_SESSION['mensaje'] = "Error: El nombre del empleado ya fue registrado anteriormente.";
        header("Location: empleado.php");
        exit();
    }

    // Preparar la consulta SQL para insertar los datos en la tabla empleados
    $sql = "INSERT INTO empleados (id_empleado, nombre, telefono, categoria, direccion, numero_interno, numero_externo, codigo_postal, ciudad, estado, compania)
            VALUES ('$id_empleado', '$nombre', '$telefono', '$categoria', '$direccion', '$numero_interno', '$numero_externo', '$codigo_postal', '$ciudad', '$estado', '$compania')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        $_SESSION['mensaje_tipo'] = 'success';
        $_SESSION['mensaje'] = "¡Registro exitoso!";
        header("Location: empleado.php");
        exit();
    } else {
        $_SESSION['mensaje_tipo'] = 'error';
        $_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $conn->error;
        header("Location: empleado.php");
        exit();
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se enviaron datos mediante POST, redireccionar al formulario de registro
    header("Location: formulario_de_registro.html");
    exit();
}

?>
