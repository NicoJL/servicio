<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="table-responsive">
			<table id="tabla-clientes" class="table table-bordered table-hover">
				<thead>
					
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Celular</th>
						<th>Editar</th>
						<th>Eliminar</th>
						<th>Servicio</th>
		
				</thead>
				<tbody>
					<?php if($query->num_rows()>0)
					foreach($query->result() as $row)
					{?>
						<tr>
							<form action="" method="POST" >
								
								<td><?=$row->nombre?></td>
								<td><?=$row->direccion?></td>
								<td><?=$row->celular?></td>
								<td><button type="button" class="btn btn-info btn-xs btn-edi"><span class="glyphicon glyphicon-pencil"></span>
								</button></td>
								<td><input type="hidden" name="idCli" value="<?=$row->idCli?>"><button type="button" class="btnEliCli btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash "></span></button></td>
							</form>
							<td><form action="<?=base_url()?>clientes/addF" method="post">
									<input type="hidden" name="idCli" value="<?=$row->idCli?>">
									<input type="hidden" name="nombre" value="<?=$row->nombre?>">
									<button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-wrench"></span></button>
							 </form></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<center><?=$paginacion?></center>
	</div>
</div>
<div id="edi-cli" class="row">	
	<div class="col-md-12">
		<form id="frm-cli" rule="form" action="<?=base_url()?>clientes/modiCliAjax" method="post">		
			<div class="form-group input-group-sm">
				<label for="nombre">Nombre</label>
				<input  type="hidden" name="idCli" id="idCli" />
				<input class="form-control" type="text" name="nombre" id="nombre"/>
				<input type="hidden" name="ruta" id="ruta" value="<?=base_url()?>clientes/rellenarAjaxCli"/>
			</div>
			<div class="form-group input-group-sm">
				<label for="correo">Correo</label>
				<input class="form-control" type="text" name="correo" id="correo"/>
			</div>
			<div class="form-group input-group-sm">
				<label for="telefono">Telefono</label>
				<input class="form-control" type="text" name="telefono" id="telefono"/>
			</div>
			<div class="form-group input-group-sm">
				<label for="celular">Nom. Celular</label>
				<input class="form-control" type="text" name="celular" id="celular"/>
			</div>
			<div class="form-group input-group-sm">
				<label for="direccion">Dirección</label>
				<input class="form-control" type="text" name="direccion" id="direccion"/>

			</div>
			<div class="form-group input-group-sm">
				<label for="fecha">Fecha</label>
				<input class="form-control" type="text" name="fecha" id="fecha"/>
			</div>
			<div class="form-group input-group-sm">
				<label for="">Estado</label>
				<input class="form-control" type="text" name="estado" id="estado"/>
			</div>
			
		</form>
	</div>
</div>
<div class="col-md-12 cargador">
<div class=" progress  progress-striped active">
  <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
    <span class="sr-only">100%</span>
  </div>
</div>
</div>
<form rule="form">
	<input type="hidden" name="rutaEliCli" id="rutaEliCli" value="<?=base_url()?>clientes/eliminarCli">
</form>
<div id="modalCli" class="row">
	<p id="mnsCli"></p>
</div>