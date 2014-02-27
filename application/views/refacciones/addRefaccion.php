
<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-8">
		<div class="paneles panel panel-primary">
		  <div class="panel-heading">Alta de Refacciones</div>
		  <div class="panel-body">
			<form role="form" action="<?=base_url()?>refacciones/addRef" method="post">
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
					<input type="text" pattern="[-+]?(?:\b[0-9]+(?:\.[0-9]*)?|\.[0-9]+\b)(?:[eE][-+]?[0-9]+\b)?" name="precio" id="precio" class="form-control">
				</div>

				<div class="form-group">
					<label class="cant">Cantidad</label>
					<input type="number" name="cant" id="cant" min="1" class="form-control">
				</div>

				<div class="form-group">
					<label class="descripcion">Descripcion</label>
					<input type="text" name="descripcion" id="descripcion" class="form-control">
				</div>
				
				<div style="padding:10px;"><button type="submit" class="btn btn-info">Guardar</button></div><?=validation_errors()?>
				<div class="exito"><?=$message?></div>
			</form>
		   </div>	
		 </div>
		</div>
	</div>
</div>