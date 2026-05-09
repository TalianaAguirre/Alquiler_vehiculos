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

$reservaController  = new ReservaController();
$vehiculoController = new VehiculoController();
$clienteController  = new ClienteController();

$lista_reservas        = $reservaController->getActivas();
$vehiculos_disponibles = $vehiculoController->getDisponibles();
$lista_clientes        = $clienteController->getLista();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservaController->registrar($_POST);
    header('Location: registro_reservas.php?msg=creada');
    exit;
}

$mensaje = $_GET['msg'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservas</title>
    <link rel="stylesheet" href="../public/pagina.css">
</head>
<body class="inner-page">
       <div class="menu">        
         <header>
            <div >
            <h1>Reservas</h1>
            </div>    
             <nav>
                <a href="registro_vehiculos.php">Vehículo</a>
                <a href="registr_clientes.php">Cliente</a>
                <a href="Historial.php">Historial</a>
             </nav>
        </header>
    </div>

    <div class="app-layout">
        <main class="content">
            <div class="content-header">
                <h1 class="content-title">Reservas Activas</h1>
            </div>

            <?php if ($mensaje === 'creada'): ?>
                <p class="msg-exito">Reserva creada correctamente.</p>
            <?php elseif ($mensaje === 'completada'): ?>
                <p class="msg-exito">Reserva completada. Vehículo disponible nuevamente.</p>
            <?php elseif ($mensaje === 'cancelada'): ?>
                <p class="msg-exito">Reserva cancelada.</p>
            <?php endif; ?>

            <h2>Nueva reserva</h2>
            <form action="registro_reservas.php" method="POST" class="formulario">
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
                </div>
            </form>

            <h2>Reservas activas</h2>
            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Vehículo</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_reservas as $r): ?>
                        <tr>
                            <td><?= $r->get('id') ?></td>
                            <td><?= $r->get('cliente_nombre') ?></td>
                            <td><?= $r->get('vehiculo_info') ?></td>
                            <td><?= $r->get('fecha_inicio') ?></td>
                            <td><?= $r->get('fecha_fin') ?></td>
                            <td class="td-acciones">
                                
                                <a href="completar_reserva.php?id=<?= $r->get('id') ?>&vehiculo_id=<?= $r->get('idVehiculo') ?>">
                                    Registrar devolución
                                </a>

                                &nbsp;

                                <a href="cancelar_reserva.php?id=<?= $r->get('id') ?>&vehiculo_id=<?= $r->get('idVehiculo') ?>"
                                    onclick="return confirm('¿Cancelar esta reserva?')">
                                    Cancelar
                                </a>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                 <a href="../index.php" class="btn-volver">Volver al menu</a>

        </main>
    </div>
    <footer class="footer">
    <div class="contenido-footer">
       <p>Página de Reservaciones </p>
        <p><br>2026 - Gestor de Alquiler de Vehículos</p>
    </div>
</footer>
</body>
</html>