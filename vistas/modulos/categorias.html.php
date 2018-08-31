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

          <tr>

            <td>1</td>

            <td>Articulo</td>

            <td>
              <div class="btn-group">

                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                
              </div>

            </td>

          </tr>

                    <tr>

            <td>1</td>

            <td>Proveedor</td>

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

          <button type="submit" class="btn btn-primary">Guardar Usuario</button>

        </div>



      </form>


    </div>

  </div>

</div>


