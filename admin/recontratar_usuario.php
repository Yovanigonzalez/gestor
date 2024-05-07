<?php
session_start();
include '../config/conexion.php';

// Obtener el ID del usuario a recontratar
$id = $_POST['id'];

// Iniciar una transacción
$conn->begin_transaction();

try {
    // Consulta para actualizar el estado del usuario a "ACTIVO" en la tabla 'usuarios'
    $sql_usuario = "UPDATE usuarios SET estatus='ACTIVO' WHERE id=$id";
    $conn->query($sql_usuario);

    // Consulta para actualizar el estado del empleado a "ACTIVO" en la tabla 'compañia' donde 'id_empleado' coincide con el ID del usuario
    $sql_compania = "UPDATE compañia SET estatus='ACTIVO' WHERE id_empleado=$id";
    $conn->query($sql_compania);

    // Confirmar la transacción
    $conn->commit();

    // Establecer un mensaje de éxito en la sesión
    $_SESSION['mensaje_tipo'] = 'success';
    $_SESSION['mensaje'] = 'Usuario recontratado correctamente';
} catch (Exception $e) {
    // Si hubo un error en la transacción, hacer rollback y establecer un mensaje de error en la sesión
    $conn->rollback();
    $_SESSION['mensaje_tipo'] = 'danger';
    $_SESSION['mensaje'] = 'Error al recontratar usuario: ' . $e->getMessage();
}

// Redireccionar a usuario_inactivo.php
header("Location: usuarios_inactivo.php");
exit();

// Cerrar conexión a la base de datos
$conn->close();
?>
