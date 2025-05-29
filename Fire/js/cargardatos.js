document.getElementById("formFiltro").addEventListener("submit", function (e) {
    e.preventDefault();

    const zona = document.getElementById("zona").value;
    const fechaInicio = document.getElementById("fecha_inicio").value;
    const fechaFin = document.getElementById("fecha_fin").value;

    fetch("../vistas/filtroEstadisticas.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `zona=${zona}&fechaInicio=${fechaInicio}&fechaFin=${fechaFin}`
    })
        .then(response => response.json())
        .then(data => {
            // Tabla de causas
            const tbodyCausas = document.querySelector("#tblCausas tbody");
            tbodyCausas.innerHTML = "";

            data.causas.forEach(item => {
                const fila = document.createElement("tr");

                const celdaCausa = document.createElement("td");
                celdaCausa.innerText = item.causas;
                fila.appendChild(celdaCausa);

                const celdaTotal = document.createElement("td");
                celdaTotal.innerText = item.total;
                fila.appendChild(celdaTotal);

                tbodyCausas.appendChild(fila);
            });

            // Tabla de zonas
            const tbodyZonas = document.querySelector("#tblZonas tbody");
            tbodyZonas.innerHTML = "";

            data.zonas.forEach(item => {
                const fila = document.createElement("tr");

                const celdaZona = document.createElement("td");
                celdaZona.innerText = item.zona;

                const celdaTotal = document.createElement("td");
                celdaTotal.innerText = item.total;

                fila.appendChild(celdaZona);
                fila.appendChild(celdaTotal);

                tbodyZonas.appendChild(fila);
            });
            // Tabla de vegetación
            const tbodyVegetacion = document.querySelector("#tblVeg tbody");
            tbodyVegetacion.innerHTML = "";

            data.vegetacion.forEach(item => {
                const fila = document.createElement("tr");

                const celdaVeg = document.createElement("td");
                celdaVeg.innerText = item.tipo_vegetacion; 

                const celdaTotal = document.createElement("td");
                celdaTotal.innerText = item.total;

                fila.appendChild(celdaVeg);
                fila.appendChild(celdaTotal);

                tbodyVegetacion.appendChild(fila);
            });

        })

        .catch(error => {
            console.error("Error al obtener datos:", error);
        });
});
