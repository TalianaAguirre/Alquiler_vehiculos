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
        <a href="monolitico\views\registro_vehiculos.php" class="tarjeta">
            <div class="icono">
                <img src="public\recursos\carro.png" alt="icono de vehìculo">
            </div>
            
            <h3>Registrar Vehículo</h3>
            <p>Ingrese un nuevo vehículo</p>
        </a>

        <a href="monolitico\views\registr_clientes.php" class="tarjeta">
            <div class="icono"> 
                <img src="public\recursos\cliente.png" alt="icono de cliente">
            </div>
            <h3>Registrar cliente </h3>
            <p> Ingrese  un  nuevo cliente</p>
        </a>

        <a href="monolitico\views\registro_reservas.php" class="tarjeta">
            <div class="icono">
                <img src="public\recursos\bell.png" alt="icono de reserva">
            </div>
            <h3>Crear Reserva</h3>
            <p>Ingrese una nueva reserva</p>
        </a>

        <a href="monolitico\views\Historial.php" class="tarjeta">
            <div class="icono">
                <img src="public\recursos\lupa.png" alt="icono de lupa">
            </div>
            <h3>Realizar consulta</h3>
            <p>Consulte en el inventario</p>
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
