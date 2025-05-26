<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilos.css">

</head>

<body>
    <form action="">
        <h3>Registro</h3>
        <div class="contenedor">
            <div class="col-9">
                <label for="txtNombre">Nombre</label>
                <input type="text" id="txtNombre">
            </div>
            <div class="col-9">
                <label for="txtEmail">Email</label>
                <input type="email" id="txtEmail">
            </div>
            <div class="col-9">
                <label for="txtContrasena">Contraseña</label>
                <input type="text" id="txtContrasena">
            </div>
            <div class="col-9">
                <button class="btn btn-primary" type="submit" formaction="acceso.php">Registrar</button>
            </div>
        </div>
    </form>
</body>

</html>