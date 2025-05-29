<?php
require_once "../datos/DaoEstadisticas.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $zona = $_POST['zona'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];

    $dao = new DaoEstadisticas();

    $causas = $dao->obtenerCausasComunes($zona, $fechaInicio, $fechaFin);
    $zonas = $dao->obtenerZonasMaxInc($fechaInicio, $fechaFin);
    $vegetacion=$dao->obtenerIncVegetacion($fechaInicio, $fechaFin);
    header('Content-Type: application/json');
    echo json_encode([
        'causas' => $causas,
        'zonas' => $zonas,
        'vegetacion'=>$vegetacion
    ]);
}
?>
