<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="empleados">
				<thead>
					<th>Nombre</th>
					<th>Domicilio</th>
					<th>Telefono</th>
					<th>Celular</th>
					<th>Tipo</th>
					<th>Sucursal</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>
					<input type="hidden" id="rutaE" value="<?=base_url()?>empleados/getEmpleadoAjax">
					<input type="hidden" id="rutaElimE" value="<?=base_url()?>empleados/eliminarEmpleados">
					
					<?php 
						if($query->num_rows()>0)
							foreach($query->result() as $row)
							{?>
							<tr>
								<form id="frmE" name="frmE" action="<?=base_url()?>empleados/eliminarEmpleados" method="post">
									<input type="hidden" id="idemple" name="idemple" value="<?=$row->idemp?>">	
									<td><?=$row->nombre?></td>
									<td><?=$row->domicilio?></td>
									<td><?=$row->telefono?></td>
									<td><?=$row->celular?></td>
									<td><?=$row->tipo?></td>
									<td><?=$row->nombresuc?></td>
									<td><button type="button" class="btn btn-info btn-xs btn-edi"><span class="glyphicon glyphicon-pencil"></span></botton>
									</td>
									<td><button type="button" class="btn btn-danger btn-xs btn-eli"><span class="glyphicon glyphicon-trash"></span></botton></td>
								</form>
							</tr>
							<?php } ?>
								
				</tbody>
			</table>
		</div>
	</div>

</div>

<div class="row" id="edi-emple">
	<div class="col-md-12">
		<form id="frmemple" name="frmemple" rule="form" action="<?=base_url()?>empleados/modificarEmpleadoAjax" method="post">
			<div class="form-group">
				<label for="nombre">Nombre: </label>
				<input type="text" class="form-control" name="nombre" id="nombre">
			</div>
			<div class="form-group">
				<label for="domicilio">Domicilio: </label>
				<input type="text" class="form-control" name="domicilio" id="domicilio">
			</div>
			<div class="form-group">
				<label for="telefono">Telefono: </label>
				<input type="text" class="form-control" name="telefono" id="telefono">
			</div>
			<div class="form-group">
				<label for="celular">Celular: </label>
				<input type="text" class="form-control" name="celular" id="celular">
			</div>
			<div class="form-group">
				<label for="tipo">Tipo: </label>
				<input type="text" class="form-control" name="tipo" id="tipo">
			</div>
			<div class="form-group">
				<input type="hidden" name="ide" id="ide" value="" >
				<!--<button type="button" class="btn btn-info" id="btnmodiE">Modificar</button>-->

			</div>
			
		</form>
	</div>
</div>
<div class="row confirmacion">
	<div class="col-md-12">
		<p>Realmente deseas eliminar este registro?</p>
	</div>
</div>