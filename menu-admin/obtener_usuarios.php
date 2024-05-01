<?php

include '../config/conexion.php';
// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(array("error" => "Error en la conexión: " . $conn->connect_error));
    exit();
}

// Consulta SQL para obtener usuarios con rol 'empleado' y estado 'activo'
$sql = "SELECT id, nombre, correo, contrasena, rol, estatus FROM usuarios WHERE rol = 'EMPLEADO' AND estatus = 'ACTIVO'";
$resultado = $conn->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    $usuarios = array();
    while ($fila = $resultado->fetch_assoc()) {
        $usuarios[] = $fila;
    }
    // Devolver los usuarios en formato JSON
    echo json_encode($usuarios);
} else {
    echo json_encode(array("error" => "No se encontraron usuarios con rol 'empleado' y estado 'activo'"));
}

// Cerrar conexión
$conn->close();
?>
