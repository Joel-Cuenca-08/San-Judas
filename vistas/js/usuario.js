function getEditUsu(i) {
  var datos = new FormData();
  datos.append("idEditar", i);
  $.ajax({
    url: "ajax/usuario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#editId").val(respuesta["ID"]);
      document.getElementById("editIdPer").value = respuesta["IDPER"];
      $("#editIdPer").val(respuesta["IDPER"]);
      $("#editUsuario").val(respuesta["usuario"]);
      $("#editPass").val(respuesta["password"]);
      $("#editPerfil").val(respuesta["perfil"]);
      $("#EditEstado").val(respuesta["estado"]);
      console.log(respuesta);
    },
  });
}

function getBorrarUsu(a) {
  $("#idBorrar").val(a);
}
