<?php
require __DIR__ . '/../models/config/ModelBase.php';
require __DIR__ . '/../models/entities/vehiculo.php';
require __DIR__ . '/../models/config/Conexion.php';
require __DIR__ . '/../models/queries/VehiculoQuery.php';
require __DIR__ . '/../controllers/VehiculoController.php';
use monolitico\controllers\VehiculoController;
$controller = new VehiculoController();
$lista      = $controller->getLista();
$mensaje = $_GET['msg'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vehículos</title>
    <link rel="stylesheet" href="../public/pagina.css">
</head>

<body class="inner-page">
    <div class="menu">        
         <header>
            <div >
            <h1>Vehículos</h1>
            </div>    
           

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
                    <h1 class="content-title">
                       Vehículos registrados
                    </h1>
                    <a href="CrearVehiculo.php" class="btn">Registrar vehículo</a>
                </div>

                  <?php if ($mensaje === 'creado'): ?>
                      <p class="msg-exito">Vehículo registrado correctamente.</p>
                  <?php elseif ($mensaje === 'eliminado'): ?>
                      <p class="msg-exito">Vehículo eliminado correctamente.</p>
                  <?php elseif ($mensaje === 'error_reservas'): ?>
                      <p class="msg-error">No se puede eliminar: el vehículo tiene reservas activas.</p>
                   <?php endif; ?>

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
                           <td><?= $v->id ?></td>
                           <td><?= $v->marca ?></td>
                           <td><?= $v->modelo ?></td>
                           <td><?= $v->anio ?></td>
                           <td><?= $v->categoria ?></td>
                           <td><?= $v->estado ?></td>
                           <td class="td-acciones">
                               <a href="EliminarVehiculo.php?id=<?= $v->id ?>"
                                  onclick="return confirm('¿Desea eliminar este vehículo?')">Eliminar</a>
                           </td>
                       </tr>
                       <?php endforeach; ?>
                   </tbody>
                </table>

    
    
                   <a href="../index.php" class="btn-volver">Volver al menú</a>
                 
        </main>
    </div>
    <footer class="footer">
    <div class="contenido-footer">
        <p>Página de Vehículos </p>
        <p><br>2026 - Gestor de Alquiler de Vehículos</p>
    </div>
</footer>
</body>
</html>