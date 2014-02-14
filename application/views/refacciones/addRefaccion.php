
<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-8">
		<div class="panel panel-primary">
		  <div class="panel-heading">Alta de Refacciones</div>
		  <div class="panel-body">
			<form role="form" action="" method="post">
				<div class="form-group">
					<label class="nombreAcc">Nombre</label>
					<input type="text" name="nombreAcc" id="nombreAcc" class="form-control">
				</div>
				<div class="form-group">
					<label class="marca">Marca</label>
					<input type="text" name="marca" id="marca" class="form-control">
				</div>			
				<div class="form-group">
					<label class="precio">Precio</label>
					<input type="text" name="precio" id="precio" class="form-control">
				</div>

				<div class="form-group">
					<label class="cant">Cantidad</label>
					<input type="number" name="cant" id="cant" min="1" class="form-control">
				</div>

				<div class="form-group">
					<label class="descripcion">Descripcion</label>
					<input type="text" name="descripcion" id="descripcion" class="form-control">
				</div>
				<button type="submit" class="btn btn-info">Guardar</button><?=validation_errors()?>
			</form>
		   </div>	
		 </div>
		</div>
	</div>
</div>