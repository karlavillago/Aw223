/* ==========================================================
   PRÁCTICA No. 3: HTML + CSS + JS
   Alumna: Maricruz Villagómez
   ========================================================== */

// --- PUNTO A: Cambiar el HTML desde JS ---
const btnCambiarMensaje = document.getElementById('btn-cambiar-mensaje');
const subtituloBienvenida = document.getElementById('subtitulo-bienvenida');

btnCambiarMensaje.addEventListener('click', () => {
    subtituloBienvenida.textContent = "¡Hola! Bienvenido a mi Portafolio ahora con JS";[span_1](start_span)[span_1](end_span)
});

// --- PUNTO B: Cambiar el CSS desde JS (Habilidades) ---
const btnColor = document.getElementById('btn-color');
const btnFuente = document.getElementById('btn-fuente');
const skillItems = document.querySelectorAll('.skill-item');

// Cambiar color de fondo y texto de las habilidades
btnColor.addEventListener('click', () => {
    skillItems.forEach(item => {
        item.style.backgroundColor = '#4a148c'; // Morado oscuro
        item.style.color = '#ffffff';          // Texto blanco
    });
});

// Cambiar tipo de letra de las habilidades
btnFuente.addEventListener('click', () => {
    skillItems.forEach(item => {
        item.style.fontFamily = 'Courier New, monospace';
    });
});


// --- PUNTO C: Validación de campos del formulario ---
const formContacto = document.getElementById('form-contacto');
const inputNombre = document.getElementById('nombre');
const inputCorreo = document.getElementById('correo');

formContacto.addEventListener('submit', (evento) => {
    // Evita que la página se recargue automáticamente al enviar
    evento.preventDefault();

    // Validar si el campo nombre está vacío
    if (inputNombre.value.trim() === '') {
        alert('Por favor, escribe tu nombre');
        inputNombre.focus();
        return;
    }

    // Validar si el campo correo está vacío
    if (inputCorreo.value.trim() === '') {
        alert('El correo es obligatorio');
        inputCorreo.focus();
        return;
    }

    // Si ambos campos tienen texto, simula el éxito del envío
    alert('Formulario enviado correctamente');
    formContacto.reset(); // Limpia el formulario
});