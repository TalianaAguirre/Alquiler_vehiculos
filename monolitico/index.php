<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Alquiler</title>
    <link rel="stylesheet" href="public/index.css">
</head>
<body>

<header class="header">
    <div class="logo-contenedor">
        
        <h1>Gestor de Alquiler de Vehículos</h1>
    </div>
    <h4 class="subtitulo">Administración de disponibilidad y reservas</h4>
</header>

<main class="contenedor">
       
    <div class="bienvenida">
        <h2>Te doy la bienvenida </h2>
        <h4>¿Qué deseas gestionar hoy?</h4>
    </div>

    <div class="grid-acciones">
        <a href="/Alquiler_vehiculos/monolitico/views/registro_vehiculos.php" class="tarjeta">
            <div class="icono">
                <img src="public\recursos\car.png" alt="icono de vehìculo">
            </div>
            
            <h3>Registrar Vehículo</h3>
            <p>Ingresa un nuevo vehículo</p>
        </a>

        <a href="/Alquiler_vehiculos/monolitico/views/registr_clientes.php" class="tarjeta">
            <div class="icono"> 
                <img src="public\recursos\clien.png" alt="icono de cliente">
            </div>
            <h3>Registrar cliente </h3>
            <p> Ingresa un  nuevo cliente</p>
        </a>

        <a href="/Alquiler_vehiculos/monolitico/views/registro_reservas.php" class="tarjeta">
            <div class="icono">
                <img src="public\recursos\reser.png" alt="icono de reserva">
            </div>
            <h3>Crear Reserva</h3>
            <p>Ingresa una nueva reserva</p>
        </a>

        <a href="/Alquiler_vehiculos/monolitico/views/Historial.php" class="tarjeta">
            <div class="icono">
                <img src="public\recursos\lup.png" alt="icono de lupa">
            </div>
            <h3>Realizar consulta</h3>
            <p>Consulta en el inventario</p>
        </a>
    </div>
</main>
<footer class="footer">
    <div class="contenido-footer">
        <p> 2026 - Gestor de Alquiler de Vehículos</p>
        <p><br>Valeria Sandoval | Salome Aguirre</p>
        <p> Universidad de Boyacá</p>
    </div>
</footer>
</body>
</html>
