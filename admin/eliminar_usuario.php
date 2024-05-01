<?php
// Incluir el archivo de conexión a la base de datos
include '../config/conexion.php';

// Definir un arreglo para almacenar la respuesta
$response = array();

// Verificar si se recibió el ID del usuario a eliminar
if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Actualizar el estado del usuario a "inactivo" en la base de datos
    $sql = "UPDATE usuarios SET estatus = 'INACTIVO' WHERE id = $id";
    
    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        // Si la consulta fue exitosa, agregar un mensaje de éxito al arreglo de respuesta
        $response['success'] = true;
        $response['message'] = "El usuario ha sido eliminado exitosamente";
    } else {
        // Si hubo un error en la consulta, agregar un mensaje de error al arreglo de respuesta
        $response['success'] = false;
        $response['message'] = "Error al eliminar usuario: " . $conn->error;
    }
}

// Enviar la respuesta como JSON
echo json_encode($response);

// Cerrar la conexión a la base de datos
$conn->close();
?>

