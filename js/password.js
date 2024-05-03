function formatName(input) {
    // Convertir a mayúsculas
    input.value = input.value.toUpperCase();
    // Eliminar números y signos
    input.value = input.value.replace(/[^A-Z\s]/g, '');
}