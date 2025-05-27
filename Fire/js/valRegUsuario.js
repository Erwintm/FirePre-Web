document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("btnRegistrar").addEventListener("click", (evento) => {
        let hayErrores = false;

        // Nombre
        let nombre = document.getElementById("txtNombre");
        let valnombre = nombre.value.trim();
        let menNom = document.getElementById("menNom");
        if (nombre.validity.valueMissing) {
            menNom.innerText = "Este campo es obligatorio";
            nombre.classList.add("invalid");
            hayErrores = true;
        } else if (valnombre.length < 3) {
            menNom.innerText = "Debe tener al menos 3 caracteres";
            nombre.classList.add("invalid");
            hayErrores = true;
        } else if (valnombre.length > 30) {
            menNom.innerText = "No debe exceder los 30 caracteres";
            nombre.classList.add("invalid");
            hayErrores = true;
        } else {
            menNom.innerText = "";
            nombre.classList.remove("invalid");
            nombre.classList.add("valid");
        }

        // Apellidos
        let apellidos = document.getElementById("txtApellidos");
        let valApe = apellidos.value.trim();
        let menApe = document.getElementById("menApe");
        if (apellidos.validity.valueMissing || valApe.length < 3 || valApe.length > 30) {
            menApe.innerText = "Debe tener entre 3 y 30 caracteres";
            apellidos.classList.add("invalid");
            hayErrores = true;
        } else {
            menApe.innerText = "";
            apellidos.classList.remove("invalid");
            apellidos.classList.add("valid");
        }

        // Edad
        let edad = document.getElementById("txtEdad");
        let valEdad = parseInt(edad.value);
        let menEdad = document.getElementById("menEdad");
        if (edad.validity.valueMissing || isNaN(valEdad) || valEdad < 13 || valEdad > 100) {
            menEdad.innerText = "La edad debe estar entre 13 y 100 años";
            edad.classList.add("invalid");
            hayErrores = true;
        } else {
            menEdad.innerText = "";
            edad.classList.remove("invalid");
            edad.classList.add("valid");
        }

        // Email
        let email = document.getElementById("txtEmail");
        let menEmail = document.getElementById("menEmail");
        if (email.validity.valueMissing || !email.value.includes('@')) {
            menEmail.innerText = "Ingrese un correo válido";
            email.classList.add("invalid");
            hayErrores = true;
        } else {
            menEmail.innerText = "";
            email.classList.remove("invalid");
            email.classList.add("valid");
        }

        // Contraseña
        let pass = document.getElementById("txtContrasena");
        let menPass = document.getElementById("menPass");
        if (pass.validity.valueMissing || pass.value.length < 8 || pass.value.length > 25) {
            menPass.innerText = "La contraseña debe tener entre 8 y 25 caracteres";
            pass.classList.add("invalid");
            hayErrores = true;
        } else {
            menPass.innerText = "";
            pass.classList.remove("invalid");
            pass.classList.add("valid");
        }

        // Sexo
        let sexoM = document.getElementById("rbtMasculino");
        let sexoF = document.getElementById("rbtFemenino");
        let menSexo = document.getElementById("menSexo");
        if (!sexoM.checked && !sexoF.checked) {
            menSexo.innerText = "Seleccione una opción";
            menSexo.classList.add("invalid");
            hayErrores = true;
        } else {
            menSexo.innerText = "";
        }

        // Tipo usuario
        let tipoA = document.getElementById("rbtAdmin");
        let tipoN = document.getElementById("rbtNormal");
        let menTipo = document.getElementById("menTipo");
        if (!tipoA.checked && !tipoN.checked) {
            menTipo.innerText = "Seleccione el tipo de usuario";
            menTipo.classList.add("invalid");
            hayErrores = true;
        } else {
            menTipo.innerText = "";
        }

        // Si hay errores, cancelar envío
        if (hayErrores) {
            evento.preventDefault();
        }
    })
});