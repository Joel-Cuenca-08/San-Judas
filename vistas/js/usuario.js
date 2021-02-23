/*
function getUsuario2(id) {
  var datos = new FormData();
  datos.append("idBuscar", id),
    $("#editId").val(""),
    $("#editPeriodo").val(""),
    $("#editFechaI").val(""),
    $("#editFechaF").val(""),
    $.ajax({
      url: "ajax/usuario.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataicon: "json",
      success: function (resultado) {
        $("#editId").val(resultado["Id"]),
          $("#editPersona").val(resultado["IdPersona"]),
          $("#editUsuario").val(resultado["usuario"]),
          $("#editPass").val(resultado["password"]),
          $("#editPerfil").val(resultado["perfil"]);
          $("#editEstado").val(resultado["estado"]);
      },
    });
}*/
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

