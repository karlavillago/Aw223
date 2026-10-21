<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion | Portafolio de Karla María Cruz Villagómez Jiménez</title>
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body>
    

    <!-- Encabezado -->
    <header class="encabezado-admin">
        <h1>Administracion</h1>
        <p>Mensajes recibidos</p>
    </header>

    <nav>
        <a href="index.php" class="regresar" title="Regresar al portafolio">
            <svg class="icono" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 11l9-8 9 8"/><path d="M5 10v10h5v-6h4v6h5V10"/></svg>
        </a>
    </nav>

    <!-- Contenido principal -->
    <main>
        <section>
            <h2>Lista de mensajes</h2>

            <div class="tabla-mensajes">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo electronico</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        require 'consulta_mensajes.php';
                        $rsMensajes = consultaMensajes();

                        // Iconos SVG negros (lapiz y bote de basura)
                        $iconoEditar = "<svg class='icono' viewBox='0 0 24 24' aria-hidden='true'><path d='M4 20h4L19 9l-4-4L4 16z'/><path d='M13.5 6.5l4 4'/></svg>";
                        $iconoBorrar = "<svg class='icono' viewBox='0 0 24 24' aria-hidden='true'><path d='M4 7h16'/><path d='M9 7V4h6v3'/><path d='M6 7l1 13h10l1-13'/><path d='M10 11v6M14 11v6'/></svg>";

                        while ($arrMensaje = mysqli_fetch_array($rsMensajes)) {

                            echo "<tr>
                        <td>".$arrMensaje['nombre']."</td>
                        <td>".$arrMensaje['correo']."</td>
                        <td>".$arrMensaje['mensaje']."</td>
                        <td>".$arrMensaje['timeStaps']."</td>
                        <td class='acciones'>
                        <a href='editar.php?id=".$arrMensaje['id']."'
                        class='icono-accion editar'
                        title='Editar mensaje'>".$iconoEditar."</a>
                        <a href='borrar_mensaje.php?id=".$arrMensaje['id']."'
                        class='icono-accion borrar'
                        title='Borrar mensaje'
                        onclick=\"return confirm('Estas seguro de borrar este mensaje');\">".$iconoBorrar."</a>
                        </td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- Pie de pagina -->
    <footer>
        <p>&copy; 2026 Karla María Cruz Villagómez Jiménez</p>
        <p>Practica de Programacion Web</p>
    </footer>

    <script src="js/AlertInsert.js"></script>
</body>
</html>