
<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-8">
		<div class="panel panel-primary">
		  <div class="panel-heading">Alta de Empleados</div>
		  <div class="panel-body">
			<form rule="form" action="<?=base_url()?>empleados/AddEmpleado" method="post">
				<div class="form-group">
					<label for="nombre">Nombre: </label>
					<input type="text" class="form-control" name="nombre" id="nombre" required>
				</div>
				<div class="form-group">
					<label for="domicilio">Domicilio: </label>
					<input type="text" class="form-control" name="domicilio" id="domicilio" required>
				</div>
				<div class="form-group">
					<label for="telefono">Telefono: </label>
					<input type="text" class="form-control" name="telefono" id="telefono" required>
				</div>
				<div class="form-group">
					<label for="celular">Celular: </label>
					<input type="text" class="form-control" name="celular" id="celular" required>
				</div>
				<div class="form-group">
					<label for="tipo">Tipo: </label>
					<input type="text" class="form-control" name="tipo" id="tipo">
				</div>
				<div class="form-group">
					<button class="btn btn-info">Registrar </button>
					<?php 

						echo $message; 
						echo $error;
						echo validation_errors();
					?>	

				</div>
			</form>
		</div>
		</div>			
	</div>
</div>
</body>
</html>