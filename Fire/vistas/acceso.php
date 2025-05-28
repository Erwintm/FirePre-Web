<?php
    session_start();
    require_once("../datos/DAOUsuario.php");

    $correo = $password = $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo = trim($_POST["txtUsuario"]);
        $password = trim($_POST["txtContrasena"]);

        if (filter_var($correo, FILTER_VALIDATE_EMAIL) && strlen($password) > 0 && strlen($password) <= 50) {
            $dao = new DAOUsuario();
            $usuario = $dao->autenticar($correo, $password);

            if ($usuario) {
                $_SESSION["correo"] = $correo;
                $_SESSION["super"] = $usuario->super;

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
</body>

</html>
