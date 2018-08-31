/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	 $("#idCliente").val(respuesta["id"]);
         $("#editarCedula").val(respuesta["documento"]);
         $("#editarTipoCedula").html(respuesta["tipo"]);
	       $("#editarCliente").val(respuesta["nombre"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarEmail").val(respuesta["email"]);      
	       $("#editarDireccion").val(respuesta["direccion"]);

         $.ajax({
                        dataType: "json",
                        url: "https://ubicaciones.paginasweb.cr/provincias.json",
                        data: {},
                        success: function (data) {
                            var html = "<select>";
                            for(key in data) {
                                html += "<option value='"+key+"'>"+data[key]+"</option>";
                            }
                            html += "</select";
                            $('#editarProvincia').html(html);
                            $("#editarProvincia").val(respuesta["provincia"]);
  $.ajax({
                        dataType: "json",
                        url: "https://ubicaciones.paginasweb.cr/provincia/"+respuesta["provincia"]+"/cantones.json",
                        data: {},
                        success: function (data) {
                            var html = "<select>";
                            for(key in data) {
                                html += "<option value='"+key+"'>"+data[key]+"</option>";
                            }
                            html += "</select";
                            $('#editarCanton').html(html);
                            $("#editarCanton").val(respuesta["canton"]);


                          // <eter funcion de jlar distrito
                        }
                    });
     $.ajax({
                        dataType: "json",
                        url: "https://ubicaciones.paginasweb.cr/provincia/"+respuesta["provincia"]+"/canton/"+respuesta["canton"]+"/distritos.json",
                        data: {},
                        success: function (data) {
                            var html = "<select>";
                            for(key in data) {
                                html += "<option value='"+key+"'>"+data[key]+"</option>";
                            }
                            html += "</select";
                            $('#editarDistrito').html(html);
                            $("#editarDistrito").val(respuesta["distrito"]);
                        }
                    });

                }

                        // 

                        
                        // 
                    });
         
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
	swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }

  })

})

function canton(){ 
 
  var provincia = $("#editarProvincia option:selected" ).val();
  $.ajax({
                        dataType: "json",
                        url: "https://ubicaciones.paginasweb.cr/provincia/"+provincia+"/cantones.json",
                        data: {},
                        success: function (data) {
                            var html = "<select>";
                            for(key in data) {
                                html += "<option value='"+key+"'>"+data[key]+"</option>";
                            }
                            html += "</select";
                            $('#editarCanton').html(html);
                        }
                    });
}

function distrito(){
  var provincia = $("#editarProvincia option:selected" ).val();
  var canton = $("#editarCanton option:selected" ).val();
  $.ajax({
                        dataType: "json",
                        url: "https://ubicaciones.paginasweb.cr/provincia/"+provincia+"/canton/"+canton+"/distritos.json",
                        data: {},
                        success: function (data) {
                            var html = "<select>";
                            for(key in data) {
                                html += "<option value='"+key+"'>"+data[key]+"</option>";
                            }
                            html += "</select";
                            $('#editarDistrito').html(html);
                        }
                    });
}

