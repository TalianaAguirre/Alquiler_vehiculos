<?php
require __DIR__ . '/../models/config/ModelBase.php';
require __DIR__ . '/../models/entities/Cliente.php';
require __DIR__ . '/../models/config/Conexion.php';
require __DIR__ . '/../models/queries/ClienteQuery.php';
require __DIR__ . '/../models/queries/ReservaQuery.php';
require __DIR__ . '/../controllers/ClienteController.php';

use monolitico\controllers\ClienteController;

$controller = new ClienteController();
$lista      = $controller->getLista();
$mensaje    = $_GET['msg'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="../public/pagina.css">
</head>
<body class="inner-page">
       <div class="menu">        
         <header>
            <div >
            <h1>Clientes</h1>
            </div>    
           

             <nav>
                <a href="registro_vehiculos.php">Vehículo</a>
                <a href="registro_reservas.php">Reserva</a>
                <a href="Historial.php">Historial</a>
             </nav>
        </header>
    </div>
    <div class="app-layout">
        <main class="content">
            <div class="content-header">
                <h1 class="content-title">Clientes registrados</h1>
                <a href="CrearClientes.php" class="btn">+ Registrar</a>
            </div>

            <?php if ($mensaje === 'creado'): ?>
                <p class="msg-exito">Cliente registrado correctamente.</p>
            <?php elseif ($mensaje === 'eliminado'): ?>
                <p class="msg-exito">Cliente eliminado correctamente.</p>
            <?php elseif ($mensaje === 'error_reservas'): ?>
                <p class="msg-error">No se puede eliminar: el cliente tiene reservas activas.</p>
            <?php endif; ?>

            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Licencia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $c): ?>
                        <tr>
                            <td><?= $c->get('id') ?></td>
                            <td><?= $c->get('nombre') ?></td>
                            <td><?= $c->get('telefono') ?></td>
                            <td><?= $c->get('correo') ?></td>
                            <td><?= $c->get('numero_licencia') ?></td>
                            <td class="td-acciones">
                                <a href="EliminarCliente.php?id=<?= $c->get('id') ?>"
                                   onclick="return confirm('¿Eliminar este cliente?')">Eliminar</a>
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
       <p>Página de Clientes </p>
        <p><br>2026 - Gestor de Alquiler de Vehículos</p>
    </div>
</footer>
</body>
</html>