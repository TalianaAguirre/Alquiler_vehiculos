<?php
require __DIR__ . '/../models/config/ModelBase.php';
require __DIR__ . '/../models/entities/vehiculo.php';
require __DIR__ . '/../models/entities/reserva.php';
require __DIR__ . '/../models/config/Conexion.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../models/queries/ReservaQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';
require __DIR__ . '/../controllers/ReservaController.php';

use monolitico\controllers\ReservaController;

$id          = $_GET['id']          ?? null;
$vehiculo_id = $_GET['vehiculo_id'] ?? null;

if (!empty($id) && !empty($vehiculo_id)) {
    $controller = new ReservaController();
    $controller->cancelar($id, $vehiculo_id);
}

header('Location: registro_reservas.php?msg=cancelada');
exit;