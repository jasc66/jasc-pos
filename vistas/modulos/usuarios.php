<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Administrar usuarios

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>

    </ol>
  </section>


  <!-- aqui encontramos el contenido -->

  <section class="content">

    <!-- Default box -->

    <div class="box">

      <div class="box-header with-border">

       <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
         
         Agregar Usuario

       </button>

      </div>

<!-- aqui vamos a incluir el cuerpo y la tabla -->

      <div class="box-body">

<!-- clases exclusivas de bootstrap para tablas  -->


       <table class="table table-bordered table-striped dt-responsive tablas" width="100%" >
<!-- se incluye el width 100% para que no tengo problemas en internet explorer  -->

        <thead>
          
          <tr>
            
            <th style="width: 10px">#</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Foto</th>
            <th>Perfil</th>
            <th>Estado</th>
            <th>Ultima Conexion</th>
            <th>Acciones</th>

          </tr>


        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

       foreach ($usuarios as $key => $value){

        // <td>'.($key+1).'</td> se usa para colocar la numeracion de la tabla
        
         
          echo ' <tr>
                  <td>'.($key+1).'</td> 
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }

                  echo '<td>'.$value["perfil"].'</td>';

                  if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }             

                  echo '<td>'.$value["ultimo_login"].'</td>
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

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
=     Modal Para agregar un Usuario       =
======================================-->


<!-- Se utiliza el mismo modal de la linea 30 -->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- aqui se puede modificar la ventana emergente-->

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

  <!--=====================================
  =    CABEZA DEL MODAL       =
  ======================================-->
        

        <div class="modal-header" style="background: #00c0ef; color:white" align="center">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Usuarios</h4>

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
                
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

              </div>

            </div>

  <!--=====================================
  =         Para agregar un Usuario       =
  ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" id="nuevoUsuario" required>

              </div>

            </div>
  <!--=====================================
  =         Para agregar Password      =
  ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Password" autocomplete="nuevoPassword" required>

              </div>

            </div>

  <!--=====================================
  =     Para seleccionar un perfil      =
  ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <select class="form-control input-lg" name="nuevoPerfil">
                  
                  <option value="">Seleccionar Perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>
                </select>

              </div>

            </div>
  <!--=====================================
  =     Para subir una foto de usuario    =
  ======================================-->

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2 MB</p>
              
              <img src="vistas/img/usuarios/default/Anonymous.png" class="img-thumbnail previsualizar" width="100px">
              

            </div>



          </div>

        </div>

  <!--=====================================
  =     Para guardar los datos se utiliza el submit    =
  ======================================-->
        <div class="modal-footer">

          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Guardar Usuario</button>

        </div>


        <?php 

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

         ?>

      </form>


    </div>

  </div>

</div>


<!--=====================================
=     Modal Para editar un Usuario       =
======================================-->


<!-- Se utiliza el mismo modal de la linea 30 -->

<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- aqui se puede modificar la ventana emergente-->

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

  <!--=====================================
  =    CABEZA DEL MODAL       =
  ======================================-->
        

        <div class="modal-header" style="background: #00c0ef; color:white" align="center">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Usuarios</h4>

        </div>
  <!--=====================================
  =         Cuerpo del modal       =
  ======================================-->
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
                
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

  <!--=====================================
  =         Para agregar un Usuario       =
  ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>
  <!--=====================================
  =         Para agregar Password      =
  ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña" autocomplete="editarPassword">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

  <!--=====================================
  =     Para seleccionar un perfil      =
  ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <select class="form-control input-lg" name="editarPerfil">
                  
                  <option value="" id="editarPerfil"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>
                </select>

              </div>

            </div>
  <!--=====================================
  =     Para subir una foto de usuario    =
  ======================================-->

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2 MB</p>
              
              <img src="vistas/img/usuarios/default/Anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">
              

            </div>



          </div>

        </div>

  <!--=====================================
  =     Para guardar los datos se utiliza el submit    =
  ======================================-->
        <div class="modal-footer">

          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Modificar Usuario</button>

        </div>


      <?php 

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

         ?> 

      </form>


    </div>

  </div>

</div>

<?php 
  
  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

 ?>

