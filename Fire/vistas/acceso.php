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

                if ($usuario->super) {
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
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilos.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Acceso</h3>
        <?= $error ?>
        <form method="POST" class="col-md-6">
            <div class="mb-3">
                <label for="txtUsuario" class="form-label">Correo</label>
                <input type="email" class="form-control" id="txtUsuario" name="txtUsuario" required value="<?= $correo ?>">
            </div>
            <div class="mb-3">
                <label for="txtContrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="txtContrasena" name="txtContrasena" required>
            </div>
            <div class="mb-3 d-flex gap-2">
                <button class="btn btn-primary" type="submit">Iniciar</button>
              
            </div>
        </form>
    </div>
</body>

</html>
