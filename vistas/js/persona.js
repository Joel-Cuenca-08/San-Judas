function getPersona(id,Nombre,ApellidoPa,ApellidoMa,Tel,TipoDoc,Nacionalidad,Correo,Direccion) {
    //limpiando campos
    $("#editId").val(""),
    $("#editNombre").val(""),
    $("#editApellidoPa").val(""),
    $("#editApellidoMa").val(""),
    $("#editTelefono").val(""),
    $("#editTipo").val(""),
    $("#editNacionalidad").val(""),
    $("#editCorreo").val(""),
    $("#editDireccion").val("")
    //asignando datos
    $("#editId").val(id),
    $("#editNombre").val(Nombre),
    $("#editApellidoPa").val(ApellidoPa),
    $("#editApellidoMa").val(ApellidoMa),
    $("#editTelefono").val(Tel),
    $("#editTipo").val(TipoDoc),
    $("#editNacionalidad").val(Nacionalidad),
    $("#editCorreo").val(Correo),
    $("#editDireccion").val(Direccion);
  }

  