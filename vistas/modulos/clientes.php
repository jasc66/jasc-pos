<div class="content-wrapper">

<section class="content-header">
    
    <h1>
      
      Administrar Funcionario
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Funcionario</li>
    
    </ol>


  
 
<script>
//            console.log('pages/new.html?lat='+ lat +'&lon='+lon');
            $(document).ready(function () {
                getData(
                    "https://ubicaciones.paginasweb.cr/provincias.json", 
                    function (data){
                        $("#provincias").html(arrayToOptions(data));
                    }
                );
            });
            var map;
            var geocoder;
            var crLat = 9.6301892;
            var crLng = -84.2541843;
            function initMap() {
                geocoder = new google.maps.Geocoder();
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: crLat, lng: crLng},
                    zoom: 7,
                    mapTypeId: google.maps.MapTypeId.HYBRID
                });
                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: {lat: crLat, lng: crLng}
                });
                google.maps.event.addListener(marker, 'dragend', function () {
                    onMakerMove(marker);
                });
            }
            function codeAddress(address) {
                geocoder.geocode( { 'address': address}, function(results, status) {

                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        marker.setPosition(results[0].geometry.location);
                        onMakerMove(marker);
                    } else {
                        console.debug('No pudimos obtener la dirección porque: ' + status);
                    }
                });
            }
            function onMakerMove(marker) {
                $("#coordenadas").val(marker.getPosition().toString().replace('(', '').replace(')', ''));
            }
            function getCantones(idProvincia){
                map.setZoom(9);
                codeAddress("Costa Rica, "+$('#provincias option:selected').text());
                getData(
                    "https://ubicaciones.paginasweb.cr/provincia/"+idProvincia+"/cantones.json", 
                    function (data){
                      console.log(data)
                        $("#cantones").html(arrayToOptions(data));
                        $(".canton").show();
                        $(".distrito").hide();
                        $(".send").hide();
                    }
                );
            }
            function getDistritos(idCanton){
                var query = "Costa Rica, "+$('#provincias option:selected').text()+', '+$('#cantones option:selected').text();
                console.log(query);
                map.setZoom(12);
                codeAddress(query);
                var idProvincia = $("#provincias").val();
                getData(
                    "https://ubicaciones.paginasweb.cr/provincia/"+idProvincia+"/canton/"+idCanton+"/distritos.json", 
                    function (data){
                        $("#distritos").html(arrayToOptions(data));
                        $(".distrito").show();
                        $(".send").hide();
                    }
                );
            }
            function distritoSelected() {
                var query = "Costa Rica, "+jQuery('#provincias option:selected').text()+","+jQuery('#cantones option:selected').text()+","+jQuery('#distritos option:selected').text();
                map.setZoom(15);
                codeAddress(query);
                $('.send').show()
            }
            function arrayToOptions(array) {
                var html = "<option>Seleccione una opción</option>";
                for(key in array) {
                    html += "<option value='"+key+"'>"+array[key]+"</option>";
                }
                return html;
            }
            function getData(url, callback) {
                $.ajax({
                    dataType: "json",
                    url: url,
                    success: function (data) {
                        callback(data);
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }
            function sendData() {
                var data = $("#ubicationForm").serialize();
                alert(data);
                // send data to server via ajax
                return false;
            }
        </script>
<style>
            .form-row{
                padding: 1em;
                font-size: 1.2em
            }
            .canton, .distrito, .send{
                display: none;
            }
            .form-desc, .data-container, .map-container{
                display: inline;
                float: center;
                min-width: 110px;
            }
            .form-val{
                display: inline;
                float: left;
            }
            .form-val select {
                font-size: 1rem;
                min-width: 120px;
            }
            .send input{
                padding: 0.5em 1em;
                font-size: 0.75em;
                margin: 0.6em 0.5em;
                border: none;
                background-color: #198C11;
                color: white;
            }
            .map-container{
                width: 50%;
                margin: 1em;
            }
            #map{
                min-width: 200px; 
                width: 100%;
                height: 400px;
            }
            input#coordenadas {
                margin: 1px;
                font-size: 1rem;
            }
</style>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-9752069833756569",
          enable_page_level_ads: true
     });
</script>




  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar Funcionario

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
            <th class="fontsize">Agencia</th>
            <th class="fontsize">Cantidad de Pedidos</th>
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

          <h4 class="modal-title">Agregar Funcionario</h4>

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

                <input type="text" class="form-control input-lg" name="nuevoTelefono" autocomplete='nuevoTelefono' placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 9999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" autocomplete='nuevoEmail'  placeholder="Ingresar email" required>

              </div>

            </div>



            <!-- ENTRADA PARA LA PROVINCIA -->
            


            <div class="form-group">

            
              <div class="input-group" id="ubicationForm" onsubmit="return sendData();">
                
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <select class="form-control input-lg" id="provincias" name="nuevaProvincia" autocomplete='nuevaProvincia' onchange="getCantones(this.value);">

                 
                  
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

                <select type="text" class="form-control input-lg" id="cantones" name="nuevoCanton" autocomplete='nuevoCanton' onchange="getDistritos(this.value);">
                </select>

              </div>

            </div>

<!-- ENTRADA PARA LA DISTRITO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map"></i></span> 

                <select type="text" class="form-control input-lg" id="distritos" name="nuevoDistrito" autocomplete='nuevoDistrito' onchange="distritoSelected();">
                </select>

              </div>

            </div>



            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <select class="form-control input-lg" name="nuevaDireccion">
                  
                  <option value="">Seleccionar Agencia Extensión</option>
                  <option value="Dirección Regional"> Dirección Regional</option>
                  <option value="San Isidro">San Isidro</option>
                  <option value="Pejibaye">Pejibaye</option>
                  <option value="Buenos Aires">Buenos Aires</option>
                  <option value="PotreroGrande">Potrero Grande</option>
                  <option value="SanVito">San Vito</option>
                  <option value="Corredores">Corredores</option>
                  <option value="Laurel">Laurel</option>
                  <option value="Piedras Blancas">Piedras Blancas</option>
                  <option value="Puerto Jiménez ">Puerto Jiménez </option>
                  <option value="Cortez">Cortez</option>

                </select>

              </div>

            </div>





<div class="map-container" align="center">
<div id="map"></div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3cOQNB4cQjQDSGWiB_nT2H2pEOuD3w60&callback=initMap" async defer></script>


            <div class="form-group">
              
              <div class="input-group">



              </div>

            </div>
  
          </div>

        </div>




        <!--=====================================
        PIE DEL MODAL
        ======================================-->
       
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Funcionario</button>

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

          <h4 class="modal-title">Editar Funcionario</h4>

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

                <select class="form-control input-lg" name="editarDireccion">
                  <option value="" id="editarDireccion"></option>
                  <option value="">Seleccionar Agencia Extensión</option>
                  <option value="Dirección Regional"> Dirección Regional</option>
                  <option value="San Isidro">San Isidro</option>
                  <option value="Pejibaye">Pejibaye</option>
                  <option value="Buenos Aires">Buenos Aires</option>
                  <option value="PotreroGrande">Potrero Grande</option>
                  <option value="SanVito">San Vito</option>
                  <option value="Corredores">Corredores</option>
                  <option value="Laurel">Laurel</option>
                  <option value="Piedras Blancas">Piedras Blancas</option>
                  <option value="Puerto Jiménez ">Puerto Jiménez </option>
                  <option value="Cortez">Cortez</option>

                </select>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Funcionario</button>

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


