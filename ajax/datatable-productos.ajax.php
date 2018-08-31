<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";



class TablaProductos{

  /*=============================================
mostrar tabla de productos
  =============================================*/

  public function mostrarTabla(){

    $item = null;
    $valor = null;

    $productos = ControladorProductos::ctrMostrarProductos($item,$valor);

    echo '{
            "data": [';

            for ($i = 0; $i < count($productos)-1; $i++) { 

                  $item = "id";
                  $valor = $productos[$i]["id_categoria"];

              $categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor);

             echo '[
                        "'.($i+1).'",
                        "'.$productos[$i]["imagen"].'",
                        "'.$productos[$i]["codigo"].'",
                        "'.$productos[$i]["descripcion"].'",
                        "'.$categorias["categoria"].'",
                        "'.$productos[$i]["stock"].'",
                        "'.$productos[$i]["fecha"].'",
                        "'.$productos[$i]["id"].'"
            ],';

            }

            $item = "id";
            $valor = $productos[count($productos)-1]["id_categoria"];

            $categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor);

        
          echo'[
                        "'.count($productos).'",
                        "'.$productos[count($productos)-1]["imagen"].'",
                        "'.$productos[count($productos)-1]["codigo"].'",
                        "'.$productos[count($productos)-1]["descripcion"].'",
                        "'.$categorias["categoria"].'",
                        "'.$productos[count($productos)-1]["stock"].'",
                        "'.$productos[count($productos)-1]["fecha"].'",
                        "'.$productos[count($productos)-1]["id"].'"
                ]


          ]
      }';

  }

 

}


/*=============================================
MOSTRAR TABLA DE PRODUCTOS APENAS SE EJECUTE
=============================================*/ 
$activar = new TablaProductos();
$activar -> mostrarTabla();


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