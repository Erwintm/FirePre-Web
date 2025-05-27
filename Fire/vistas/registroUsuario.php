<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro usuario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/registroUsuario.css">
</head>

<body class="fondo">
    <?php
    $errores = [];

    // Validar nombre
    if (empty($_POST['txtNombre']) || strlen($_POST['txtNombre']) < 2 || strlen($_POST['txtNombre']) > 30) {
        $errores[] = "El nombre es obligatorio y debe tener entre 2 y 30 caracteres.";
    }

    // Validar apellidos
    if (empty($_POST['txtApellidos'])) {
        $errores[] = "Los apellidos son obligatorios.";
    }

    // Validar edad
    if (!isset($_POST['txtEdad']) || $_POST['txtEdad'] < 13 || $_POST['txtEdad'] > 100) {
        $errores[] = "La edad debe estar entre 13 y 100 años.";
    }

    // Validar email
    if (empty($_POST['txtEmail']) || !filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no es válido.";
    }

    // Validar contraseña
    if (empty($_POST['txtContrasena']) || strlen($_POST['txtContrasena']) < 8 || strlen($_POST['txtContrasena']) > 25) {
        $errores[] = "La contraseña debe tener entre 8 y 25 caracteres.";
    }

    // Validar sexo
    if (!isset($_POST['rbtSexo'])) {
        $errores[] = "Debe seleccionar un sexo.";
    }

    // Validar tipo de usuario
    if (!isset($_POST['rbtTipo'])) {
        $errores[] = "Debe seleccionar un tipo de usuario.";
    }

    // Mostrar resultados
    if (count($errores) > 0) {
        echo "<h4>Errores encontrados:</h4><ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo '<a href="javascript:history.back()">Volver</a>';
    } else {
        // Aquí podrías guardar en base de datos o mostrar un mensaje de éxito
        echo "<h4>Registro exitoso</h4>";
        // También puedes redirigir con: header("Location: paginaExito.php");
    }
    ?>

    <div class="container pt-4">
        <form id="frmRegistro" novalidate method="post" action="registroUsuarios.php">
            <div class="row">
                <legend class="mb-4">Registro usuario</legend>

                <div class="mb-3 col-md-4">
                    <label for="txtNombre" class="form-label">Nombre</label>
                    <input type="text" id="txtNombre" class="form-control" minlength="2" maxlength="30" required>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="txtApellidos" class="form-label">Apellidos</label>
                    <input type="text" id="txtApellidos" class="form-control" required>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="txtEdad" class="form-label">Edad</label>
                    <input type="number" id="txtEdad" class="form-control" min="13" max="100" required>
                </div>

                <div class="mb-3 col-6">
                    <label for="txtEmail" class="form-label">Email</label>
                    <input type="email" id="txtEmail" class="form-control" minlength="10" maxlength="40" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="txtContrasena" class="form-label">Contraseña</label>
                    <input type="password" id="txtContrasena" class="form-control" minlength="8" maxlength="25" required>
                </div>

                <!-- Campo Sexo -->
                <div class="mb-3 col-md-6">
                    <fieldset class="border rounded p-3">
                        <legend class="fs-6">Sexo</legend>
                        <div class="form-check">
                            <input type="radio" id="rbtMasculino" class="form-check-input" name="rbtSexo" value="Masculino" required>
                            <label for="rbtMasculino" class="form-check-label">Masculino</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="rbtFemenino" class="form-check-input" name="rbtSexo" value="Femenino" required>
                            <label for="rbtFemenino" class="form-check-label">Femenino</label>
                        </div>
                    </fieldset>
                </div>

                <!-- Campo Tipo de Usuario -->
                <div class="mb-3 col-md-6">
                    <fieldset class="border rounded p-3">
                        <legend class="fs-6">Tipo usuario</legend>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="rbtAdmin" class="form-check-input" name="rbtTipo" value="administrador" required>
                            <label for="rbtAdmin" class="form-check-label">Administrador</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="rbtNormal" class="form-check-input" name="rbtTipo" value="normal" required>
                            <label for="rbtNormal" class="form-check-label">Normal</label>
                        </div>
                    </fieldset>
                </div>


                <div class="col-12 text-center mt-4">
                    <button id="btnRegistrar" type="submit" class="btn btn-primary btn-sm me-2">Registrar</button>
                    <button id="btnRegresar" type="button" onclick="window.history.back()" class="btn btn-secondary btn-sm">Regresar</button>
                </div>
            </div>
        </form>
    </div>


</body>

</html>