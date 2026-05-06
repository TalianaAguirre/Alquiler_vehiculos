<?php
require __DIR__ . '/../models/config/ModelBase.php';
require __DIR__ . '/../models/entities/vehiculo.php';
require __DIR__ . '/../models/entities/Cliente.php';
require __DIR__ . '/../models/entities/reserva.php';
require __DIR__ . '/../models/config/Conexion.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../models/queries/ClienteQuery.php';
require __DIR__ . '/../models/queries/ReservaQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';
require __DIR__ . '/../controllers/ClienteController.php';
require __DIR__ . '/../controllers/ReservaController.php';

use monolitico\controllers\VehiculoController;
use monolitico\controllers\ClienteController;
use monolitico\controllers\ReservaController;

$vehiculoController    = new VehiculoController();
$clienteController     = new ClienteController();
$reservaController     = new ReservaController();

$vehiculos_disponibles = $vehiculoController->getDisponibles();
$lista_clientes        = $clienteController->getLista();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservaController->registrar($_POST);
    header('Location: registro_reservas.php?msg=creada');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Reserva</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body class="inner-page">
    <div class="app-layout">
        <main class="content">
            <div class="content-header">
                <h1 class="content-title">Nueva Reserva</h1>
            </div>

            <form action="CrearReservas.php" method="POST" class="formulario">
                <label>Vehículo disponible
                    <select name="vehiculo_id" required>
                        <option value="">-- Seleccionar --</option>
                        <?php foreach ($vehiculos_disponibles as $v): ?>
                            <option value="<?= $v->get('id') ?>">
                                <?= $v->get('marca') ?> <?= $v->get('modelo') ?> (<?= $v->get('anio') ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label>Cliente
                    <select name="cliente_id" required>
                        <option value="">-- Seleccionar --</option>
                        <?php foreach ($lista_clientes as $c): ?>
                            <option value="<?= $c->get('id') ?>">
                                <?= $c->get('nombre') ?> — <?= $c->get('numero_licencia') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label>Fecha de inicio
                    <input type="date" name="fecha_inicio" required>
                </label>
                <label>Fecha de fin
                    <input type="date" name="fecha_fin" required>
                </label>
                <div class="form-actions">
                    <button type="submit" class="btn">Crear reserva</button>
                    <a href="registro_reservas.php" class="btn-cancelar">Cancelar</a>
                </div>
            </form>
        </main>
    </div>
    <a href="/Alquiler_vehiculos/index.php" class="btn-volver">Volver al menú</a>
</body>
</html>