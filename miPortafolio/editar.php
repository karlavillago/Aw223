<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mensaje - Zona Administración</title>
    <link rel="stylesheet" href="./CSS/estilos.css">
</head>
<body>

    <!-- Encabezado -->
    <header>
        <h1>Zona Administración</h1>
        <p>Formulario para Editar</p>
    </header>

    <!-- Iconos Superiores: Recargar/Admin y Casita -->
    <nav style="text-align: center; padding: 15px; display: flex; justify-content: center; gap: 15px;">
        <!-- Icono Recargar / Volver a Admin -->
        <a href="admin.php" title="Regresar a Zona Admin" style="color: #333; text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </a>
        <!-- Icono Casita -->
        <a href="index.php" title="Regresar al portafolio" style="color: #333; text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10" />
            </svg>
        </a>
    </nav>

    <!-- Contenido Principal -->
    <main style="padding: 20px; max-width: 600px; margin: auto;">
        <h2 style="text-align: center; margin-bottom: 20px;">Editar Mensaje</h2>
        
        <form action="#" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            <div>
                <label for="nombre" style="display: block; margin-bottom: 5px; font-weight: bold;">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="Juan" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div>
                <label for="correo" style="display: block; margin-bottom: 5px; font-weight: bold;">Correo electrónico</label>
                <input type="email" id="correo" name="correo" value="juan@example.com" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div>
                <label for="mensaje" style="display: block; margin-bottom: 5px; font-weight: bold;">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">Hola, me interesa tu portafolio.</textarea>
            </div>

            <button type="submit" style="background-color: #333; color: white; padding: 12px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">
                Actualizar Mensaje
            </button>
        </form>
    </main>

    <!-- Pie de página -->
    <footer style="text-align: center; padding: 20px; margin-top: 40px;">
        <p>&copy; 2026 Mi Portafolio | Práctica de Programación Web</p>
    </footer>

</body>
</html>