function getConductor(id,idP,nroLicencia,catLicencia,estado){
    //Limpiando campos
    $("#editId").val(""),
    $("#editIdPersona").val(""),
    $("#editLicencia").val(""),
    $("#editCatLicencia").val(""),
    $("#editEstado").val("")


    //Asignando datos
    $("#editId").val(id),
    $("#editIdPersona").val(idP),
    $("#editLicencia").val(nroLicencia),
    $("#editCatLicencia").val(catLicencia),
    $("#editEstado").val(estado);
}