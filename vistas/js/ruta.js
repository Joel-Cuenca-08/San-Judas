function getRuta(id){
    //Limpiando campos
    $("#editId").val("");
    var datos2 = new FormData();
    datos2.append("idRuta", id); 
    $.ajax({
        url: "ajax/rutaDetalle.ajax.php",
        method: "POST",
        data: datos2,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) { 
            $("#editId").val(id);
            if(respuesta["HoraLlegada"]!=null || respuesta==null){
                $("#editEstado").val("0");
                $("#editText").val("Salida");
            }else{                
                $("#editEstado").val(respuesta["Id"]);
                $("#editText").val("Llegada");
            }
             
        }
    });
    
    $("#editId").val(id);
    
}


