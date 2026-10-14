<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>
    <link rel="stylesheet" href="./CSS/estilos.css">
</head>

<body>
    <!-- Encabezado (Modificación Punto A: ID en título y botón agregado) -->
    <header>
    <h1 id="titulo-bienvenida">Mi Portafolio</h1>
    <p id="subtitulo-bienvenida">Bienvenido a mi sitio web personal</p>
    <button id="btn-cambiar-mensaje" class="boton-js">Cambiar Mensaje</button>
</header>

    <!-- Navegación -->
    <nav>
        <a href="#inicio">Inicio</a>
        <a href="#sobre-mi">Sobre mí</a>
        <a href="#habilidades">Habilidades</a>
        <a href="#proyectos">Proyectos</a>
        <a href="#contacto">Contacto</a>
        <a href="admin.php">Admin</a>
    </nav>

    <!-- Contenido principal -->
    <main>
        <!-- Sección Inicio -->
        <section id="inicio" class="seccion-inicio">
            <div class="seccion-contenido"> 
                <h2>Hola, Soy Maricruz Villagómez</h2>
                <p>Soy estudiante y estoy aprendiendo desarrollo web</p>
                <a href="#proyectos" class="boton">Ver mis proyectos</a>
            </div>
        </section>
      
        <!-- Sección Sobre mí -->
        <section id="sobre-mi">
            <h2>Sobre mí</h2>
            <div class="sobre-mi-contenido">
               <img src="./img/perfil.jpg" alt="Foto de perfil">
                <div>
                    <p>Algo sobre mí</p>
                    <p>En esta práctica estoy aprendiendo HTML y CSS</p>
                </div>
            </div>
        </section>

        <!-- Sección Habilidades (Modificación Punto B: clases agregadas y botones nuevos) -->
        <section id="habilidades">
            <h2>Mis habilidades</h2>
           <ul class="lista-habilidades">
            <li class="skill-item">Scratch</li>
            <li class="skill-item">JAVA</li>
            <li class="skill-item">PSeInt</li>
            <li class="skill-item">Packet Tracer</li>
            <li class="skill-item">MySQL</li>
           </ul>
           <div class="botones-habilidades">
               <button id="btn-color">Cambiar color</button>
               <button id="btn-fuente">Cambiar tipo de letra</button>
           </div>
        </section>

        <!-- Sección de Proyectos -->
        <section id="proyectos">
            <h2>Mis proyectos</h2>
            <div class="contenedor-proyectos">
                <article class="proyecto">
                    <h3>Sistema de algo</h3>
                    <p>Descripción del sistema</p>
                    <a href="#">Ver proyecto</a>
                </article>
                <article class="proyecto">
                    <h3>Sistema de algo</h3>
                    <p>Descripción del sistema</p>
                    <a href="#">Ver proyecto</a>
                </article>
            </div>
        </section>

        <!-- Sección de Contacto (Modificación Punto C: ID agregado al formulario) -->
        <section id="contacto">
            <h2>Contáctame</h2>
            <form id="formulario" action="guardar_mensaje.php" method="post>
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="txtnombre">
                </div>

                <div class="campo">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="txtcorreo">
                </div>

                <div class="campo">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="txtmensaje" rows="5"></textarea>
                </div>
                
                <button type="submit" class="boton">Enviar mensaje</button>
            </form>
        </section>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>2026 Mi portafolio web</p>
        <p>Práctica de programación web - Todos los derechos reservados</p>
    </footer>

    <!-- Enlazando el archivo JavaScript en su propia carpeta -->
    <script src="./js/main.js"></script>
</body>
</html>