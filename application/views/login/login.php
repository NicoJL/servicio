<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>..Ingreso al sistema..</title>
	<script src="<?=base_url()?>js/JQuery.js" type="text/javaScript"></script> 
	<link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css">	
    
    <link href="<?=base_url()?>css/styles.less" rel="stylesheet/less" type="text/css">
   
  	<link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet/less" type="text/css">
  	<link href="<?=base_url()?>css/jquery_notification.css" rel="stylesheet/less" type="text/css">
  	<script src="<?=base_url()?>js/bootstrap.js"></script>
  	
  	<script src="<?=base_url()?>js/jquery-ui-1.10.3.custom.min.js"></script>
  	<script src="<?=base_url()?>js/jquery_notification_v.1.js" type="text/javascript"></script>
  	<script src="<?=base_url()?>js/less.js" type="text/javascript"></script>
  	
  	
  	
 
</head>
<body>
<div class="container" id="divLogin">
	<div class="row">
			<div class="col-md-6 col-md-offset-4 col-sm-9 col-sm-offset-3 col-xs-12 col-lg-12" style="margin-top:10%;" id="contenedor">
				<form action="<?=base_url()?>login/Login" method="post" class="form-horizontal " id="frmIngreso" role="form">
					<div style="font-size:1.5em;">Ingreso al sistema</div><br>
					<div class="form-group">
						 <div class="col-md-10 col-md-offset-1">
						   <input type="text" class="form-control" id="txtUser" name="txtUser" placeholder="nombre de usuario" pattern=".{3,}" required title="el campo debe tener 3 caracteres minimo" autofocus>
						 </div>
					</div>
					<div class="form-group">
						<div class="col-md-10  col-md-offset-1">
							<input type="password"  class="form-control" id="txtPass" name="txtPass" pattern=".{8,}" required title="el campo debe tener 8 caracteres minimo" placeholder="Contraseña" required>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1" >
							<select id="lstSuc" name="lstSuc" class="form-control">
								<option value="30">Sucursal</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<button class="btn btn-default col-md-5 col-md-offset-1" id="btnLogin" type="submit"><i class="fa fa-sign-in fa-lg"></i> Ingresar</button>
						<div class="col-md-1" id="divAvisoIngreso"></div>
					</div>
					
				</form>
			</div>
	</div>
</div>	
<script src="<?=base_url()?>js/ings.js" type="text/javascript"></script>
</body>
</html>