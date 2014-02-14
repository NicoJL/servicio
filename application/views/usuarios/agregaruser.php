<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-8">
		<div class="panel panel-primary">
			<div class="panel-heading">Alta de usuarios</div>
				<div class="panel-body">
					<form rule="form" action="<?=base_url()?>usuarios/AddUser"  method="post" id="frmUsers" name="frmUsers">
						<div class="form-group">
							<label for="nombre">Nombre: </label>
							<input type="text" class="form-control" name="txtnombre" id="nombre" placeholder="Nombre" required>
						</div>

						<div class="form-group">
							<label for="apellidop">Apellido Paterno:</label>
							<input type="text" class="form-control" name="txtap" id="apellidop" placeholder="Apellido paterno" required>
						</div>
						<div class="form-group">
							<label for="apellidom">Apellido Materno:</label>
							<input type="text" class="form-control" name="txtam" id="apellidom" placeholder="Apellido materno" required>
						</div>
						<div class="form-group">							
								<label for="nickname">Usuario:</label>
								<input type="text" class="form-control" name="txtname" id="nickname" placeholder="Nombre de acceso" required>							
						</div>
						<div class="form-group">
							<small><a href="<?=base_url()?>usuarios/ValidaUser/1" id="lnkValidaU" style="color:green;"></a></small>
							<div id="divcomp"></div>
						</div>	
						<div class="form-group">
							<label for="email">E-mail:</label>
							<input type="email" class="form-control" name="txtemail" id="txtemail" placeholder="Correo eléctronico" required>
						</div>
						<div class="form-group">
							<small><a href="<?=base_url()?>usuarios/ValidaUser/2" id="lnkValidaC" style="color:green;"></a></small>
							<div id="divEmail"></div>
						</div>
						<div class="form-group">
							<label for="pass">Contraseña:</label>
							<input type="password" class="form-control" name="txtpass" id="pass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="El password debe tener minimo 8 caracteres una letra mayúscula y una minúscula como mínimo al menos un numero o carácter especial" placeholder="Contraseña" required>
						</div>
						
						<div class="form-group">
							<input type="submit" class="btn btn-info col-md-3" value="Registrar">
							<div id="divuser" class="col-md-12"></div>
						</div>
					</form><br><br><?php 
								echo validation_errors();
							?>	
				</div>
		</div>
	</div>
</div>
</div>
</body>
</html>