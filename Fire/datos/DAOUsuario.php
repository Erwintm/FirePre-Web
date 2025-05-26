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
}



?>