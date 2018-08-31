<header class="main-header">

<!-- Logotipo  -->

<a href="inicio" class="logo">

<!-- logo mini -->

<span class="logo-mini">

<img src="vistas/img/plantilla/logo_mag_on.jpg" class="img-responsive" style="padding:10px">

</span>



<!-- logo normal -->

<span class="logo-lg">

<img src="vistas/img/plantilla/images.jpg" class="img-responsive" style="padding:10px 10px">

</span>

</a>

<!-- barra de navegacion -->

<nav class="navbar navbar-static-top" role="navigation">

    <!-- boton de navegacion -->

    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        
        <span class="icon-bar">Toggle navigation</span>

      </a>


<!-- perfil de usuario -->

<div class="navbar-custom-menu">

<ul class="nav navbar-nav">

    <li class="dropdown user user-menu">

         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php 

            if ($_SESSION["foto"] != "") {

                echo '<img src="'.$_SESSION["foto"].'" class="user-image">';    

            } else{

                echo '<img src="vistas/img/usuarios/default/Anonymous.png" class="user-image">';

            }

             ?>
          

           <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>

         </a>

         <!-- dropdown toggle -->

         <ul class="dropdown-menu">

             <li class="user-body">

                 <div class="pull-rigth">

                     <a href="salir" class="btn btn-default btn-flat">Salir</a>

                 </div>


             </li>

         </ul>
    </li>


</ul>


</div>


</nav>

</header>
