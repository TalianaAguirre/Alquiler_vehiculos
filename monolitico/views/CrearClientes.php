<?php
require __DIR__ . '/../models/config/ModelBase.php';
require __DIR__ . '/../models/entities/Cliente.php';
require __DIR__ . '/../models/config/Conexion.php';
require __DIR__ . '/../models/queries/ClienteQuery.php';
require __DIR__ . '/../controllers/ClienteController.php';

use monolitico\controllers\ClienteController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ClienteController();
    $controller->registrar($_POST);
    header('Location: registr_clientes.php?msg=creado');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Cliente</title>
    <link rel="stylesheet" href="../public/pagina.css">
</head>
<body>
    <div class="menu">        
        <header>
            <h1>Clientes</h1>
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
                <h1 class="content-title">Registrar Cliente</h1>
            </div>
            <form action="CrearClientes.php" method="POST" class="formulario">
                <label>Nombre <input type="text" name="nombre" required></label>
                <label>Teléfono <input type="text" name="telefono"></label>
                <label>Correo <input type="email" name="correo"></label>
                <label>Número de licencia <input type="text" name="numero_licencia"></label>
                <div class="form-actions">
                    <button type="submit" class="btn">Registrar</button>
                    <a href="registr_clientes.php" class="btn-volver">Cancelar</a>
                </div>
            </form>
        </main>
    </div>

    <footer class="footer">
        <div class="contenido-footer">
            <p>Registrar Cliente</p>
            <p><br>2026 - Gestor de Alquiler de Vehículos</p>
        </div>
    </footer>
</body>
</html>