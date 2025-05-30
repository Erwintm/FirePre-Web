function validarFecha(fechaStr) {
    let regex = /^(\d{2})\/(\d{2})\/(\d{4})$/;
    let match = fechaStr.match(regex);

    if (!match) {
        return false;
    }

    let dia = parseInt(match[1], 10);
    let mes = parseInt(match[2], 10) - 1; // Mes es 0-indexado
    let anio = parseInt(match[3], 10);

    let fecha = new Date(anio, mes, dia);
    return (
        fecha.getFullYear() === anio &&
        fecha.getMonth() === mes &&
        fecha.getDate() === dia
    );
}
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
        } else if (!validarFecha(valfecha_inicio)) {
            menFecha_inicio.innerText = "Formato de fecha inválido (dd/mm/yyyy)";
            menFecha_inicio.classList.add("invalid");
            fecha_inicio.classList.add("invalid");
            hayErrores = true;
        } else {
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
        } else if (!validarFecha(valfecha_fin)) {
            menFecha_fin.innerText = "Formato de fecha inválido (dd/mm/yyyy)";
            menFecha_fin.classList.add("invalid");
            fecha_fin.classList.add("invalid");
            hayErrores = true;
        } else {
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