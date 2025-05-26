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
    <form action="">

        <H3>Acceso</H3>
        <div class="contenedor">
            <div class="col-9">
                <label for="txtUsuario">Usuario</label>
                <input type="text" id="txtUsuario">
            </div>
            <div class="col-9">
                <label for="txtContrasena">Contraseña</label>
                <input type="password" id="txtContrasena">
            </div>
            <div class="col-9">
                <button class="btn btn-primary" type="submit" formaction="index.php">Iniciar</button>
            </div>
            <div class="col-9">
                <button class="btn btn-primary" type="submit" formaction="registro.php">Registro</button>
            </div>
        </div>
    </form>
</body>

</html>