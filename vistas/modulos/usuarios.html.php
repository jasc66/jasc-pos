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
       <table class="table table-bordered table-striped dt-responsive tablas" >

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

          <tr>

            <td>1</td>
            <td>Usuario Administradror</td>
            <td>Admin</td>
            <td><img src="vistas/img/usuarios/default/Anonymous.png" class="img-thumbnail" width="40px"></td>
            <td>Administrador</td>
            <td><button class="btn btn-success btn-xs">Activado</button></td>
            <td>2018-30-05 12:05:32</td>
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

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" required>

              </div>

            </div>
  <!--=====================================
  =         Para agregar Password      =
  ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Password" required>

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
              <input type="file" id="nuevaFoto" name="nuevaFoto">
              <p class="help-block">Peso máximo de la foto 200 MB</p>
              <img src="vistas/img/usuarios/default/Anonymous.png" clas="img-thumbnail" width="100px">
              

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



      </form>


    </div>

  </div>

</div>

