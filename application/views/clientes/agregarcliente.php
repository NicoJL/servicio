
<div class="row">
	<form rule="form" action="addCliente" method="post">
	<div class="col-md-6 col-md-offset-2 col-sm-8">
		<div class="panel panel-primary">
 			 <div class="panel-heading"><B>CLIENTES<B></div>
  			<div class="panel-body">	
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input class="form-control" type="text" name="nombre" id="nombre" placeholder=""/>
			</div>
			<div class="form-group">
				<label for="correo">Correo</label>
				<input class="form-control" type="text" name="correo" id="correo"/>
			</div>
			<div class="form-group">
				<label for="telefono">Telefono</label>
				<input class="form-control" type="text" name="telefono" id="telefono"/>
			</div>
			<div class="form-group">
				<label for="celular">Nom. Celular</label>
				<input class="form-control" type="text" name="celular" id="celular"/>
			</div>
			<div class="form-group">
				<label for="direccion">Dirección</label>
				<input class="form-control" type="text" name="direccion" id="direccion"/>
			</div>
			<div class="form-group">
				<label for="fecha">Fecha</label>
				<input class="form-control" type="text" name="fecha" id="fecha"/>
			</div>
			<div class="form-group">
				<label for="">Estado</label>
				<input class="form-control" type="text" name="estado" id="estado"/>
			</div>
			<button class="btn btn-primary">Guardar</button><?=validation_errors()?>
		</form>
	</DIV>
</DIV>
	</div><!--col-md-12-->
</div>
