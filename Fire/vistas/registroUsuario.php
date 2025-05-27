<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container pt-4">
        <form  id="frmRegistro" novalidate method="post" action="registroUsuarios.php" class="<?=$validado?>">
            <div class="row">
                <Legend>Registro usuario</Legend>

                <div class="mb-2 col-4">
                    <label for="txtNombre">Nombre</label>
                    <input type="text" id="txtNombre" minlength="2" maxlength="30" require>
                </div>
                <div></div>
                <div class="mb-2 col-4">
                    <label for="txtApellidos">Apellidos</label>
                    <input type="text" id="txtApellidos" require>
                </div>
                <div></div>
                <div class="mb-2 col-4">
                    <label for="txtEdad">Edad</label>
                    <input type="number" min="13" max="100" require>
                </div>
                <div></div>
                <div class="mb-2 col-12">
                    <label for="txtEmail">Email</label>
                    <input type="email" minlength="10" maxlength="40" require>
                </div>
                <div></div>
                <div class="mb-2 col-6">
                    <label for="txtContrasena">Contraseña</label>
                    <input type="password" minlength="8" maxlength="25" require>
                </div>
                <div></div>
                <div lass="mb-2 col-6">
                    <fieldset class="col-12 border rounded p-3 mb-2">
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
                <div lass="mb-2 col-6">
                    <fieldset class="col-12 border rounded p-3 mb-2">
                        <legend>Tipo usuario</legend>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="rbtAdmin" class="form-check-input" name="rbtTipo" value="administrador" required>
                            <label for="rbtAdmin" class="form-check-label">Administrador</label>
                        </div>
                        <div class="form-check form-check-inline"">
                            <input type="radio" name="rbtTipo" id="rbtMormal" class="form-check-input" value="normal" required>
                            <label class="form-check-label" for="rbtNormal">Normal</label>
                        </div>
                    </fieldset>
                </div>
                <div></div>
                <button id="btnRegistrar" type="submit"  class="btn btn-primary">Registrar</button>
                <button id="btnRegresar" formaction  class="btn btn-primary">Regresar</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>