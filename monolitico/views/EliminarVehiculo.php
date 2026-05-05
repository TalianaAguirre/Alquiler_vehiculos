<?php
require __DIR__ . '/../models/config/ModelBase.php';
require __DIR__ . '/../models/entities/vehiculo.php';
require __DIR__ . '/../models/entities/reserva.php';
require __DIR__ . '/../models/config/Conexion.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../models/queries/ReservaQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';

use monolitico\controllers\VehiculoController;

$id = $_GET['id'] ?? null;

if (!empty($id)) {
    $controller = new VehiculoController();
    $resultado  = $controller->eliminar($id);

    if ($resultado) {
        header('Location: registro_vehiculos.php?msg=eliminado');
    } else {
        header('Location: registro_vehiculos.php?msg=ErrorReservas');
    }
} else {
    header('Location: registro_vehiculos.php');
}
exit;