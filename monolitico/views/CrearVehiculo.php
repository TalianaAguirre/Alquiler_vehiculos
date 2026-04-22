<?php
require __DIR__ . '/../models/config/ModelBase.php';
require __DIR__ . '/../models/entities/vehiculo.php';
require __DIR__ . '/../models/config/Conexion.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';

use monolitico\controllers\VehiculoController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST['estado'] = 'disponible';
    $controller = new VehiculoController();
    $controller->registrar($_POST);
    header('Location: vehiculos.php?msg=creado');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Vehículo</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

    <div class="page-container">

        <div class="page-header">
            <h1>Registrar Vehículo</h1>
        </div>

        <form action="CrearVehiculo.php" method="POST" class="formulario">
            <label>Marca
                <input type="text" name="marca" required>
            </label>
            <label>Modelo
                <input type="text" name="modelo" required>
            </label>
            <label>Año
                <input type="number" name="anio" min="1990" max="2030" required>
            </label>
            <label>Categoría
                <input type="text" name="categoria">
            </label>
            <a href="registro_vehiculos.php" class="btn-volver">Registrar</a>
        </form>

    </div>
    <a href="registro_vehiculos.php" class="btn-volver">Volver</a>
</body>
</html>