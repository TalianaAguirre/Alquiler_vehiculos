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
    <link rel="stylesheet" href="../public/style.css">
</head>
<body class="inner-page">
    <div class="app-layout">
        <?php require __DIR__ . '/includes/menu.php'; ?>
        <main class="content">
            <div class="content-header">
                <h1 class="content-title">Registrar Cliente</h1>
            </div>

            <form action="CrearClientes.php" method="POST" class="formulario">
                <label>Nombre
                    <input type="text" name="nombre" required>
                </label>
                <label>Teléfono
                    <input type="text" name="telefono">
                </label>
                <label>Correo
                    <input type="email" name="correo">
                </label>
                <label>Número de licencia
                    <input type="text" name="numero_licencia">
                </label>
                <div class="form-actions">
                    <button type="submit" class="btn">Registrar</button>
                    <a href="registr_clientes.php" class="btn-cancelar">Cancelar</a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>