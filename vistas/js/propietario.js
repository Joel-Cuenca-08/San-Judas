function getPropietario(id,idP,tarjeta,tel,estado){
    //Limpiando campos
    $("#editId").val(""),
    $("#editIdPersona").val(""),
    $("#editTarjeta").val(""),
    
    $("#editTel").val(""),
    $("#editEstado").val("")


    //Asignando datos
    $("#editId").val(id),
    $("#editIdPersona").val(idP),
    $("#editTarjeta").val(tarjeta),
    
    $("#editTel").val(tel),
    $("#editEstado").val(estado);
}