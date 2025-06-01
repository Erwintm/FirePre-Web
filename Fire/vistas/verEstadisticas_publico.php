<?php
require_once '../datos/DaoEstadisticas.php';

$dao = new DaoEstadisticas();
$error = "";

$causas = [];
$zonas = [];
$vegetacion = [];

$fecha_inicio = $_POST['fecha_inicio'] ?? null;
$fecha_fin = $_POST['fecha_fin'] ?? null;
$zona = $_POST['zona'] ?? null;

if ($zona === "Uriangato") {
    $zona = 1;
} elseif ($zona === "Moroleón") {
    $zona = 2;
} elseif ($zona === "Yuriria") {
    $zona = 3;
} elseif ($zona === "El charco") {
    $zona = 4;
} elseif ($zona === "El derramadero") {
    $zona = 5;
} elseif ($zona === "La cinta") {
    $zona = 6;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['fecha_inicio']) || isset($_POST['fecha_fin']) || isset($_POST['zona']))) {
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
        $causas = $dao->obtenerCausasComunes($zona, $fecha_inicio, $fecha_fin);
        $zonas = $dao->obtenerZonasMaxInc($zona, $fecha_inicio, $fecha_fin);
        $vegetacion = $dao->obtenerIncVegetacion($zona, $fecha_inicio, $fecha_fin);
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
  <nav class="navbar navbar-expand-lg nav-link" style="background-color: rgb(212, 82, 82);">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navegación</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="infoSoft_publico.php">Información del software</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="verEstadisticas_publico.php">Ver estadísticas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="verPredicciones_publico.php">Ver predicciones</a>
          </li>
          <form action="">
            <button class="btn btn-primary" type="submit" formaction="acceso.php">Cerrar Sesión</button>
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
    <form method="POST" action="" novalidate class="row g-3 align-items-center" id="formv">
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
    
    <div class="table-responsive">
      <!-- Tabla de causas -->
      <table class="table table-bordered table-striped table-hover align-middle text-center">
        <thead class="table-dark">
          <tr>
            <th>Causas</th>
            <th>Total de causas</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($causas) && is_array($causas)): ?>
            <?php foreach ($causas as $i): ?>
              <tr>
                <td><?= $i['causas'] ?></td>
                <td><?= $i['total'] ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="2">No hay datos para mostrar</td></tr>
          <?php endif; ?>
        </tbody>
      </table>

      <!-- Tabla de zonas -->
      <table class="table table-bordered table-striped table-hover align-middle text-center">
        <thead class="table-dark">
          <tr>
            <th>Zona</th>
            <th>Total de incendios</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($zonas) && is_array($zonas)): ?>
            <?php foreach ($zonas as $i): ?>
              <tr>
                <td><?= $i['zona'] ?></td>
                <td><?= $i['total'] ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="2">No hay datos para mostrar</td></tr>
          <?php endif; ?>
        </tbody>
      </table>

      <!-- Tabla de vegetación -->
      <table class="table table-bordered table-striped table-hover align-middle text-center">
        <thead class="table-dark">
          <tr>
            <th>Vegetación</th>
            <th>Total de incendios por vegetación</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($vegetacion) && is_array($vegetacion)): ?>
            <?php foreach ($vegetacion as $i): ?>
              <tr>
                <td><?= $i['tipo_vegetacion'] ?></td>
                <td><?= $i['total'] ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="2">No hay datos para mostrar</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="../js/estadisticas.js"></script>
</body>
</html>
