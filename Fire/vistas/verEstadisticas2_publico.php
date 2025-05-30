<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estilosEsta2.css">
</head>

<body class="container mt-4">
    <nav class="navbar navbar-expand-lg nav-link  " style="background-color: rgb(212, 82, 82);">
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
    <h3>Estadísticas</h3>
    <form id="formFiltro" class="row g-3" method="POST" action="filtroEstadisticas.php">
        <div class="col-md-2">
            <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio"
                value="<?= htmlspecialchars($fecha_inicio ?? '') ?>" class="form-control" required>
        </div>
        <div id="menFecha_inicio" class="col-md-2"></div>
        <div class="col-md-2">
            <label for="fecha_fin" class="form-label">Fecha Fin</label>
            <input type="date" id="fecha_fin" name="fecha_fin"
                value="<?= htmlspecialchars($fecha_fin ?? '') ?>" class="form-control" required>
        </div>
        <div id="menFecha_fin" class=" col-md-2"></div>
        <div class="col-md-2">
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
        <div id="menZona" class="col-md-2"></div>
        <div class="col-12">
            <button type="submit" id="btnFiltrar" class="btn btn-primary">Filtrar</button>
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
    <script src="../js/valEstadisticas2.js"></script>
</body>

</html>