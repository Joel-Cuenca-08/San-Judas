function getVehiculo(id,idP,placa,tipo,estado){
    //Limpiando campos
    $("#editId").val(""),
    $("#editIdPersona").val(""),
    $("#editPlaca").val(""),
    
    $("#editTipo").val(""),
    $("#editEstado").val("");


    //Asignando datos
    $("#editId").val(id),
    $("#editIdPersona").val(idP),
    $("#editPlaca").val(placa),
    
    $("#editTipo").val(tipo),
    $("#editEstado").val(estado);
}