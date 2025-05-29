<?php
require_once '../datos/DAOIncendio.php';

$dao = new DAOIncendio();
$error = "";
$listaIncendios = [];

$fecha_inicio = $_GET['fecha_inicio'] ?? null;
$fecha_fin = $_GET['fecha_fin'] ?? null;
$zona = $_GET['zona'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && (isset($_GET['fecha_inicio']) || isset($_GET['fecha_fin']) || isset($_GET['zona']))) {
    if (empty($fecha_inicio)) {
        $error .= "Por favor ingresa una fecha de inicio.<br>";
    }
    if (empty($fecha_fin)) {
        $error .= "Por favor ingresa una fecha de fin.<br>";
    }
    if (empty($zona)) {
        $error .= "Por favor selecciona una zona.<br>";
    }

    if (empty($error)) {
        $listaIncendios = $dao->obtenerTodos($fecha_inicio, $fecha_fin, $zona);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Estadísticas de Incendios</title>
  <link rel="stylesheet" href="../estilos/estiloEsta.css"/>
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

  <div class="container mt-4">
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger" role="alert">
        <?= $error ?>
      </div>
    <?php endif; ?>
  </div>

  <div id="cabeza">
    <h1>Estadísticas</h1>
  </div>

  <div class="container mt-4" style="max-width: 450px;">
    <form method="get" action="" novalidate class="row g-3 align-items-center" id="formv">
      <div class="col-12">
        <legend>Filtrar incendios</legend>
      </div>
      <div class="col-12 col-md-6">
        <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
        <div class="error" id="errorFechaInicio"></div>
      </div>
      <div class="col-12 col-md-6">
        <label for="fecha_fin" class="form-label">Fecha Fin</label>
        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
        <div class="error" id="errorFechaFin"></div>
      </div>
      <div class="col-12">
        <label for="zona" class="form-label">Zona</label>
        <select id="zona" name="zona" class="form-select" required>
          <option value="" disabled selected>Selecciona una zona</option>
          <option value="Uriangato">Uriangato</option>
          <option value="Moroleón">Moroleón</option>
          <option value="El Derramadero">El Derramadero</option>
          <option value="El Charco">El Charco</option>
          <option value="La Cinta">La Cinta</option>
        </select>
        <div class="error" id="errorZona"></div>
      </div>
      <div class="col-12 text-center mt-3">
        <button type="submit" class="btn btn-danger" id="filtrar">Filtrar incendios</button>
      </div>
    </form>
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
            <tr><td colspan="12">No hay datos para mostrar</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="../js/estadisticas.js"></script>
</body>
</html>
