<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>..Ingreso al sistema..</title>
	<script src="<?=base_url()?>js/JQuery.js" type="text/javaScript"></script> 
	<link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css">	
    <link href="<?=base_url()?>css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>css/select2.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>css/styles.less" rel="stylesheet/less" type="text/css">
    <link href="<?=base_url()?>css/dataTables.css" rel="stylesheet/less" type="text/css">
  	<link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet/less" type="text/css">
  	<link href="<?=base_url()?>css/jquery_notification.css" rel="stylesheet/less" type="text/css">
  	<script src="<?=base_url()?>js/bootstrap.js"></script>
  	<script src="<?=base_url()?>js/spin.js"></script>
  	<script src="<?=base_url()?>js/jquery.dataTables.min.js"></script>
  	<script src="<?=base_url()?>js/jquery-ui-1.10.3.custom.min.js"></script>
  	<script src="<?=base_url()?>js/jquery_notification_v.1.js" type="text/javascript"></script>
  	<script src="<?=base_url()?>js/less.js" type="text/javascript"></script>
  	
  	<script src="<?=base_url()?>js/select2.js"></script>
  	<script>
  		$(document).on('ready',function(){
  			showNotification({
                                    message: "Usuario o email incorrect",
                                    type: "error"
                                });
  		});
  	</script>
 
</head>
<body>
<div class="container">
	<div class="row">
			<div class="col-md-6 col-md-offset-4 col-sm-9 col-sm-offset-3 col-xs-12 col-lg-12" style="margin-top:10%;" id="contenedor">
				<form action="" class="form-horizontal " role="form">
					<div style="font-size:1.5em;color:blue;">Ingreso al sistema</div><br>
					<div class="form-group">
						 <div class="col-md-10 col-md-offset-1">
						   <input type="text" class="form-control" placeholder="nombre de usuario o e-mail" required autofocus>
						 </div>
					</div>
					<div class="form-group">
						<div class="col-md-10  col-md-offset-1">
							<input type="password" class="form-control" placeholder="Contraseña" required>
						</div>
					</div>	
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1" >
							<select name="" id="" class="form-control">
								<option value="Sucursal">Sucursal</option>
							</select>
						</div>
					</div>
					<label for="" class="checkbox">
						<input type="checkbox" value="Recordar">Recordar
					</label>
					<div class="form-group col-md-12">
						<button class="btn btn-primary col-md-5" type="submit"><i class="fa fa-sign-in fa-lg"></i> Ingresar</button>
						<div class="col-md-1"></div>
					</div>
					
				</form>
			</div>
	</div>
</div>	
 
</body>
</html>