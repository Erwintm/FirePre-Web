document.addEventListener('DOMContentLoaded', () => {
    
    const txtFecha = document.getElementById("txtFecha");
    const txtZona = document.getElementById("txtZona");
    const txtTemperatura = document.getElementById("txtTemperatura");
    const txtHumedad = document.getElementById("txtHumedad");
    const txtVelocidadV = document.getElementById("txtVelocidadV");
    const txtPrecipitacion = document.getElementById("txtPrecipitacion");
    const txtElevacion = document.getElementById("txtElevacion");
    const txtDistanciaAgua = document.getElementById("txtDistanciaAgua");
    const txtLatitud = document.getElementById("txtLatitud");
    const txtLongitud = document.getElementById("txtLongitud");
    const txtTipoV = document.getElementById("txtTipoV");
    const txtCausasInce = document.getElementById("txtCausasInce");
    const boton = document.getElementById("formIncendio");

    document.getElementById("btnRegistrar").addEventListener("click", (e) => {
        e.preventDefault(); 

       
        limpiarErrores();

        let valido = true;

        if (txtFecha.value === '') {
            document.getElementById('errorFecha').textContent = 'Selecciona una fecha';
            
            valido = false;
        }

        if (txtZona.value === '') {
            document.getElementById('errorZona').textContent = 'selecciona una zona';
            valido = false;
        }

        
        if (txtTemperatura.value === '' || isNaN(txtTemperatura.value) || parseInt(txtTemperatura.value) <19) {
            document.getElementById('errorTemperatura').textContent = 'Temperatura debe ser un número válido y debes ser mayo a 19.';
            valido = false;
        }

        if (txtHumedad.value === '' || parseInt(txtHumedad.value) < 0 || parseInt(txtHumedad.value) > 100) {
            document.getElementById('errorHumedad').textContent = 'Humedad relativa debe estar entre 0 y 100.';
            valido = false;
        }

        if (txtVelocidadV.value === '' || parseFloat(txtVelocidadV.value) < 0) {
            document.getElementById('errorViento').textContent = 'Velocidad del viento debe ser un número positivo.';
            valido = false;
        }

        if (txtPrecipitacion.value === '' || isNaN(txtPrecipitacion.value) || parseInt(txtPrecipitacion.value) > 0) {
            document.getElementById('errorPrecipitacion').textContent = 'Precipitación debe ser un número válido y debe se mayor a 0.';
            valido = false;
        }

        if (txtElevacion.value === '' || isNaN(txtElevacion.value)) {
            document.getElementById('errorElevacion').textContent = 'Elevación debe ser un número válido.';
            valido = false;
        }

        if (txtDistanciaAgua.value === '' || parseFloat(txtDistanciaAgua.value) < 0) {
            document.getElementById('errorDistancia').textContent = 'Distancia al agua debe ser mayor  a 0.';
            valido = false;
        }

        if (txtLatitud.value === '' || parseFloat(txtLatitud.value) < -90 || parseFloat(txtLatitud.value) > 90) {
            document.getElementById('errorLatitud').textContent = 'Latitud debe estar entre -90 y 90.';
            valido = false;
        }

        if (txtLongitud.value === '' || parseFloat(txtLongitud.value) < -180 || parseFloat(txtLongitud.value) > 180) {
            document.getElementById('errorLongitud').textContent = 'Longitud debe estar entre -180 y 180.';
            valido = false;
        }

        if (txtTipoV.value === '') {
            document.getElementById('errorVegetacion').textContent = 'Debe seleccionar un tipo de vegetación.';
            valido = false;
        }

         if (txtCausasInce.value === '') {
            document.getElementById('errorCausas').textContent = 'Debe seleccionar una causa de incendio.';
            valido = false;
        }

        if (valido) {
            boton.submit();
        }
    });

    function limpiarErrores() {
        const errores = document.querySelectorAll('.error');
        errores.forEach(err => err.textContent = '');
    }
});
