<?php
require_once 'conexion.php'; 
require_once '../modelos/usuario.php';


class DAOUsuario
{

    private $conexion; 
    
    /**
     * Permite obtener la conexión a la BD
     */
    private function conectar(){
        try{
			$this->conexion = Conexion::conectar(); 
		}
		catch(Exception $e)
		{
			die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
		}
    }


      public function autenticar($correo,$password)
	{
		try
		{ 
            $this->conectar();
            
            //Almacenará el registro obtenido de la BD
			$obj = null; 
            
			$sentenciaSQL = $this->conexion->prepare("SELECT id,nombre,apellidos,contraseña,edad,correo,sexo,super
            FROM usuario WHERE correo=? AND 
            contraseña=sha224(?)");
            
            $sentenciaSQL->execute([$correo,$password]);
          
            
            /*Obtiene los datos*/
			$fila=$sentenciaSQL->fetch(PDO::FETCH_OBJ);
			if($fila){
                $obj = new Usuario();
                
                $obj->id = $fila->id;
                $obj->nombre=$fila->nombre;
                $obj->apellidos=$fila->apellidos;
                $obj->password=$fila->contraseña;
                $obj->edad=$fila->edad;
                $obj->gmail=$fila->correo;
                $obj->sexo=$fila->sexo;
                $obj->super=$fila->super;

            }
            return $obj;
		}
		catch(Exception $e){
            var_dump($e);
            return null;
		}finally{
            Conexion::desconectar();
        }
	}



public function obtenerTodos()
{
    try {
        $this->conectar();
        $lista = array();

        $sentenciaSQL = $this->conexion->prepare("SELECT id, nombre, apellidos, contraseña, edad, correo, sexo, super FROM usuario");
        $sentenciaSQL->execute();
        $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

        foreach ($resultado as $fila) {
            $obj = new Usuario();
            $obj->id = $fila->id;
            $obj->nombre = $fila->nombre;
            $obj->apellidos = $fila->apellidos;
            $obj->password = $fila->contraseña;
            $obj->edad = $fila->edad;
            $obj->gmail = $fila->correo;
            $obj->sexo = $fila->sexo;
            $obj->super = $fila->super;

            $lista[] = $obj;
        }

        return $lista;
    } catch (PDOException $e) {
        return null;
    } finally {
        Conexion::desconectar();
    }
}

public function obtenerUno($id)
{
    try {
        $this->conectar();
        $obj = null;

        $sentenciaSQL = $this->conexion->prepare("SELECT id, nombre, apellidos, contraseña, edad, correo, sexo, super FROM usuario WHERE id = ?");
        $sentenciaSQL->execute([$id]);
        $fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);

        if ($fila) {
            $obj = new Usuario();
            $obj->id = $fila->id;
            $obj->nombre = $fila->nombre;
            $obj->apellidos = $fila->apellidos;
            $obj->password = $fila->contraseña;
            $obj->edad = $fila->edad;
            $obj->gmail = $fila->correo;
            $obj->sexo = $fila->sexo;
            $obj->super = $fila->super;
        }

        return $obj;
    } catch (Exception $e) {
        return null;
    } finally {
        Conexion::desconectar();
    }
}

public function eliminar($id)
{
    try {
        $this->conectar();
        $sentenciaSQL = $this->conexion->prepare("DELETE FROM usuario WHERE id = ?");
        return $sentenciaSQL->execute([$id]);
    } catch (PDOException $e) {
        return false;
    } finally {
        Conexion::desconectar();
    }
}

public function editar(Usuario $obj)
{
    try {
        $sql = "UPDATE usuario SET
                    nombre = ?,
                    apellidos = ?,
                    contraseña = sha224(?),
                    edad = ?,
                    correo = ?,
                    sexo = ?,
                    super = ?
                WHERE id = ?";

        $this->conectar();
        $sentenciaSQL = $this->conexion->prepare($sql);
        $sentenciaSQL->execute([
            $obj->nombre,
            $obj->apellidos,
            $obj->password,
            $obj->edad,
            $obj->gmail,
            $obj->sexo,
            $obj->super,
            $obj->id
        ]);

        return true;
    } catch (PDOException $e) {
        return false;
    } finally {
        Conexion::desconectar();
    }
}

public function agregar(Usuario $obj)
{
    $clave = 0;
    try {
        $sql = "INSERT INTO usuario
                    (nombre, apellidos, contraseña, edad, correo, sexo, super)
                VALUES
                    (:nombre, :apellidos, sha224(:passwor), :edad, :correo, :sexo, :super)";

        $this->conectar();
        $this->conexion->prepare($sql)->execute([
            ':nombre' => $obj->nombre,
            ':apellidos' => $obj->apellidos,
            ':passwor' => $obj->password,
            ':edad' => $obj->edad,
            ':correo' => $obj->gmail,
            ':sexo' => $obj->sexo,
            ':super' => $obj->super
        ]);

        $clave = $this->conexion->lastInsertId();
        return $clave;
    } catch (Exception $e) {
        return $clave;
    } finally {
        Conexion::desconectar();
    }
}



}



?>