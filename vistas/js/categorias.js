//al crear un js nos tenemos que ir a plantilla para vincular el archivo js

/*=============================================
=            para editar categoria =
=============================================*/
$(document).ready(function() {
$(".tablas").on("click",".btnEditarCategoria", function(){

	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({

		url:"ajax/categorias.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
     		$("#editarCategoria").val(respuesta["categoria"]);
     		$("#idCategoria").val(respuesta["id"]);

			}
		
	})
})

/*=============================================
=            para eliminar categoria =
=============================================*/

$(".tablas").on("click", ".btnEliminarCategoria", function(){

  var idCategoria = $(this).attr("idCategoria");

  swal({
    title: '¿Está seguro de borrar la categoría?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar categoría!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;

    }

  })

})
}());