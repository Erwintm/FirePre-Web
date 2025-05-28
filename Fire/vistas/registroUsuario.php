<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro usuario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/registroUsuario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="fondo">
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
            <a class="nav-link active" aria-disabled="true" href="registroUsuario.php">Registrar Usuarios</a>
        </li>
    
        <form action="">
          <button class="btn btn-primary" type="submit" formaction="acceso.php">Cerrar Sesion</button>
        </form>
        
      </ul>
      
    </div>
  </div>
</nav>
    <?php

    require_once '../modelos/usuario.php';
    require_once '../datos/DAOUsuario.php';

    function validarCadena($cadena, $min, $max, $campo)
    {
        $cadena = trim($cadena);
        if (strlen($cadena) >= $min && strlen($cadena) <= $max) {
            return '';
        } else {
            return "El campo $campo debe tener entre $min y $max caracteres.<br>";
        }
    }

    $error = '';
    $usuario = new Usuario();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $usuario->nombre     = trim($_POST["txtNombre"] ?? '');
        $usuario->apellidos  = trim($_POST["txtApellidos"] ?? '');
        $usuario->edad       = (int) ($_POST["txtEdad"] ?? 0);
        $usuario->gmail      = trim($_POST["txtEmail"] ?? '');
        $usuario->password   = $_POST["txtContrasena"] ?? '';

        if ($_POST["rbtTipo"] == "normal") {
            $usuario->super = 2;
        } else if ($_POST["rbtTipo"] == "administrador") {
            $usuario->super = 1;
        }



        if ($_POST["rbtSexo"] == "Masculino") {
            $usuario->sexo = "Masculino";
        } elseif ($_POST["rbtSexo"] == "Femenino") {
            $usuario->sexo = "Femenino";
        }

        // Validaciones
        $error .= validarCadena($usuario->nombre, 3, 30, "Nombre");
        $error .= validarCadena($usuario->apellidos, 3, 30, "Apellidos");

        if ($usuario->edad < 13 || $usuario->edad > 100) {
            $error .= "La edad debe estar entre 13 y 100 años.<br>";
        }

        if (!filter_var($usuario->gmail, FILTER_VALIDATE_EMAIL)) {
            $error .= "El correo electrónico no es válido.<br>";
        }

        if (strlen($usuario->password) < 8 || strlen($usuario->password) > 25) {
            $error .= "La contraseña debe tener entre 8 y 25 caracteres.<br>";
        }



        // Procesamiento si no hay errores
        if (empty($error)) {
            $dao = new DAOUsuario();
            $resultado = $dao->agregar($usuario);
            if ($resultado > 0) {
                $_SESSION["msg"] = "alert-success--Usuario almacenado correctamente";
                header("Location: index_privado.php");
                exit;
            } else {
                $error = '<div class="alert alert-danger">Error al guardar el usuario</div>';
            }
        }
    }
    ?>

    <div class="container pt-4">
        <?php if (!empty($error)) : ?>
            <div class="alert alert-warning"><?= $error ?></div>
        <?php endif; ?>

        <form id="frmRegistro" method="post" action="registroUsuario.php" novalidate>
            <div class="row">
                <legend class="mb-4">Registro usuario</legend>

                <div class="mb-3 col-md-4">
                    <label for="txtNombre" class="form-label">Nombre</label>
                    <input type="text" id="txtNombre" name="txtNombre" class="form-control" minlength="2" maxlength="30" required>
                </div>
                <div id="menNom"></div>
                <div class="mb-3 col-md-4">
                    <label for="txtApellidos" class="form-label">Apellidos</label>
                    <input type="text" id="txtApellidos" name="txtApellidos" class="form-control" required>
                </div>
                <div id="menApe"></div>
                <div class="mb-3 col-md-4">
                    <label for="txtEdad" class="form-label">Edad</label>
                    <input type="number" id="txtEdad" name="txtEdad" class="form-control" min="13" max="100" required>
                </div>
                <div id="menEdad"></div>
                <div class="mb-3 col-4">
                    <label for="txtEmail" class="form-label">Email</label>
                    <input type="email" id="txtEmail" name="txtEmail" class="form-control" minlength="10" maxlength="40" required>
                </div>
                <div id="menEmail"></div>
                <div class="mb-3 col-md-4">
                    <label for="txtContrasena" class="form-label">Contraseña</label>
                    <input type="password" id="txtContrasena" name="txtContrasena" class="form-control" minlength="8" maxlength="25" required>
                </div>
                <div id="menPass"></div>
                <!-- Campo Sexo -->
                <div class="mb-3 col-md-6">
                    <fieldset class="border rounded p-3">
                        <legend class="fs-6">Sexo</legend>
                        <div class="form-check">
                            <input type="radio" id="rbtMasculino" name="rbtSexo" value="Masculino" class="form-check-input" required>
                            <label for="rbtMasculino" class="form-check-label">Masculino</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="rbtFemenino" name="rbtSexo" value="Femenino" class="form-check-input" required>
                            <label for="rbtFemenino" class="form-check-label">Femenino</label>
                        </div>
                    </fieldset>
                </div>
                <div id="menSexo"></div>
                <!-- Campo Tipo de Usuario -->
                <div class="mb-3 col-md-6">
                    <fieldset class="border rounded p-3">
                        <legend class="fs-6">Tipo usuario</legend>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="rbtAdmin" name="rbtTipo" value="administrador" class="form-check-input" required>
                            <label for="rbtAdmin" class="form-check-label">Administrador</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="rbtNormal" name="rbtTipo" value="normal" class="form-check-input" required>
                            <label for="rbtNormal" class="form-check-label">Normal</label>
                        </div>
                    </fieldset>
                </div>
                <div id="menTipo"></div>
                <div class="col-12 text-center mt-4">
                    <button id="btnRegistrar" type="submit" class="btn btn-primary btn-sm me-2">Registrar</button>
                    <button id="btnRegresar" type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">Regresar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="../js/valRegUsuario"></script>
</body>

</html>