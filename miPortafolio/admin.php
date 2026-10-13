<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Administración - Mi Portafolio</title>
    <link rel="stylesheet" href="./CSS/estilos.css">
</head>
<body>

    <!-- Encabezado -->
    <header>
        <h1>Zona Administración</h1>
        <p>Mensajes Recibidos</p>
    </header>

    <!-- Icono Casita (Regreso al Portafolio) -->
    <nav style="text-align: center; padding: 15px;">
        <a href="index.php" title="Regresar al portafolio" style="color: #333; text-decoration: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10" />
            </svg>
        </a>
    </nav>

    <!-- Tabla -->
    <main style="padding: 20px; max-width: 900px; margin: auto;">
        <h2 style="text-align: center; margin-bottom: 20px;">Mensajes Recibidos</h2>
        
        <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #333; color: white;">
                    <th style="padding: 10px;">ID</th>
                    <th style="padding: 10px;">Nombre</th>
                    <th style="padding: 10px;">Correo</th>
                    <th style="padding: 10px;">Mensaje</th>
                    <th style="padding: 10px;">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Ejemplo 1: Juan -->
                <tr>
                    <td style="padding: 10px; text-align: center;">1</td>
                    <td style="padding: 10px;">Juan</td>
                    <td style="padding: 10px;">juan@example.com</td>
                    <td style="padding: 10px;">Hola, me interesa tu portafolio.</td>
                    <td style="padding: 10px; text-align: center;">
                        <!-- Icono Editar (Lápiz) -->
                        <a href="editar.php?id=1" title="Editar" style="color: #333; text-decoration: none; margin-right: 8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <!-- Icono Borrar (Bote de basura) -->
                        <a href="#" title="Eliminar" style="color: #333; text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </td>
                </tr>
                <!-- Ejemplo 2: Sergio -->
                <tr>
                    <td style="padding: 10px; text-align: center;">2</td>
                    <td style="padding: 10px;">Sergio</td>
                    <td style="padding: 10px;">sergio@example.com</td>
                    <td style="padding: 10px;">Quisiera más información sobre tus proyectos.</td>
                    <td style="padding: 10px; text-align: center;">
                        <a href="editar.php?id=2" title="Editar" style="color: #333; text-decoration: none; margin-right: 8px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <a href="#" title="Eliminar" style="color: #333; text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <!-- Pie de página -->
    <footer style="text-align: center; padding: 20px; margin-top: 40px;">
        <p>&copy; 2026 Mi Portafolio | Práctica de Programación Web</p>
    </footer>

</body>
</html>