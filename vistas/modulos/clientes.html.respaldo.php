<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar clientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar clientes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar cliente

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
            <th class="fontsize">Identificación</th>
            <th class="fontsize">Tipo</th>
            <th class="fontsize">Nombre Completo</th>
            <th class="fontsize">Telefono</th>
            <th class="fontsize">Email</th>
            <th class="fontsize">Provincia</th>
            <th class="fontsize">Canton</th>
            <th class="fontsize">Distrito</th>
            <th class="fontsize">Otras Señas</th>
            <th class="fontsize">Última compra</th>
            <th class="fontsize">Ingreso al sistema</th>
            <th class="fontsize">Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
                 <?php

          $item = null;
          $valor = null;

          $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

          foreach ($clientes as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>                 

                    <td>'.$value["documento"].'</td>

                    <td>'.$value["tipo"].'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["telefono"].'</td>

                    <td>'.$value["email"].'</td>

                    <td>'.$value["provincia"].'</td>

                    <td>'.$value["canton"].'</td>

                    <td>'.$value["distrito"].'</td>                  

                    <td>'.$value["direccion"].'</td>      

                    <td>'.$value["compras"].'</td>

                    <td>'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevaCedula" placeholder="Ingresar Cedula" required>

              </div>

            </div>

<!--=====================================
  =     Para seleccionar Tipo ID      =
  ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="nuevoTipoCedula">
                  
                  <option value="">Seleccionar Tipo Identificación</option>

                  <option value="Fisica">Fisica</option>

                  <option value="Juridica">Juridica</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre completo" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

              </div>

            </div>



            <!-- ENTRADA PARA LA PROVINCIA -->
            
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <select class="form-control input-lg" id="nuevaProvincia" name="nuevaProvincia">
                  
                  <!-- <option value="">Seleccionar Provincia</option>
                  
                  <option value="San Jose">San José</option>
                  
                  <option value="Puntarenas">Puntarenas</option>
                  
                  <option value="Limon">Limón</option>
                  
                  <option value="Guanacaste">Guanacaste</option>
                  
                  <option value="Puntarenas">Puntarenas</option>
                  
                  <option value="Cartago">Cartago</option>
                  
                  <option value="Heredia">Heredia</option> -->

                </select>

              </div>

            </div>

<!-- ENTRADA PARA LA CANTON -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map"></i></span> 

                <input type="text" class="form-control input-lg" id="nuevoCanton" name="nuevoCanton" placeholder="Ingresar Canton" required>

              </div>

            </div>

<!-- ENTRADA PARA LA DISTRITO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoDistrito" placeholder="Ingresar Distrito" required>

              </div>

            </div>



            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>

  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php 

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="editarCedula" id="editarCedula" required>

              </div>

            </div>
<!--======================
  =     Para seleccionar Tipo ID      =
======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="editarTipoCedula">

                  <option value="" id="editarTipoCedula"></option>
                  
                  <option value="">Seleccionar Tipo Identificación</option>

                  <option value="Fisica">Fisica</option>

                  <option value="Juridica">Juridica</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
                <input type="hidden" id="idCliente" name="idCliente">
              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>

              </div>

            </div>



            <!-- ENTRADA PARA LA PROVINCIA -->
            
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <select class="form-control input-lg" id="editarProvincia" name="editarProvincia" onchange="canton()">

                  <!-- <option value="" id="editarProvincia"></option>
                  
                  <option value="">Editar Provincia</option>
                  
                  <option value="San Jose">San José</option>
                  
                  <option value="Puntarenas">Puntarenas</option>
                  
                  <option value="Limon">Limón</option>
                  
                  <option value="Guanacaste">Guanacaste</option>
                  
                  <option value="Puntarenas">Puntarenas</option>
                  
                  <option value="Cartago">Cartago</option>
                  
                  <option value="Heredia">Heredia</option> -->

                </select>

              </div>

            </div>

<!-- ENTRADA PARA LA CANTON -->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <select class="form-control input-lg" id="editarCanton" name="editarCanton" onchange="distrito()">
                  

                </select>

              </div>

            </div>

<!-- ENTRADA PARA LA DISTRITO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <select class="form-control input-lg" name="editarDistrito" id="editarDistrito">

                </select>
              </div>

            </div>



            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php 

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>

    </div>

  </div>

</div>

<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>