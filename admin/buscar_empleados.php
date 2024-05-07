<?php
// Incluir el archivo de conexión a la base de datos
include '../config/conexion.php';

// Verificar si se ha enviado una consulta de búsqueda y si la consulta no está vacía
if (isset($_GET['query']) && $_GET['query'] !== '') {
    // Escapar la cadena de consulta para prevenir inyecciones SQL
    $search = mysqli_real_escape_string($conn, $_GET['query']);

    // Consulta para buscar empleados cuyo nombre, rol y estatus coincidan parcialmente con la cadena de búsqueda
    $sql = "SELECT id, nombre, rol, estatus FROM usuarios WHERE nombre LIKE '%$search%' AND rol = 'EMPLEADO' AND estatus = 'ACTIVO'";

    $result = mysqli_query($conn, $sql);

    // Crear un array para almacenar los resultados
    $empleados = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // Almacenar tanto el ID, nombre, rol y estatus en el array
        $empleados[] = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'rol' => $row['rol'],
            'estatus' => $row['estatus']
        );
    }

    // Devolver los resultados en formato JSON
    echo json_encode($empleados);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
