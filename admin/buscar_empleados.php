<?php
// Incluir el archivo de conexión a la base de datos
include '../config/conexion.php';

// Verificar si se ha enviado una consulta de búsqueda y si la consulta no está vacía
if (isset($_GET['query']) && $_GET['query'] !== '') {
    // Escapar la cadena de consulta para prevenir inyecciones SQL
    $search = mysqli_real_escape_string($conn, $_GET['query']);

    // Consulta para buscar empleados cuyo nombre coincida parcialmente con la cadena de búsqueda
    $sql = "SELECT id, nombre FROM usuarios WHERE nombre LIKE '%$search%'";

    $result = mysqli_query($conn, $sql);

    // Crear un array para almacenar los resultados
    $empleados = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // Almacenar tanto el ID como el nombre en el array
        $empleados[] = array(
            'id' => $row['id'],
            'nombre' => $row['nombre']
        );
    }

    // Devolver los resultados en formato JSON
    echo json_encode($empleados);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>