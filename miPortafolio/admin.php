<?php
require_once("conexion.php");

$sql = "SELECT * FROM mensajes";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion | Mi Portafolio</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <style>
        /* Estilo para asegurar que la tabla tenga líneas divisorias en las casillas */
        .tabla-mensajes table {
            width: 100%;
            border-collapse: collapse;
        }
        .tabla-mensajes th, .tabla-mensajes td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }
        /* Centrar la casita en su barra */
        .barra-home {
            text-align: center;
            padding: 8px 0;
        }
        .barra-home a {
            color: #333333;
            display: inline-block;
            text-decoration: none;
        }
        /* Iconos de acciones en negro */
        .btn-accion svg {
            stroke: #000000;
        }
    </style>
</head>
<body>

    <!-- Encabezado con la franja morada -->
    <header class="encabezado-admin">
        <h1>Zona Administración</h1>
        <p>Mensajes Recibidos</p>
    </header>
    
    <!-- Franja rosada con el icono de casa centrado -->
    <div class="barra-home">
        <a href="index.php" title="Regresar al portafolio">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
        </a>
    </div>

    <!-- Contenido principal -->
    <main>
        <section>
            <h2>Mensajes Recibidos</h2>
            
            <div class="tabla-mensajes">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($fila = $resultado->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['correo']; ?></td>
                                <td><?php echo $fila['mensaje']; ?></td>
                                <td><?php echo $fila['timeStaps']; ?></td>
                                <td>
                                    <!-- Iconos en negro -->
                                    <a href="#" class="btn-accion" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                    </a>
                                    <a href="#" class="btn-accion" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>© 2026 Mi Portafolio | Práctica de Programación Web</p>
    </footer>

</body>
</html>