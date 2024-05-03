// Script para ver/ocultar la contraseña 

document.getElementById('togglePassword').addEventListener('click', function () {
    var passwordInput = document.getElementById('contrasena');
    var toggleButton = document.getElementById('togglePassword');

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleButton.textContent = "Ocultar";
    } else {
        passwordInput.type = "password";
        toggleButton.textContent = "Ver";
    }
});