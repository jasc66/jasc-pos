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
          
          <tr>

            <td>1</td>

            <td>603460713</td>

            <td>Física</td>

            <td>Alonso Salguero</td>

            <td>87109971</td>

            <td>jalonsc66@gmail.com</td>

            <td>San Jose</td>

            <td>Perez Zeledon</td>

            <td>Daniel Flores</td>

            <td>Las Brisas</td>

            <td>2500</td>

            <td>2018-06-15 16:32:13</td>

            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>

          
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

                <select class="form-control input-lg" name="nuevaTipoCedula">
                  
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

                <select class="form-control input-lg" name="nuevaProvincia">
                  
                  <option value="">Seleccionar Provincia</option>

                  <option value="San Jose">San José</option>

                  <option value="Puntarenas">Puntarenas</option>

                  <option value="Limon">Limón</option>

                  <option value="Guanacaste">Guanacaste</option>

                  <option value="Puntarenas">Puntarenas</option>

                  <option value="Cartago">Cartago</option>

                  <option value="Heredia">Heredia</option>

                </select>

              </div>

            </div>

<!-- ENTRADA PARA LA CANTON -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCanton" placeholder="Ingresar Canton" required>

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

    </div>

  </div>

</div>