function getEditRuta(id,ganancia,observacion){
    //Limpiando campos
    $("#editIdRuta").val(""),
    $("#editGananancia").val(""),
    $("#editObservacion").val("")


    //Asignando datos
    $("#editIdRuta").val(id),
    $("#editGananancia").val(ganancia),
    $("#editObservacion").val(observacion);
}