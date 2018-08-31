<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Administrar proveedores

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar proveedores</li>

    </ol>
  </section>


  <!-- aqui encontramos el contenido -->

  <section class="content">

    <!-- Default box -->

    <div class="box">

      <div class="box-header with-border">

       <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">
         
         Agregar proveedores

       </button>

      </div>


<!-- aqui vamos a incluir el cuerpo y la tabla -->

      <div class="box-body">

<!-- clases exclusivas de bootstrap para tablas  -->
       <table class="table table-bordered table-striped dt-responsive tabla" >

        <thead>
          
          <tr>
            
            <th style="width: 10px">#</th>
            <th>Nombre Proveedor</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Fecha</th>
            <th>Acciones</th>

          </tr>


        </thead>

          <?php

          $item = null;
          $valor = null;

          $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

          foreach ($proveedores as $key => $value) {

            // <td>'.($key+1).'</td> se usa para colocar la numeracion de la tabla
            // class="text-uppercase // es una clase de boostrap para colocar el texto en masyuscula
           
            echo ' <tr>

                    <td>'.($key+1).'</td>                 

                    <td>'.$value["nombre_Proveedor"].'</td>

                    <td>'.$value["correo"].'</td>

                    <td>'.$value["telefono"].'</td>

                    <td>'.$value["direccion"].'</td>

                    <td>'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarProveedor" idProveedor="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarProveedor"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
          }

          ?>

          
        
  

       </table>

      </div>

 

    </div>

   

  </section>
  

</div>

<!--=====================================
=     Modal Para agregar proveedor       =
======================================-->


<!-- Se utiliza el mismo modal de la linea 30 -->

<div id="modalAgregarProveedor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- aqui se puede modificar la ventana emergente-->

    <div class="modal-content">

      <form role="form" method="post">

  <!--=====================================
  =    CABEZA DEL MODAL       =
  ======================================-->
        

        <div class="modal-header" style="background: #00c0ef; color:white" align="center">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar proveedor</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoProveedor" placeholder="Ingresar proveedor" required>

              </div>

            </div>



            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoCorreo" autocomplete='nuevoCorreo'  placeholder="Ingresar correo" required>

              </div>

            </div>
                        <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" autocomplete='nuevoTelefono' placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>

              </div>

            </div>



            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" autocomplete='nuevaDireccion' placeholder="Ingresar dirección" required>

              </div>

            </div>



           </div>

        </div>

  <!--=====================================
  =     Para guardar los datos se utiliza el submit    =
  ======================================-->
        <div class="modal-footer">

          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Guardar Proveedor</button>

        </div>

        <?php

        $crearProveedor = new ControladorProveedores();
        $crearProveedor ->  ctrCrearProveedor();


        ?>



      </form>


    </div>

  </div>

</div>

<!--=====================================
=     Modal Para agregar proveedor       =
======================================-->


<!-- Se utiliza el mismo modal de la linea 30 -->

<div id="modalEditarProveedor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- aqui se puede modificar la ventana emergente-->

    <div class="modal-content">

      <form role="form" method="post">

  <!--=====================================
  =    CABEZA DEL MODAL       =
  ======================================-->
        

        <div class="modal-header" style="background: #00c0ef; color:white" align="center">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar proveedor</h4>

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

                <input type="text" class="form-control input-lg" name="editarProveedor" placeholder="Editar proveedor" required>

              </div>

            </div>



                        <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editarCorreo" autocomplete='editarCorreo'  placeholder="Editar email" required>

              </div>

            </div>

                        <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefono" autocomplete='editarTelefono' placeholder="Editar teléfono" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>

              </div>

            </div>



            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" autocomplete='editarDireccion' placeholder="Editar dirección" required>

              </div>

            </div>



           </div>

        </div>

  <!--=====================================
  =     Para guardar los datos se utiliza el submit    =
  ======================================-->
        <div class="modal-footer">

          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Editar Proveedor</button>

        </div>

        <?php

        $editarProveedor = new ControladorProveedores();
        $editarProveedor ->  ctrCrearProveedor();


        ?>



      </form>


    </div>

  </div>

</div>
        <?php

        $eliminarProveedor = new ControladorProveedores();
        $eliminarProveedor ->  ctrCrearProveedor();


        ?>