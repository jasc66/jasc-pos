<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Administrar categoría

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar categoría</li>

    </ol>
  </section>


  <!-- aqui encontramos el contenido -->

  <section class="content">

    <!-- Default box -->

    <div class="box">

      <div class="box-header with-border">

       <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
         
         Agregar categoría

       </button>

      </div>

<!-- aqui vamos a incluir el cuerpo y la tabla -->

      <div class="box-body">

<!-- clases exclusivas de bootstrap para tablas  -->
       <table class="table table-bordered table-striped dt-responsive tablas" >

        <thead>
          
          <tr>
            
            <th style="width: 10px">#</th>
            <th>categoría</th>
            <th>Acciones</th>

          </tr>


        </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

          foreach ($categorias as $key => $value) {

            // <td>'.($key+1).'</td> se usa para colocar la numeracion de la tabla
            // class="text-uppercase // es una clase de boostrap para colocar el texto en masyuscula
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["categoria"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
          }

          ?>

          
        </tbody>
  

       </table>

      </div>

 

    </div>

   

  </section>
  

</div>

<!--=====================================
=     Modal Para agregar categoria        =
======================================-->


<!-- Se utiliza el mismo modal de la linea 30 -->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- aqui se puede modificar la ventana emergente-->

    <div class="modal-content">

      <form role="form" method="post">

  <!--=====================================
  =    CABEZA DEL MODAL       =
  ======================================-->
        

        <div class="modal-header" style="background: #00c0ef; color:white" align="center">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar categoría</h4>

        </div>

        <div class="modal-body">

          <div class="box-body">

  <!--=====================================
  =         Aqui agregamos los contenidos de la venta emergente       =
  ======================================-->
            
  <!--=====================================
  =         Para agregar un nombre       =
  ======================================--> 
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" required>

              </div>

            </div>

           </div>

        </div>

  <!--=====================================
  =     Para guardar los datos se utiliza el submit    =
  ======================================-->
        <div class="modal-footer">

          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Guardar Categoria</button>

        </div>

        <?php

        $crearCategoria = new ControladorCategorias ();
        $crearCategoria ->  ctrCrearCategoria();


        ?>



      </form>


    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                 <input type="hidden"  name="idCategoria" id="idCategoria" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

<?php

  $editarCategoria = new ControladorCategorias();
  $editarCategoria -> ctrEditarCategoria();

?>

      </form>

    </div>

  </div>

</div>


<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();
?>

