function getUsuario(id,idP,usu,perfil,estado) {
  //limpiando campos
  $("#editId").val(""),
  $("#editPersona").val(""),
  $("#editUsuario").val(""),
  $("#editPerfil").val(""),
  $("#editPass").val(""),
  $("#editEstado").val(""),
  //asignando datos
  $("#editId").val(id),
  $("#editPersona").val(idP),
  $("#editUsuario").val(usu),
  $("#editPerfil").val(perfil), 
  $("#editEstado").val(estado);
}
function getBorrarUsu(a) {
  $("#idBorrar").val(a);
}

