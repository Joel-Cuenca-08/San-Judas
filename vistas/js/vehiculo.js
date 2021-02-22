function getVehiculo(id,idP,placa,marca,año,tipo,estado){
    //Limpiando campos
    $("#editId").val(""),
    $("#editIdPersona").val(""),
    $("#editPlaca").val(""),
    $("#editMarca").val(""),
    $("#editAño").val("")
    $("#editTipo").val("");
    $("#editEstado").val("");


    //Asignando datos
    $("#editId").val(id),
    $("#editIdPersona").val(idP),
    $("#editPlaca").val(placa),
    $("#editMarca").val(marca),
    $("#editAño").val(año);
    $("#editTipo").val(tipo);
    $("#editEstado").val(estado);
}