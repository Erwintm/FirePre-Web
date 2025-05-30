document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("btnFiltrar").addEventListener("click", (evento) => {
        let hayErrores = false;
        //Fecha inicio
        let fecha_inicio = document.getElementById("fecha_inicio");
        let valfecha_inicio = fecha_inicio.value.trim();
        let menFecha_inicio = document.getElementById("menFecha_inicio");
        if (fecha_inicio.validity.valueMissing) {
            menFecha_inicio.innerText = "Este campo es obligatorio";
            menFecha_inicio.classList.add("invalid");
            fecha_inicio.classList.add("invalid");
            hayErrores = true;
        }else {
            menFecha_inicio.innerText = "";
            menFecha_inicio.classList.remove("invalid");
            fecha_inicio.classList.remove("invalid");
        }
        //Fecha fin
        let fecha_fin = document.getElementById("fecha_fin");
        let valfecha_fin = fecha_fin.value.trim();
        let menFecha_fin = document.getElementById("menFecha_fin");
        if (fecha_fin.validity.valueMissing) {
            menFecha_fin.innerText = "Este campo es obligatorio";
            menFecha_fin.classList.add("invalid");
            fecha_fin.classList.add("invalid");
            hayErrores = true;
        }else {
            menFecha_fin.innerText = "";
            menFecha_fin.classList.remove("invalid");
            fecha_fin.classList.remove("invalid");
        }
        //Zona
        let zona = document.getElementById("zona");
        let valZona = zona.value.trim();
        let menZona = document.getElementById("menZona");

        if (zona.validity.valueMissing) {
            menZona.innerText = "Debe seleccionar una zona";
            zona.classList.add("invalid");
            hayErrores = true;
        } else {
            menZona.innerText = "";
            zona.classList.remove("invalid");
        }
         // Si hay errores, cancelar envío
        if (hayErrores) {
            evento.preventDefault();
        }
    })
});