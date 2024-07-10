if (window.history.replaceState) {
    window.history.replaceState(null,null,window.location.href)
    
}

function eliminar(){
    let respuesta = confirm("¿Estas seguro de que quieres eliminar al empleado?");
    return respuesta;
}