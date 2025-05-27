<?php
require_once '../modelos/incendio.php';
require_once '../datos/DAOIncendio.php';

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $incendio = new Incendio();

    // Asigna los valores desde el formulario
    $incendio->fecha = $_POST['txtFecha'];
    $incendio->temperatura = $_POST['txtTemperatura'];
    $incendio->velocidadviento = $_POST['txtVelocidadV'];
    $incendio->elevacion = $_POST['txtElevacion'];
    $incendio->latitud = $_POST['txtLatitud'];
    $incendio->longitud = $_POST['txtLongitud'];
    $incendio->tipovegetacion = $_POST['txtTipoV'];
    $incendio->causas = $_POST['txtCausasInce'];
    $incendio->idzona = $_POST['txtZona'];
    $incendio->humedad = $_POST['txtHumedad'];
    $incendio->precipitacion = $_POST['txtPrecipitacion'];
    $incendio->distanciaagua = $_POST['txtDistanciaAgua'];

    // DAO para insertar el registro
    $dao = new DAOIncendio();
    $resultado = $dao->agregar($incendio);

    // Mostrar mensaje según resultado
    if ($resultado > 0) {
        echo "<script>alert('Incendio registrado correctamente'); window.location.href = 'index_privado.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error al registrar el incendio');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Incendio</title>
    <link rel="stylesheet" href="../estilos/estiloRegistrar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<form id="formIncendio" method="POST" action="registrarIncendio.php">

    <div class="col-12">
        <legend>Registrar incendio</legend>
    </div>

    <div class="col-6">
        <label for="txtFecha">Fecha:</label>  
        <input type="date" id="txtFecha" name="txtFecha">
        <div id="errorFecha" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtZona">ID zona:</label>
        <input type="number" id="txtZona" name="txtZona">
        <div id="errorZona" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtTemperatura">Temperatura:</label>
        <input type="number" id="txtTemperatura" name="txtTemperatura">
        <div id="errorTemperatura" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtHumedad">Humedad Relativa (%):</label>
        <input type="number" id="txtHumedad" name="txtHumedad">
        <div id="errorHumedad" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtVelocidadV">Velocidad del viento (km/h):</label>
        <input type="number" id="txtVelocidadV" name="txtVelocidadV">
        <div id="errorViento" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtPrecipitacion">Precipitación (mm):</label>
        <input type="number" id="txtPrecipitacion" name="txtPrecipitacion">
        <div id="errorPrecipitacion" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtElevacion">Elevación (m):</label>
        <input type="number" id="txtElevacion" name="txtElevacion">
        <div id="errorElevacion" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtDistanciaAgua">Distancia del agua (km):</label>
        <input type="number" id="txtDistanciaAgua" name="txtDistanciaAgua">
        <div id="errorDistancia" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtLatitud">Latitud:</label>
        <input type="number" id="txtLatitud" name="txtLatitud" step="any">
        <div id="errorLatitud" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtLongitud">Longitud:</label>
        <input type="number" id="txtLongitud" name="txtLongitud" step="any">
        <div id="errorLongitud" class="error"></div>
    </div>

    <div class="col-12">
        <label for="txtTipoV">Tipo de vegetación:</label>
        <select id="txtTipoV" name="txtTipoV" required>
            <option value="bosque">Bosque</option>
            <option value="matorral">Matorral</option>
            <option value="pastizal">Pastizal</option>
            <option value="agricola">Agrícola</option>
        </select>
        <div id="errorVegetacion" class="error"></div>
    </div>

    <div class="col-12">
        <label for="txtCausasInce">Causas del incendio:</label>
        <select id="txtCausasInce" name="txtCausasInce" required>
            <option value="fogata">Fogata</option>
            <option value="rayos">Rayos</option>
            <option value="intencional">Intencional</option>
            <option value="cortos">Cortos circuitos</option>
            <option value="accidente">Accidente</option>
        </select>
        <div id="errorCausas" class="error"></div>
    </div>

    <div class="col-6 mt-3">
        <button class="btn btn-primary" type="submit">Aceptar</button>
    </div>

    <div class="col-6 mt-3">
       <button class="btn btn-primary" onclick="window.history.back()">Regresar</button>
    </div>

</form>

<script src="../js/registrarIncendio.js"></script>
</body>
</html>
