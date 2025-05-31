<?php
    
    require_once("../datos/DAOUsuario.php");

    $correo = $password = $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

        $correo = trim($_POST["txtUsuario"]);
        $password = trim($_POST["txtContrasena"]);

        if (filter_var($correo, FILTER_VALIDATE_EMAIL) && strlen($password) > 0 && strlen($password) <= 50) {
            $dao = new DAOUsuario();
            $usuario = $dao->autenticar($correo, $password);

            if ($usuario) {
                

                if ($usuario->super==1) {
                    header("Location: index_privado.php");
                } else {
                    header("Location: index_publico.php"); 
                }
                exit();
            } else {
                $error = '<div class="alert alert-danger">Correo o contraseña incorrectos.</div>';
            }
        } else {
            $error = '<div class="alert alert-warning">Datos inválidos. Verifica el correo y contraseña.</div>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilos.css">
    
</head>

<body>
<nav class="navbar navbar-expand-lg nav-link  "  style="background-color: rgb(212, 82, 82);">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#">Navegación</a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        
    
        <form action="">
          <button class="btn btn-primary" type="submit" formaction="registroUsuario_normal.php">Registrarte</button>
          <button class="btn btn-primary" type="submit" formaction="index_oficial.php">Volver a la pagina</button>
        </form>
        
      </ul>
      
    </div>
  </div>
</nav>


    <form method="POST">
        <h3>Acceso</h3>
        <div class="contenedor">
            <?= $error ?>
            <div class="col-9">
                <label for="txtUsuario">Usuario</label>
                <input type="text" id="txtUsuario" name="txtUsuario" value="<?= $correo ?>">
            </div>
            <div id="menUsuario"></div>
            <div class="col-9">
                <label for="txtContrasena">Contraseña</label>
                <input type="password" id="txtContrasena" name="txtContrasena">
            </div>
            <div id="menContra"></div>
            <div class="col-9">
                <button class="btn btn-primary" type="submit" id="btnIniciar">Iniciar Sesion</button>
            </div>
            
        </div>
    </form>
    <script src="../js/valAcceso.js"></script>
</body>

</html>
