// Muestra un aviso en el contenedor #aviso
function mostrarAviso(texto, tipo) {
  const contenedor = document.getElementById("aviso");
  contenedor.innerHTML = "";
  const div = document.createElement("div");
  div.className = "mensaje " + tipo;
  div.textContent = texto;
  contenedor.appendChild(div);
  setTimeout(() => (contenedor.innerHTML = ""), 5000);
}

// Si PHP mandó un mensaje, lo mostramos
const aviso = document.getElementById("aviso");
if (aviso && aviso.dataset.msg) {
  mostrarAviso(aviso.dataset.msg, aviso.dataset.tipo);
}

// Validar el formulario antes de enviarlo
const form = document.getElementById("formSeguimiento");
if (form) {
  form.addEventListener("submit", function (e) {
    const estado = form.estado;
    const observacion = form.observacion;
    let error = "";

    estado.classList.remove("invalido");
    observacion.classList.remove("invalido");

    if (estado.value === "") {
      error = "Selecciona un estado.";
      estado.classList.add("invalido");
    } else if (observacion.value.trim().length < 5) {
      error = "La observación debe tener al menos 5 caracteres.";
      observacion.classList.add("invalido");
    }

    if (error) {
      e.preventDefault();
      mostrarAviso(error, "error");
    }
  });
}