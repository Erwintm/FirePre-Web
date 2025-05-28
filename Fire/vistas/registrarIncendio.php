<?php
require_once '../modelos/incendio.php';
require_once '../datos/DAOIncendio.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $incendio = new Incendio();

   
    $incendio->fecha = $_POST['txtFecha'];
    $incendio->temperatura = $_POST['txtTemperatura'];
    $incendio->velocidad_viento = $_POST['txtVelocidadV'];
    $incendio->elevacion = $_POST['txtElevacion'];
    $incendio->latitud = $_POST['txtLatitud'];
    $incendio->longitud = $_POST['txtLongitud'];
    $incendio->tipo_vegetacion = $_POST['txtTipoV'];
    $incendio->causas = $_POST['txtCausasInce'];
    $incendio->id_zona = $_POST['txtZona'];
    $incendio->humedad = $_POST['txtHumedad'];
    $incendio->precipitacion = $_POST['txtPrecipitacion'];
    $incendio->distancia_agua = $_POST['txtDistanciaAgua'];

   $error = '';

    if($incendio->temperatura<20){
        $error.="La temperatura no debe ser menor a 20 grado.<br>";
    }

    if($incendio->velocidad_viento<0){
        $error.="La velocidad no debe ser menor a 0.<br>;";
    }

    if($incendio->elevacion<0){
         $error.="La elevacion no debe ser menor a 0.<br>;";
    }

    if($incendio->latitud>90 && $incendio->latitud<-90 ){
        $error.="La latitud debe estar entre -90 y 90.<br>;";
    }

    if($incendio->longitud< -180 && $incendio->longitud>180){
        $error.="La longitud debe estar entre -180 y 180.<br>;";
    }

    if($incendio->id_zona<=0){
        $error.="El ide deve ser mayor a 0.<br>;";
    }
    
    if($incendio->humedad<0 && $incendio->humedad>100){
        $error.="La humedad debe ser entre 0 y 100.<br>;";
    }

    if($incendio->precipitacion<0){
        $error.="La precipitacion debe ser mayor a 0.<br>;";
    }

    if($incendio->distancia_agua<0){
        $error.="La distancia del agua debe ser mayor a 0.<br>;";
    }
        
    
        if (empty($error)) {

    $dao = new DAOIncendio();
    $resultado = $dao->agregar($incendio);

    
    if ($resultado > 0) {
         $_SESSION["msg"] = "alert-success--Icendio almacenado correctamente";
                header("Location: index_privado.php");
                exit;
    } else {
        echo "<script>alert('Error al registrar el incendio');</script>";
    }
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

        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg nav-link  "  style="background-color: rgb(212, 82, 82);">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#">Navegación</a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="infoSoft_privado.php">Información del software</a>
        </li>
        <li class="nav-item">
           <a class="nav-link active" aria-disabled="true" href="verPredicciones_privado.php">Ver predicciones</a>
         
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" aria-disabled="true" href="verEstadisticas_privado.php">Ver estadisticas</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link active" href="registrarIncendio.php">Registro de incendios</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" aria-disabled="true" href="listaUsuarios.php">Gestionar Usuarios</a>
        </li>
    
        <form action="">
          <button class="btn btn-primary" type="submit" formaction="acceso.php">Cerrar Sesion</button>
        </form>
        
      </ul>
      
    </div>
  </div>
</nav>


<?php if (!empty($error)): ?>
    <div class="alert alert-danger m-3">
        <?= $error ?>
    </div>
<?php endif; ?>


<form id="formIncendio" method="POST" action="registrarIncendio.php">

    <div class="col-12">
        <legend>Registrar incendio</legend>
    </div>

    <div class="col-6">
        <label for="txtFecha">Fecha:</label>  
        <input type="date" id="txtFecha" name="txtFecha" require>
        <div id="errorFecha" class="error"></div>
    </div>

   
    <div class="col-6">
        <label for="txtZona">Zona :</label>
        <select id="txtZona" name="txtZona" required>
            <option value="1">Uriangato</option>
            <option value="2">Moroleón</option>
            <option value="3">Yuriria</option>
            <option value="4">El Derramadero</option>
            <option value="5">El Charco</option>
            <option value="6">La Cinta</option>
        </select>
        <div id="errorZona" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtTemperatura">Temperatura:</label>
        <input type="number" id="txtTemperatura" name="txtTemperatura" min="20" max="60" require >
        <div id="errorTemperatura" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtHumedad">Humedad Relativa (%):</label>
        <input type="number" id="txtHumedad" name="txtHumedad" require min="1" max="100">
        <div id="errorHumedad" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtVelocidadV">Velocidad del viento (km/h):</label>
        <input type="number" id="txtVelocidadV" name="txtVelocidadV" require min="1">
        <div id="errorViento" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtPrecipitacion">Precipitación (mm):</label>
        <input type="number" id="txtPrecipitacion" name="txtPrecipitacion" require min="1">
        <div id="errorPrecipitacion" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtElevacion">Elevación (m):</label>
        <input type="number" id="txtElevacion" name="txtElevacion" require min="1">
        <div id="errorElevacion" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtDistanciaAgua">Distancia del agua (km):</label>
        <input type="number" id="txtDistanciaAgua" name="txtDistanciaAgua" require min="1">
        <div id="errorDistancia" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtLatitud">Latitud:</label>
        <input type="number" id="txtLatitud" name="txtLatitud" step="any" min="-90" max="90" require>
        <div id="errorLatitud" class="error"></div>
    </div>

    <div class="col-6">
        <label for="txtLongitud">Longitud:</label>
        <input type="number" id="txtLongitud" name="txtLongitud" step="any" min="-180" max="180" require>
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

    

</form>

<script src="../js/registrarIncendio.js"></script>
</body>
</html>
