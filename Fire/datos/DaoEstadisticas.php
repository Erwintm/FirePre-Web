<?php
require_once 'conexion.php';
require_once '../modelos/incendio.php';
class DaoEstadisticas
{

    private $conexion;

    private function conectar(){
        try {
            $this->conexion = Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
        }
    }
    public function obtenerCausasComunes($zona, $fechaInicio, $fechaFin){
        
        try {
            $this->conectar();
            $lista = [];

            $sql = "SELECT causas, COUNT(*) AS total
                FROM incendios
                WHERE id_zona = :zona
                  AND fecha BETWEEN :inicio AND :fin
                GROUP BY causas
                ORDER BY total DESC";

            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([
                ':zona' => $zona,
                ':inicio' => $fechaInicio,
                ':fin' => $fechaFin
            ]);

            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista[] = $fila; // Puedes mapearlo a un objeto si prefieres
            }

            return $lista;
        } catch (Exception $e) {
            return [];
        } finally {
            Conexion::desconectar();
        }
    }
    public function obtenerZonasMaxInc($fechaInicio, $fechaFin){
           
        try {
            $this->conectar();
            $lista = [];
           

            $sql = "SELECT z.nombre AS zona, COUNT(*) AS total
                    FROM incendios i
                    JOIN zona z ON i.id_zona = z.id
                    WHERE fecha BETWEEN :inicio AND :fin
                    GROUP BY z.nombre
                    ORDER BY total DESC";

            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([
                ':inicio' => $fechaInicio,
                ':fin' => $fechaFin
            ]);

            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lista[] = $fila;
            }
            
            return $lista;
        } catch (Exception $e) {
            return [];
        } finally {
            Conexion::desconectar();
        }
    }
    public function obtenerIncVegetacion($fechaInicio, $fechaFin) {
    try {
        $this->conectar();
        $lista = [];

        $sql = "SELECT tipo_vegetacion, COUNT(*) AS total
                FROM incendios
                WHERE fecha BETWEEN :inicio AND :fin
                GROUP BY tipo_vegetacion
                ORDER BY total DESC;";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':inicio' => $fechaInicio,
            ':fin' => $fechaFin
        ]);

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = $fila;
        }
        
        return $lista;
    } catch (Exception $e) {
        return [];
    } finally {
        Conexion::desconectar();
    }
}

}
