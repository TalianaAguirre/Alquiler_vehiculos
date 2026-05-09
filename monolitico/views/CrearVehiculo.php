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
    header('Location: registro_vehiculos.php?msg=creado');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Vehículo</title>
    <link rel="stylesheet" href="../public/pagina.css">
</head>
<body>

    <div class="menu">        
        <header>
            <h1>Vehículos</h1>
            <nav>
                <a href="registr_clientes.php">Cliente</a>
                <a href="registro_reservas.php">Reserva</a>
                <a href="Historial.php">Historial</a>
            </nav>
        </header>
    </div>

    <div class="app-layout">
        <main class="content">

            <div class="content-header">
                <h2 class="content-title">Registrar Vehículo</h2>
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
                <div class="form-actions">
                    <button type="submit" class="btn">Registrar</button>
                    <a href="registro_vehiculos.php" class="btn-volver">Volver</a>
                </div>
            </form>

        </main>
    </div>

    <footer class="footer">
        <div class="contenido-footer">
            <p>Registrar Vehículo</p>
            <p><br>2026 - Gestor de Alquiler de Vehículos</p>
        </div>
    </footer>

</body>
</html>