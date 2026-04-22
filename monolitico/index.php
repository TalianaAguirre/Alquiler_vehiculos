<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Alquiler</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>

<header class="header-principal">
    <div class="logo-contenedor">
        
        <h1>Gestor de Alquiler de Vehículos</h1>
    </div>
    <p class="subtitulo">Administración de disponibilidad y reservas</p>
</header>

    <main class="contenedor">
        <main class="contenedor">
    <div class="bienvenida">
        <h2>Bienvenida </h2>
        <p>¿Qué deseas gestionar hoy?</p>
    </div>

    <div class="grid-acciones">
        <a href="views/registro_vehiculos.php" class="tarjeta">
            <div class="icono">
                <img src="monolitico\public\recursos\carro.jpg" alt="icono de vehìculo">
            </div>
            
            <h3>Registrar Vehículo</h3>
            <p>carros a flota disponible.</p>
        </a>

        <a href="inventario.php" class="tarjeta">
            <div class="icono"> 
                <img src="monolitico\public\recursos\usuario.jpg" alt="icono de cliente">
            </div>
            <h3>Registrar cliente nuevo</h3>
            <p> Lista de clientes</p>
        </a>

        <a href="reservas.php" class="tarjeta">
            <div class="icono">
                <img src="monolitico\public\recursos\bell.jpg" alt="icono de reserva">
            </div>
            <h3>Gestionar Reservas</h3>
            <p>Revisar alquiler de vehiulos.</p>
        </a>

        <a href="reservas.php" class="tarjeta">
            <div class="icono">
                <img src="monolitico\public\recursos\lupa.jpg" alt="icono de lupa">
            </div>
            <h3>Gestionar Reservas</h3>
            <p>Revisar alquiler de vehiulos.</p>
        </a>
    </div>
</main>
    </main>
<footer class="footer-principal">
    <div class="contenido-footer">
        <p>&copy; 2026 - Gestor de Alquiler de Vehículos</p>
        <p><br>Salome Aguirre <br>Valeria Sandoval|  Universidad de Boyaca</p>
    </div>
</footer>
</body>
</html>