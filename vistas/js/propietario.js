function getPropietario(id,idP,tarjeta,ruc,tel,estado){
    //Limpiando campos
    $("#editId").val(""),
    $("#editIdPersona").val(""),
    $("#editTarjeta").val(""),
    $("#editRuc").val(""),
    $("#editTel").val(""),
    $("#editEstado").val("")


    //Asignando datos
    $("#editId").val(id),
    $("#editIdPersona").val(idP),
    $("#editTarjeta").val(tarjeta),
    $("#editRuc").val(ruc),
    $("#editTel").val(tel),
    $("#editEstado").val(estado);
}