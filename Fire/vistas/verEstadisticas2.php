<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">
    <h3>Estadísticas</h3>
    <form id="formFiltro" class="row g-3" method="POST" action="filtroEstadisticas.php">
        <div class="col-md-4">
            <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio"
                value="<?= htmlspecialchars($fecha_inicio ?? '') ?>" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label for="fecha_fin" class="form-label">Fecha Fin</label>
            <input type="date" id="fecha_fin" name="fecha_fin"
                value="<?= htmlspecialchars($fecha_fin ?? '') ?>" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label for="zona" class="form-label">Zona</label>
            <select id="zona" name="zona" class="form-control" required>
                <option value="1">Uriangato</option>
                <option value="2">Moroleón</option>
                <option value="3">Yuriria</option>
                <option value="4">El Derramadero</option>
                <option value="5">El Charco</option>
                <option value="6">La Cinta</option>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </form>

    <hr>

    <table id="tblCausas" class="table table-bordered table-striped mt-4 table-dark">
        <thead>
            <tr>
                <th>Causa</th>
                <th>Total de Incendios</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <table id="tblZonas" class="table table-bordered table-striped mt-4 table-dark">
        <thead>
            <tr>
                <th>Zona</th>
                <th>Total de Incendios</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <table id="tblVeg" class="table table-bordered table-striped mt-4 table-dark">
        <thead>
            <tr>
                <th>Vegetacion</th>
                <th>Total de Incendios</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <script src="../js/cargardatos.js"></script>
</body>

</html>