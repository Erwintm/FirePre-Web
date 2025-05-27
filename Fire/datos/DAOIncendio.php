<?php
    require_once 'conexion.php'; 
    require_once '../modelos/incendio.php'; 

   
    class DAOIncendio {
        private $conexion;

        private function conectar(){
            try{
                $this->conexion = Conexion::conectar(); 
            }
            catch(Exception $e)
            {
                die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
            }
        }

        public function agregar($incendio)
        {
            $clave = 0;

            try 
            {
                $sql = "INSERT INTO incendios (
                            fecha,
                            temperatura,
                            velocidad_viento,
                            elevacion,
                            latitud,
                            longitud,
                            tipo_vegetacion,
                            causas,
                            id_zona,
                            humedad,
                            precipitacion,
                            distancia_agua
                        ) VALUES (
                            :fecha,
                            :temperatura,
                            :velocidad_viento,
                            :elevacion,
                            :latitud,
                            :longitud,
                            :tipo_vegetacion,
                            :causas,
                            :id_zona,
                            :humedad,
                            :precipitacion,
                            :distancia_agua
                        );";

                $this->conectar();

                $this->conexion->prepare($sql)->execute([
                    ':fecha'            => $incendio->fecha,
                    ':temperatura'      => $incendio->temperatura,
                    ':velocidad_viento' => $incendio->velocidadviento,
                    ':elevacion'        => $incendio->elevacion,
                    ':latitud'          => $incendio->latitud,
                    ':longitud'         => $incendio->longitud,
                    ':tipo_vegetacion'  => $incendio->tipovegetacion,
                    ':causas'           => $incendio->causas,
                    ':id_zona'          => $incendio->idzona,
                    ':humedad'          => $incendio->humedad,
                    ':precipitacion'    => $incendio->precipitacion,
                    ':distancia_agua'   => $incendio->distanciaagua
                ]);

                $clave = $this->conexion->lastInsertId();
                return $clave;
            } 
            catch (Exception $e) 
            {
                return $clave;
            } 
            finally 
            {
                Conexion::desconectar();
            }
        }

        public function obtenerTodos()
        {
            try {
                $this->conectar();

                $lista = array();

                $sql = "SELECT id, fecha, temperatura, velocidadviento, elevacion,
                            latitud, longitud, tipovegetacion, causas, idzona,
                            humedad, precipitacion, distanciaagua
                        FROM Incendios";

                $sentenciaSQL = $this->conexion->prepare($sql);
                $sentenciaSQL->execute();
                $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

                foreach ($resultado as $fila) {
                    $obj = new Incendio();
                    $obj->id = $fila->id;
                    $obj->fecha = $fila->fecha;
                    $obj->temperatura = $fila->temperatura;
                    $obj->velocidadviento = $fila->velocidadviento;
                    $obj->elevacion = $fila->elevacion;
                    $obj->latitud = $fila->latitud;
                    $obj->longitud = $fila->longitud;
                    $obj->tipovegetacion = $fila->tipovegetacion;
                    $obj->causas = $fila->causas;
                    $obj->idzona = $fila->idzona;
                    $obj->humedad = $fila->humedad;
                    $obj->precipitacion = $fila->precipitacion;
                    $obj->distanciaagua = $fila->distanciaagua;
                    $lista[] = $obj;
            }

            return $lista;

        } catch (PDOException $e) {
            return null;
        } finally {
            Conexion::desconectar();
        }
    }
}
?>




