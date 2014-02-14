<!DOCTYPE html>
<html lang="es">


<head>	
  <meta contentType="application/json"charset=utf-8>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
	<title><?=$title?></title>

<script src="<?=base_url()?>js/JQuery.js" type="text/javaScript"></script> 
	<link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
	
  <link href="<?=base_url()?>css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css">
   <link href="<?=base_url()?>css/select2.css" rel="stylesheet" type="text/css">
  <link href="<?=base_url()?>css/styles.less" rel="stylesheet/less" type="text/css">
  <link href="<?=base_url()?>css/dataTables.css" rel="stylesheet/less" type="text/css">
  
	<script src="<?=base_url()?>js/bootstrap.js"></script>
  <script src="<?=base_url()?>js/spin.js"></script>
    <script src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>js/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="<?=base_url()?>js/less.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/select2.js"></script>
   <script src="<?=base_url()?>js/<?=$ruta?>" type="text/javaScript"></script>
  <script src="<?=base_url()?>js/hola.js" type="text/javaScript"></script>
 
</head>
<body>

   <form name="frmInicial">
    <input type="hidden" name="dire" value="<?=base_url()?>/img/menupre.png">
    <input type="hidden" name="direN" value="<?=base_url()?>/img/menu.png">
   </form>
   
        <nav id="barraPrincipal" class="navbar navbar-default navbar-fixed-top " role="navigation" style="margin-bottom:0px;border-radius:0px; width:100%;">
        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><font color="white">ISCO</font></a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-left">       
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="#f4e8ff">Sucursales</font> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?=base_url()?>sucursal/addSuc">Agregar Sucursal</a></li>
                  <li><a href="<?=base_url()?>sucursal/mostrar">Mostrar Sucursales</a></li>
                 
                </ul>
              </li>
            </ul>

            <p class="navbar-text navbar-right"><a href="#" style="color:white" class="navbar-link">Cerrar Sesión</a>
          </div><!-- /.navbar-collapse -->
        </nav>
      <div class="container " id="contenedor-principal">
        <div class="row">
          <div class="col-md-2 col-xs-6" id="menu">
            <section id="logo">
            </section>
            <div id="item-empleado">
              <div class="item-logo">
              </div> <p class="texto">Empleados</p>
                <ul class="submenu">
                  <li><a href="<?=base_url()?>empleados/AddEmpleado">Agregar</a></li>
                  <li><a href="<?=base_url()?>empleados/MostrarE">Consulta</a></li>
                </ul>
             
            </div>
            <div id="item-cliente">
              <div class="item-logo">
              </div><p class="texto">Clientes</p>
              <ul class="submenu">
                  <li><a href="<?=base_url()?>clientes/addCliente">Agregar</a></li>
                  <li><a href="<?=base_url()?>clientes/mostrar">Consulta</a></li>
              </ul>
              
            </div>
            <div id="item-servicio">
              <div class="item-logo">
              </div>
              <ul class="submenu">
                  <li><a href="<?=base_url()?>serviciofolio/mostrarServicios">Consulta</a></li>
                  <li><a href="<?=base_url()?>serviciofolio/fechasCorte">Corte</a></li>
              </ul>
              <p class="texto">Servicios</p>
            </div>
            <div id="item-refaccion">
              <div class="item-logo">
              </div>   <p class="texto">Refacciones</p>
              <ul class="submenu">
                 <li><a href="<?=base_url()?>refacciones/addRef">Agregar</a></li>
                  <li><a href="<?=base_url()?>refacciones/consultaGeneral">Consulta</a></li>
              </ul>
           
            </div>
          </div><!--menu Lateral-->
          <div class="col-md-10 col-xs-12 col-lg-10 " id="contenedor-derecho">
         
        
        
        
    
