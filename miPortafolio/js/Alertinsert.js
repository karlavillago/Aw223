
const parametros = new URLSearchParams(window.location.search);
const estado = parametros.get("estadophp");

if (estado === "exito") {
    alert("¡Mensaje guardado correctamente!");
} else if (estado === "error") {
    alert("Error al guardar el mensaje.");
}
if (estado === null){
    window.history.replaceState({}, document.title, window.location.pathname);
} 
