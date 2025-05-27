<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro usuario</title>
</head>

<body>
    <form action="">
        <Legend>Registro usuario</Legend>
        <div>
            <div>
                <label for="txtNombre">Nombre</label>
                <input type="text" id="txtNombre" minlength="2" maxlength="30" require>
            </div>
            <div></div>
            <div>
                <label for="txtApellidos">Apellidos</label>
                <input type="text" id="txtApellidos"  require>
            </div>
            <div></div>
            <div>
                <label for="txtEdad">Edad</label>
                <input type="number" min="13" max="100" require>
            </div>
            <div></div>
            <div>
                <label for="txtEmail">Email</label>
                <input type="email" minlength="10" maxlength="40" require>
            </div>
            <div></div>
            <div>
                <label for="txtContrasena">Contraseña</label>
                <input type="password" minlength="8" maxlength="25" require>
            </div>
            <div></div>
            <div>
                <fieldset class="col-6">
                <legend>Sexo</legend>
                <div class="form-check">
                    <input type="radio" id="rbtMasculino" class="form-check-input" name="rbtSexo" value="Masculino" required> 
                    <label for="rbtMasculino" class="form-check-label">Masculino</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="rbtSexo" id="rbtFemenino" class="form-check-input" value="Femenino" required> 
                    <label class="form-check-label" for="rbtFemenino">Femenino</label>
                </div>
            </fieldset>
            </div>
            <div></div>
            <div>
                <fieldset class="col-6">
                <legend>Tipo usuario</legend>
                <div class="form-check">
                    <input type="radio" id="rbtAdmin" class="form-check-input" name="rbtTipo" value="administrador" required> 
                    <label for="rbtAdmin" class="form-check-label">Administrador</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="rbtTipo" id="rbtMormal" class="form-check-input" value="normal" required> 
                    <label class="form-check-label" for="rbtNormal">Normal</label>
                </div>
            </fieldset>
            </div>
            <div></div>
            <button id="btnRegistrar" type="submit">Registrar</button>
            <button id="btnRegresar" formaction>Regresar</button>
        </div>
    </form>
</body>

</html>