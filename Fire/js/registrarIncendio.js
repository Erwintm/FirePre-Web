document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        limpiarErrores();
        let valido = true;

        if(txtFecha.value==''){
            document.getElementById('errorFecha').textContent='Selecciona una fecha';
            valido=false;
        }

        if (txtZona.value === '' || parseInt(txtZona.value) <= 0) {
            document.getElementById('errorZona').textContent = 'ID Zona debe ser un número entero positivo.';
            valido = false;
        }

        if (txtTemperatura.value === '' || isNaN(txtTemperatura.value)) {
            document.getElementById('errorTemperatura').textContent = 'Temperatura debe ser un número válido.';
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

        if (txtPrecipitacion.value === '' || isNaN(txtPrecipitacion.value)) {
            document.getElementById('errorPrecipitacion').textContent = 'Precipitación debe ser un número válido.';
            valido = false;
        }

        if (txtElevacion.value === '' || isNaN(txtElevacion.value)) {
            document.getElementById('errorElevacion').textContent = 'Elevación debe ser un número válido.';
            valido = false;
        }

        if (txtDistanciaAgua.value === '' || parseFloat(txtDistanciaAgua.value) < 0) {
            document.getElementById('errorDistancia').textContent = 'Distancia al agua debe ser mayor o igual a 0.';
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

        if (valido) {
            form.submit();
        }
    });

    function limpiarErrores() {
        const errores = document.querySelectorAll('.error');
        errores.forEach(div => div.textContent = '');
    }
});
