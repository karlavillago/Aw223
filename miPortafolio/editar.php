<?php
require_once "consulta_mensajes.php";
$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
$registro = consultaMensajePorId($id);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar mensaje | Portafolio de Karla María Cruz Villagómez Jiménez</title>
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body>

    <!-- Encabezado -->
    <header class="encabezado-admin">
        <h1>Editar mensaje</h1>
        <p>Modificar los datos del mensaje seleccionado</p>
    </header>

    <nav>
        <a href="index.php" class="regresar" title="Regresar al portafolio">
            <svg class="icono" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 11l9-8 9 8"/><path d="M5 10v10h5v-6h4v6h5V10"/></svg>
        </a>
        <a href="admin.php" class="regresar" title="Regresar a administracion">
            <svg class="icono" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 12H5"/><path d="M11 6l-6 6 6 6"/></svg>
        </a>
    </nav>

    <!-- Contenido principal -->
    <main>
        <section>
            <h2>Formulario de edicion</h2>

            <?php if($registro){ ?>
            <form id="formEditar" action="actualizar_mensaje.php" method="post">

                <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">

                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="txtnombre" value="<?php echo htmlspecialchars($registro['nombre']); ?>" required>
                </div>

                <div class="campo">
                    <label for="correo">Correo electronico:</label>
                    <input type="email" id="correo" name="txtcorreo" value="<?php echo htmlspecialchars($registro['correo']); ?>" required>
                </div>

                <div class="campo">
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="txtmensaje" rows="5" required><?php echo htmlspecialchars($registro['mensaje']); ?></textarea>
                </div>

                <button type="submit">Actualizar mensaje</button>

                <p id="resultadoEditar"></p>

            </form>
            <?php } else { ?>
            <p id="resultadoEditar">No se encontro el mensaje seleccionado.</p>
            <?php } ?>
        </section>
    </main>

    <!-- Pie de pagina -->
    <footer>
        <p>&copy; 2026 Karla María Cruz Villagómez Jiménez</p>
        <p>Practica de Programacion Web</p>
    </footer>

    <script src="js/AlertInsert.js"></script>
    <script>
        // Validar que no se envien campos vacios (ni solo espacios)
        var formEditar = document.getElementById("formEditar");
        if (formEditar) {
            formEditar.addEventListener("submit", function(event) {
                var nombre  = document.getElementById("nombre").value.trim();
                var correo  = document.getElementById("correo").value.trim();
                var mensaje = document.getElementById("mensaje").value.trim();

                if (nombre === "" || correo === "" || mensaje === "") {
                    event.preventDefault();
                    document.getElementById("resultadoEditar").textContent =
                        "No se permiten campos vacios.";
                }
            });
        }
    </script>

</body>
</html>