<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Usuarios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
<div class="container mt-5">
  <h2 class="mb-4">Gestión de Usuarios</h2>

  <?php
  session_start();
  require_once '../datos/DAOUsuario.php';
  require_once '../modelos/usuario.php';

  if (isset($_POST["id"])) {
    $dao = new DAOUsuario();
    if ($dao->eliminar($_POST["id"])) {
      echo "<div class='alert alert-success'>Usuario eliminado exitosamente</div>";
    } else {
      echo "<div class='alert alert-danger'>Error al eliminar el usuario</div>";
    }
  }
  ?>

  <div class="mb-3">
    <a href="registroUsuario.php" class="btn btn-primary">Agregar Usuario</a>
  </div>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Nombre Completo</th>
        <th>Correo</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th>Rol</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $dao = new DAOUsuario();
      $usuarios = $dao->obtenerTodos();
     
      foreach ($usuarios as $u) {
        echo "<tr>
                <td>$u->apellidos $u->nombre</td>
                <td>$u->gmail</td>
                <td>$u->edad</td>
                <td>$u->sexo</td>
                <td>" . ($u->super == 1 ? "Administrador" : "Usuario") . "</td>
                <td>
                  <a href='editarUsuario.php?id=$u->id' class='btn btn-sm btn-primary'>Editar</a>
                  <form method='POST' action='listaUsuarios.php' style='display:inline-block;'>
                    
                    <button type='submit' value='$u->id' name='id' class='btn btn-sm btn-danger'>Eliminar</button>
                  </form>

                </td>
              </tr>";
      }
    ?>
    </tbody>
  </table>
</div>
</body>
</html>
