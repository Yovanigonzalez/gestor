//Mostrar nombre de la imagen
function mostrarNombreImagen(input) {
        var nombreImagen = input.files[0].name;
        var idCampoNombre = input.id === 'imagen_login' ? 'nombre_imagen_login' : 'nombre_imagen_recuperar';
        document.getElementById(idCampoNombre).innerHTML = 'Nombre de la imagen seleccionada: ' + nombreImagen;
    }
