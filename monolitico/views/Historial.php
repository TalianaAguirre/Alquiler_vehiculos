<?php
require __DIR__ . '/../models/config/ModelBase.php';
require __DIR__ . '/../models/entities/vehiculo.php';
require __DIR__ . '/../models/entities/Cliente.php';
require __DIR__ . '/../models/entities/reserva.php';
require __DIR__ . '/../models/config/Conexion.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../models/queries/ClienteQuery.php';
require __DIR__ . '/../models/queries/ReservaQuery.php';
require __DIR__ . '/../controllers/ReservaController.php';

use monolitico\controllers\ReservaController;

$filtro     = $_GET['filtro'] ?? null;
$controller = new ReservaController();
$historial  = $controller->getHistorial($filtro);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial</title>
    <link rel="stylesheet" href="../public/pagina.css">
</head>
<body class="inner-page">
       <div class="menu">        
         <header>
           
            <div >
            <h1>Historial</h1>
            </div>    
           

             <nav>
                <a href="registro_vehiculos.php">Vehículo</a>
                <a href="registr_clientes.php">Cliente</a>
                <a href="registro_reservas.php">Reserva</a>
             </nav>
        </header>
    </div>
    <div class="app-layout">
        <main class="content">
            <div class="content-header">
                <h1 class="content-title">Historial de Reservas</h1>
            </div>

            <!-- Filtro de búsqueda -->
            <form action="Historial.php" method="GET" class="formulario">
                <label>Buscar por cliente o vehículo
                    <input type="text" 
                           name="filtro" 
                           value="<?= htmlspecialchars($filtro ?? '') ?>"
                           placeholder="Ej: Juan, Toyota...">
                </label>
                <div class="form-actions">
                    <button type="submit" class="btn">Buscar</button>
                    <?php if ($filtro): ?>
                        <a href="Historial.php" class="btn">Limpiar</a>
                    <?php endif; ?>
                </div>
            </form>

            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Vehículo</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($historial)): ?>
                        <tr>
                            <td colspan="6" style="text-align:center">
                                No hay registros.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($historial as $r): ?>
                            <tr>
                                <td><?= $r->get('id') ?></td>
                                <td><?= $r->get('cliente_nombre') ?></td>
                                <td><?= $r->get('vehiculo_info') ?></td>
                                <td><?= $r->get('fecha_inicio') ?></td>
                                <td><?= $r->get('fecha_fin') ?></td>
                                <td><?= $r->get('estado') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
                <a href="../index.php" class="btn-volver">Volver al menú</a>
        </main>
    </div>
    <footer class="footer">
    <div class="contenido-footer">
        <p>Página de Historial </p>
        <p><br>2026 - Gestor de Alquiler de Vehículos</p>
    </div>
</footer>
</body>
</html>