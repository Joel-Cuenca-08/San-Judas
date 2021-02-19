function getAdministrativo(id,idP,idPeriodo,idSede,cargo,funcion,estado){
    //Limpiando campos
    $("#editId").val(""),
    $("#editIdPersona").val(""),
    $("#editIdPeriodo").val(""),
    $("#editIdSede").val(""),
    $("#editCargo").val(""),
    $("#editFuncion").val(""),
    $("#editEstado").val("")


    //Asignando datos
    $("#editId").val(id),
    $("#editIdPersona").val(idP),
    $("#editIdPeriodo").val(idPeriodo),
    $("#editIdSede").val(idSede),
    $("#editCargo").val(cargo),
    $("#editFuncion").val(funcion),
    $("#editEstado").val(estado);
}
