<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";



class AjaxProductos{

/*=============================================
GENERAR CODIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoProducto(){

    $item = "id_categoria";
    $valor = $this ->idCategoria;

    $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

    echo json_encode($respuesta);
  }

 /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idProducto;

  public function ajaxEditarProducto(){

    $item = "id";
    $valor = $this->idProducto;

    $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

    echo json_encode($respuesta);

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/ 

if(isset($_POST["idCategoria"])){

  $codigoProducto = new AjaxProductos();
  $codigoProducto -> idCategoria = $_POST["idCategoria"];
  $codigoProducto -> ajaxCrearCodigoProducto();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idProducto"])){

  $editarProducto = new AjaxProductos();
  $editarProducto -> idProducto = $_POST["idProducto"];
  $editarProducto -> ajaxEditarProducto();

}


/*{
            "data": [
              [
                "1",
                "vistas/img/productos/default/anonymous.png",
                "101",
                "Aspiradora Industrial",
                "EQUIPO INDUSTRIA",
                "20",
                "₡ 50.000",
                "₡ 55.000",
                "2018-06-22 15:17:46",
                "1",
              ],
              [
                "1",
                "vistas/img/productos/default/anonymous.png",
                "101",
                "Aspiradora Industrial",
                "EQUIPO INDUSTRIA",
                "20",
                "₡ 50.000",
                "₡ 55.000",
                "2018-06-22 15:17:46",
                "1",
              ]
            ]


    */