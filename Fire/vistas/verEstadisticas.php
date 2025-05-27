<?php

require_once '../datos/DaoIncendios.php';
$dao = new DaoIncendios();
$listaIncendios = $dao->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Incendios</title>
    <link rel="stylesheet" href="../estilos/estiloEstadisticas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="cabeza">
        <h1>Estadísticas</h1>
    </div>

    <div class="contenidoIma">
        <div id="im1"></div>
        <div id="im2"></div>
    </div>
    <div class="contenidoIma">
        <div id="im3"></div>
        <div id="im4"></div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Lista de Incendios Registrados</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Fecha</th>
                        <th>Temperatura</th>
                        <th>Viento</th>
                        <th>Elevación</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>Vegetación</th>
                        <th>Causas</th>
                        <th>Zona</th>
                        <th>Humedad</th>
                        <th>Precipitación</th>
                        <th>Distancia Agua</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaIncendios as $i): ?>
                        <tr>
                            <td><?= $i->fecha ?></td>
                            <td><?= $i->temperatura ?> °C</td>
                            <td><?= $i->velocidadviento ?> km/h</td>
                            <td><?= $i->elevacion ?> m</td>
                            <td><?= $i->latitud ?></td>
                            <td><?= $i->longitud ?></td>
                            <td><?= $i->tipovegetacion ?></td>
                            <td><?= $i->causas ?></td>
                            <td><?= $i->idzona ?></td>
                            <td><?= $i->humedad ?>%</td>
                            <td><?= $i->precipitacion ?> mm</td>
                            <td><?= $i->distanciaagua ?> m</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="cabeza" class="text-center mt-4">
        <button class="btn btn-primary" onclick="window.history.back()">Regresar</button>
    </div>
</body>
</html>
