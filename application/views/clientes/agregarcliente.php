
<div class="row">
	<form class="form-horizontal" rule="form" action="addCliente" method="post">
	<div class="col-md-12 col-sm-12">
		<div class="paneles panel panel-primary">
 			 <div class="panel-heading"><B>CLIENTES<B></div>
  			<div class="panel-body">	
  				<div class="row">
                    <div class="col-md-6">
						<div class="form-group">
							<label for="nombre" class="control-label col-md-3">Nombre</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="nombre" id="nombre" placeholder=""/>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="correo" class="control-label col-md-3">Correo</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="correo" id="correo"/>
							</div>
						</div>
					</div>
				</div> <!--row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="telefono" class="control-label col-md-3">Telefono</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="telefono" id="telefono"/>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="celular"  class="control-label col-md-3">Celular</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="celular" id="celular"/>
							</div>
						</div>
					</div>
				</div><!--row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="direccion" class="control-label col-md-3">Dirección</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="direccion" id="direccion"/>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="fecha" class="control-label col-md-3">Fecha</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="fecha" id="fecha" value=<?php echo date("Y-m-d");?> />
							</div>
						</div>
					</div>
				</div><!--row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="estado" class="control-label col-md-3">Estado</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="estado" id="estado"/>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<button class="btn btn-primary">Guardar</button>
					</div>
				</div><!--row-->
				<div class="row">
					<div class="col-md-12">
						<?=validation_errors()?>
					</div>
				</div>
			</form>
	</DIV>
</DIV>
	</div><!--col-md-12-->
</div>
