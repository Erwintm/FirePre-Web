<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/estilos2.css">
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
    <div id="prediccion">

        <div id="imPre">

        </div>
    </div>

    <div id="significado">
        <ul>
            <li id="rojo">Riesgo muy alto</li>
            <li id="naranja">Riesgo alto</li>
            <li id="amarillo">Riesgo mediano</li>
            <li id="verde">Riesgo bajo</li>
            <li id="azul">Sin riesgo</li>
        </ul>
    </div>
    
    
</body>
</html>