<?php
// Incluir el archivo de conexión a la base de datos
include '../config/conexion.php';

// Definir un arreglo para almacenar la respuesta
$response = array();

// Verificar si se recibió el ID del usuario a eliminar
if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Iniciar una transacción
    $conn->begin_transaction();

    try {
        // Actualizar el estado del usuario a "inactivo" en la tabla 'usuarios'
        $sql_usuario = "UPDATE usuarios SET estatus = 'INACTIVO' WHERE id = $id";
        $conn->query($sql_usuario);

        // Actualizar el estado del empleado a "inactivo" en la tabla 'compañia' donde 'id_empleado' coincide con el ID del usuario
        $sql_compania = "UPDATE compañia SET estatus = 'INACTIVO' WHERE id_empleado = $id";
        $conn->query($sql_compania);

        // Confirmar la transacción
        $conn->commit();

        // Si la transacción fue exitosa, agregar un mensaje de éxito al arreglo de respuesta
        $response['success'] = true;
        $response['message'] = "El usuario y sus registros relacionados han sido eliminados exitosamente";
    } catch (Exception $e) {
        // Si hubo un error en la transacción, hacer rollback y agregar un mensaje de error al arreglo de respuesta
        $conn->rollback();
        $response['success'] = false;
        $response['message'] = "Error al eliminar usuario y sus registros relacionados: " . $e->getMessage();
    }
} else {
    // Si no se recibió el ID del usuario, agregar un mensaje de error al arreglo de respuesta
    $response['success'] = false;
    $response['message'] = "No se proporcionó el ID del usuario a eliminar";
}

// Enviar la respuesta como JSON
echo json_encode($response);

// Cerrar la conexión a la base de datos
$conn->close();
?>
