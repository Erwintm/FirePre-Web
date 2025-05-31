document.getElementById("formFiltro").addEventListener("submit", function (e) {
    e.preventDefault();

    let zona = document.getElementById("zona").value;
    let fechaInicio = document.getElementById("fecha_inicio").value;
    let fechaFin = document.getElementById("fecha_fin").value;

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
            let tbodyCausas = document.querySelector("#tblCausas tbody");
            tbodyCausas.innerHTML = "";

            data.causas.forEach(item => {
                let fila = document.createElement("tr");

                let celdaCausa = document.createElement("td");
                celdaCausa.innerText = item.causas;
                fila.appendChild(celdaCausa);

                let celdaTotal = document.createElement("td");
                celdaTotal.innerText = item.total;
                fila.appendChild(celdaTotal);

                tbodyCausas.appendChild(fila);
            });

            // Tabla de zonas
            let tbodyZonas = document.querySelector("#tblZonas tbody");
            tbodyZonas.innerHTML = "";

            data.zonas.forEach(item => {
                let fila = document.createElement("tr");

                let celdaZona = document.createElement("td");
                celdaZona.innerText = item.zona;

                let celdaTotal = document.createElement("td");
                celdaTotal.innerText = item.total;

                fila.appendChild(celdaZona);
                fila.appendChild(celdaTotal);

                tbodyZonas.appendChild(fila);
            });
            // Tabla de vegetación
            let tbodyVegetacion = document.querySelector("#tblVeg tbody");
            tbodyVegetacion.innerHTML = "";

            data.vegetacion.forEach(item => {
                let fila = document.createElement("tr");

                let celdaVeg = document.createElement("td");
                celdaVeg.innerText = item.tipo_vegetacion; 

                let celdaTotal = document.createElement("td");
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
