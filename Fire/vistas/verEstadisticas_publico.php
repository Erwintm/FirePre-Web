<?php
require_once '../datos/DAOIncendio.php';
$dao = new DAOIncendio();
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
    <nav class="navbar navbar-expand-lg nav-link  "  style="background-color: rgb(212, 82, 82);">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#">Navegación</a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="infoSoft_publico.php">Información del software</a>
        </li>
       
        
        <li class="nav-item">
          <a class="nav-link active" aria-disabled="true" href="verEstadisticas_publico.php">Ver estadisticas</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link active" aria-disabled="true" href="verPredicciones_publico.php">Ver predicciones</a>
        </li>
    
        <form action="">
          <button class="btn btn-primary" type="submit" formaction="acceso.php">Cerrar Sesion</button>
        </form>
      </ul>
      
    </div>
  </div>
</nav>
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
                    <?php if (!empty($listaIncendios) && is_array($listaIncendios)): ?>
                        <?php foreach ($listaIncendios as $i): ?>
                            <tr>
                                <td><?= htmlspecialchars($i->fecha) ?></td>
                                <td><?= htmlspecialchars($i->temperatura) ?> °C</td>
                                <td><?= htmlspecialchars($i->velocidad_viento) ?> km/h</td>
                                <td><?= htmlspecialchars($i->elevacion) ?> m</td>
                                <td><?= htmlspecialchars($i->latitud) ?></td>
                                <td><?= htmlspecialchars($i->longitud) ?></td>
                                <td><?= htmlspecialchars($i->tipo_vegetacion) ?></td>
                                <td><?= htmlspecialchars($i->causas) ?></td>
                                <td><?= htmlspecialchars($i->id_zona) ?></td>
                                <td><?= htmlspecialchars($i->humedad) ?>%</td>
                                <td><?= htmlspecialchars($i->precipitacion) ?> mm</td>
                                <td><?= htmlspecialchars($i->distancia_agua) ?> m</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="12">No hay datos para mostrar</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
</body>
</html>

