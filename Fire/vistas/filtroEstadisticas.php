<?php
require_once "../datos/DaoEstadisticas.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = [];

    // Validar zona
    $zona = $_POST['zona'] ?? '';
    $zonas_validas = ['1', '2', '3', '4', '5', '6'];
    if (!in_array($zona, $zonas_validas)) {
        $errores[] = "Zona no válida.";
    }

    // Validar fechas
    $fechaInicio = $_POST['fechaInicio'] ?? '';
    $fechaFin = $_POST['fechaFin'] ?? '';

    if (empty($fechaInicio) || !validarFecha($fechaInicio)) {
        $errores[] = "Fecha de inicio inválida.";
    }

    if (empty($fechaFin) || !validarFecha($fechaFin)) {
        $errores[] = "Fecha de fin inválida.";
    }

    // Si hay errores, devolver en JSON
    if (!empty($errores)) {
        header('Content-Type: application/json');
        echo json_encode(['errores' => $errores]);
        exit;
    }

    $zona = $_POST['zona'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];

    $dao = new DaoEstadisticas();

    $causas = $dao->obtenerCausasComunes($zona, $fechaInicio, $fechaFin);
    $zonas = $dao->obtenerZonasMaxInc($zona,$fechaInicio, $fechaFin);
    $vegetacion = $dao->obtenerIncVegetacion($zona,$fechaInicio, $fechaFin);
    header('Content-Type: application/json');
    echo json_encode([
        'causas' => $causas,
        'zonas' => $zonas,
        'vegetacion' => $vegetacion
    ]);
}
function validarFecha($fecha)
{
    $partes = explode('-', $fecha);
    return count($partes) === 3 && checkdate((int)$partes[1], (int)$partes[2], (int)$partes[0]);
}
