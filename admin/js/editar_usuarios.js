//Ver y ocultar contraseña

document.getElementById('ver-contrasena').addEventListener('click', function() {
    var inputContrasena = document.getElementById('contrasena');
    if (inputContrasena.type === "password") {
        inputContrasena.type = "text";
    } else {
        inputContrasena.type = "password";
    }
});