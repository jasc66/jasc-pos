<?php

/*require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";
*/


class TablaProveedores{

  /*=============================================
mostrar tabla de proveedores
  =============================================*/

  public function mostrarTabla(){

    $item = null;
    $valor = null;

    $proveedores = ControladorProveedores::ctrMostrarProveedores($item,$valor);

    echo '{
            "data": [';

            for ($i = 0; $i < count($proveedores)-1; $i++) { 

                  $item = "id";
                  $valor = $proveedores[$i]["id_proveedores"];

              $categorias = ControladorProveedores::ctrMostrarProveedores($item,$valor);

             echo '[
                        "'.($i+1).'",
                        "'.$proveedores[$i]["nombre_Proveedor"].'",
                        "'.$proveedores[$i]["correo"].'",
                        "'.$proveedores[$i]["telefono"].'",
                        "'.$proveedores[$i]["direccion"].'",
                        "'.$proveedores[$i]["fecha"].'",
                        "'.$proveedores[$i]["id"].'"
            ],';

            }

            $item = "id";
            $valor = $proveedores[count($proveedores)-1]["id_categoria"];

            $categorias = ControladorProveedores::ctrMostrarProveedores($item,$valor);

        
          echo'[
                        "'.count($proveedores).'",
                        "'.$proveedores[count($proveedores)-1]["nombre_Proveedor"].'",
                        "'.$proveedores[count($proveedores)-1]["correo"].'",
                        "'.$proveedores[count($proveedores)-1]["telefono"].'",
                        "'.$proveedores[count($proveedores)-1]["direccion"].'",
                        "'.$proveedores[count($proveedores)-1]["fecha"].'",
                        "'.$proveedores[count($proveedores)-1]["id"].'"
                ]


          ]
      }';

  }

 

}


/*=============================================
MOSTRAR TABLA DE PRODUCTOS APENAS SE EJECUTE
=============================================*/ 
$activar = new TablaProveedores();
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