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


    }
?>




