<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Alquiler</title>
    <link rel="stylesheet" href="views/css/style.css">
</head>
<body>

    <?php include 'views/includes/header.php'; ?>
    <?php include 'views/includes/menu.php'; ?>

    <main class="contenedor">
        <main class="contenedor">
    <div class="bienvenida">
        <h2>Bienvenida 👋</h2>
        <p>¿Qué deseas gestionar hoy?</p>
    </div>

    <div class="grid-acciones">
        <a href="views/registro_vehiculos.php" class="tarjeta">
            <div class="icono">🚗</div>
            <h3>Registrar Vehículo</h3>
            <p>carros a flota disponible.</p>
        </a>

        <a href="inventario.php" class="tarjeta">
            <div class="icono">📋</div>
            <h3>Ver Inventario</h3>
            <p> estado y precio de los vehículos.</p>
        </a>

        <a href="reservas.php" class="tarjeta">
            <div class="icono">📅</div>
            <h3>Gestionar Reservas</h3>
            <p>Revisar alquiler de vehiulos.</p>
        </a>
    </div>
</main>
    </main>
<?php include 'views/includes/footer.php'; ?>
</body>
</html>