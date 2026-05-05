<?php
require __DIR__ . '/../models/config/ModelBase.php';
require __DIR__ . '/../models/entities/Cliente.php';
require __DIR__ . '/../models/entities/reserva.php';
require __DIR__ . '/../models/config/Conexion.php';
require __DIR__ . '/../models/queries/ClienteQuery.php';
require __DIR__ . '/../models/queries/ReservaQuery.php';
require __DIR__ . '/../controllers/ClienteController.php';

use monolitico\controllers\ClienteController;

$id = $_GET['id'] ?? null;

if (!empty($id)) {
    $controller = new ClienteController();
    $resultado  = $controller->eliminar($id);

    if ($resultado) {
        header('Location: registr_clientes.php?msg=eliminado');
    } else {
        header('Location: registr_clientes.php?msg=error_reservas');
    }
} else {
    header('Location: registr_clientes.php');
}
exit;