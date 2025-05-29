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
                    ':velocidad_viento' => $incendio->velocidad_viento,
                    ':elevacion'        => $incendio->elevacion,
                    ':latitud'          => $incendio->latitud,
                    ':longitud'         => $incendio->longitud,
                    ':tipo_vegetacion'  => $incendio->tipo_vegetacion,
                    ':causas'           => $incendio->causas,
                    ':id_zona'          => $incendio->id_zona,
                    ':humedad'          => $incendio->humedad,
                    ':precipitacion'    => $incendio->precipitacion,
                    ':distancia_agua'   => $incendio->distancia_agua
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

        public function obtenerTodos($fechaInicio = null, $fechaFin = null, $zona = null)
        {
            try {
                $this->conectar();

                $lista = array();

                $sql = "SELECT i.id, i.fecha, i.temperatura, i.velocidad_viento, i.elevacion,
                                i.latitud, i.longitud, i.tipo_vegetacion, i.causas, i.id_zona,
                                i.humedad, i.precipitacion, i.distancia_agua
                        FROM Incendios i
                        LEFT JOIN zona z ON i.id_zona = z.id
                        ";

                $sentenciaSQL = $this->conexion->prepare($sql);
                $sentenciaSQL->execute();
                $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);

                foreach ($resultado as $fila) {
                    $obj = new Incendio();
                    $obj->id = $fila->id;
                    $obj->fecha = $fila->fecha;
                    $obj->temperatura = $fila->temperatura;
                    $obj->velocidad_viento = $fila->velocidad_viento;
                    $obj->elevacion = $fila->elevacion;
                    $obj->latitud = $fila->latitud;
                    $obj->longitud = $fila->longitud;
                    $obj->tipo_vegetacion = $fila->tipo_vegetacion;
                    $obj->causas = $fila->causas;
                    $obj->id_zona = $fila->id_zona;
                    $obj->humedad = $fila->humedad;
                    $obj->precipitacion = $fila->precipitacion;
                    $obj->distancia_agua = $fila->distancia_agua;
                    $lista[] = $obj;
            }

            return $lista;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); // Agrega esto para ver el error
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    }
?>




