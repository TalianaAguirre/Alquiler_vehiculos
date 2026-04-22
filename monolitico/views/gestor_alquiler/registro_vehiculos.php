<?php
require __DIR__ . '/../models/config/ModelBase.php';
require __DIR__ . '/../models/entities/vehiculo.php';
require __DIR__ . '/../models/config/Conexion.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';
use app\controllers\VehiculoController;
$controller = new VehiculoController();
$lista      = $controller->getLista();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vehículos</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <div class="page-container">
        <div class="page-header">
            <h1>Vehículos</h1>
        </div>

        <div class="acciones">
            <a href="crear_vehiculo.php" class="btn">Registrar vehículo</a>
        </div>

        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Categoría</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $v): ?>
                <tr>
                    <td><?= $v->get('id') ?></td>
                    <td><?= $v->get('marca') ?></td>
                    <td><?= $v->get('modelo') ?></td>
                    <td><?= $v->get('anio') ?></td>
                    <td><?= $v->get('categoria') ?></td>
                    <td>
                        <span class="badge badge-<?= $v->get('estado') ?>">
                            <?= ucfirst($v->get('estado')) ?>
                        </span>
                    </td>
                    <td class="td-acciones">
                        <a href="eliminar_vehiculo.php?id=<?= $v->get('id') ?>"
                           onclick="return confirm('¿Eliminar este vehículo?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <a href="../index.php" class="btn-volver">Volver al menu</a>

</body>
</html>