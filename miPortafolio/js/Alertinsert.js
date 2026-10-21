
const parametros = new URLSearchParams(window.location.search);
const estado = parametros.get("estadophp");

if(estado === "exito"){
    alert("Exito, tu mensaje fue guardado");
}else if (estado === "error"){
    alert("Algo fallo, intentalo nuevamente");
}else if (estado === "actualizado"){
    alert("El mensaje se actualizo correctamente");
}else if (estado === "errorActualizar"){
    alert("No se pudo actualizar el mensaje, intentalo nuevamente");
}else if (estado === "vacio"){
    alert("No se permiten campos vacios y el correo debe ser valido");
}else if (estado === "borrado"){
    alert("El mensaje se borro correctamente");
}else if (estado === "errorBorrar"){
    alert("No se pudo borrar el mensaje, intentalo nuevamente");
}

if(estado != null){
    // Quita solo estadophp y conserva lo demas (por ejemplo el id)
    parametros.delete("estadophp");
    const resto = parametros.toString();
    window.history.replaceState({},document.title,window.location.pathname + (resto ? "?" + resto : ""));
}