document.addEventListener("DOMContentLoaded", ()=>{
    document.getElementById("btnIniciar").addEventListener("click", (evento)=>{
        let hayErrores=false;
        let usuario = document.getElementById("txtUsuario");
        let menUsuario = document.getElementById("menUsuario");
        if (usuario.validity.valueMissing || !email.value.includes('@')) {
            menUsuario.innerText = "Ingrese un correo válido";
            menUsuario.classList.add("invalid");
            usuario.classList.add("invalid");
            hayErrores = true;
        } else {
            menUsuario.innerText = "";
            menUsuario.classList.remove("invalid");
            usuario.classList.remove("invalid");
            usuario.classList.add("valid");
        }
        // Contraseña
        let pass = document.getElementById("txtContrasena");
        let menPass = document.getElementById("menContra");
        if (pass.validity.valueMissing || pass.value.length < 8 || pass.value.length > 25) {
            menPass.innerText = "La contraseña debe tener entre 8 y 25 caracteres";
            menPass.classList.add("invalid");
            pass.classList.add("invalid");
            hayErrores = true;
        } else {
            menPass.innerText = "";
            menPass.classList.remove("invalid");
            pass.classList.remove("invalid");
            pass.classList.add("valid");
        }
         // Si hay errores, cancelar envío
        if (hayErrores) {
            evento.preventDefault();
        }
    })
});