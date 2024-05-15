<?php
// Verificar si se recibieron los datos del formulario
if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['ap_paterno']) && isset($_POST['ap_materno']) && isset($_POST['estatura']) && isset($_POST['alergias']) && isset($_POST['enfermedades']) && isset($_POST['fracturas']) && isset($_POST['antecedentes']) && isset($_POST['otros'])) {
    // Incluir archivo de conexión a la base de datos
    include '../config/conexion.php';

    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $estatura = $_POST['estatura'];
    $alergias = $_POST['alergias'];
    $enfermedades = $_POST['enfermedades'];
    $fracturas = $_POST['fracturas'];
    $antecedentes = $_POST['antecedentes'];
    $otros = $_POST['otros'];

    // Consulta para actualizar los datos del cliente
    $sql = "UPDATE auto_registro SET nombre='$nombre', ap_paterno='$ap_paterno', ap_materno='$ap_materno', estatura='$estatura', alergias='$alergias', enfermedades='$enfermedades', fracturas='$fracturas', antecedentes='$antecedentes', otros='$otros' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar a la página de éxito con un mensaje
        header('Location: editar_d_cliente.php?mensaje=¡Cliente actualizado correctamente!&tipo_exito=success');
        exit();
    } else {
        // Redireccionar a la página de error con un mensaje
        header('Location: editar_d_cliente.php?mensaje=Error al actualizar el cliente: ' . $conn->error . '&tipo_error=danger');
        exit();
    }

    // Cerrar conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibieron los datos del formulario, redireccionar a una página de error
    header('Location: editar_d_cliente.php?mensaje=No se recibieron todos los datos del formulario&tipo_error=warning');
    exit();
}
?>
