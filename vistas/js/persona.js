function getPersona(id,TipoDoc,Nacionalidad,Nombre,ApellidoPa,ApellidoMa,Tel,Correo,Direccion) {
    //limpiando campos
    $("#editId").val(""),
    $("#editTipoDoc").val(""),
    $("#editNacionalidad").val(""),
    $("#editNombre").val(""),
    $("#editApellidoPa").val(""),
    $("#editApellidoMa").val(""),
    $("#editTel").val(""),
    $("#editCorreo").val(""),
    $("#editDireccion").val("")
    //asignando datos
    $("#editId").val(id),
    $("#editTipoDoc").val(TipoDoc),
    $("#editNacionalidad").val(Nacionalidad),
    $("#editNombre").val(Nombre),
    $("#editApellidoPa").val(ApellidoPa),
    $("#editApellidoMa").val(ApellidoMa),
    $("#editTel").val(Tel),
    $("#editCorreo").val(Correo),
    $("#editDireccion").val(Direccion);
  }

  