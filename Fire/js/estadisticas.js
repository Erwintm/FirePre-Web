document.addEventListener('DOMContentLoaded', () => {
   
    const botonFiltrar = document.getElementById("filtrar");
    const form=document.getElementById("formv");

    botonFiltrar.addEventListener("click", (e) => {

    const fechaInicio = document.getElementById("fecha_inicio");
    const fechaFin = document.getElementById("fecha_fin");
    const zona = document.getElementById("zona");
        e.preventDefault();
        limpiarErrores();

        let valido = true;

        if (fechaInicio.value === '') {
            document.getElementById("errorFechaInicio").textContent = "Selecciona una fecha de inicio.";
            valido = false;
        }

        if (fechaFin.value === '') {
            document.getElementById("errorFechaFin").textContent = "Selecciona una fecha de fin.";
            valido = false;
        }

        if (zona.value === '' || zona.value === null) {
            document.getElementById("errorZona").textContent = "Selecciona una zona.";
            valido = false;
        }

        if (valido) {
            form.submit();
        }
    });

    function limpiarErrores() {
        document.getElementById("errorFechaInicio").textContent = "";
        document.getElementById("errorFechaFin").textContent = "";
        document.getElementById("errorZona").textContent = "";
    }
});
