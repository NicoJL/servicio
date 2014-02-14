<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="table-responsive">
			<table id="tablasuc" class="table table-bordered">
				<thead>
					<tr>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Editar</th>
					<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query->result() as $row) 
					{
					?>
					
					<tr>
						<form class="frm" method="post" action="<?=base_url()?>sucursal/eliminar_suc" >
							<td><?=$row->nombre?></td>
							<td><?=$row->domicilio?><input type="hidden" class="idsuc"  name="idsuc" value="<?=$row->idsuc?>"></td>
							<td><button type="button" name="editar" value="<?=$row->idsuc?>" class="btn btn-info btn-xs btn-edi"  ><span class="glyphicon glyphicon-pencil"></span></button></td>
							<td><button class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash "></span></button></td>
						</form>
					</tr>
					<?php }?>
				</tbody>

			</table>
		</div>
	</div>
</div>
<div class="row" id="modi_suc">

<div class="col-md-12">
	<form name="frm_modi_suc" id="frm_modi_suc" role="form" method="" action="<?=base_url()?>sucursal/ajaxSucursal">
		<div id="spin1"></div>
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input class="form-control" type="text" name="nombre" id="nombre">
		</div>
		<div class="form-group">
			<label for="domicilio">Domicilio</label>
			<input class="form-control" type="text" name="domicilio" id="domicilio">
		</div>
		<div class="form-group">
			<label for="localidad">Localidad</label>
			<input class="form-control" type="text" name="localidad" id="localidad">
		</div>
		<div class="form-group">
			<label for="edo">Estado</label>
			<input class="form-control" name="edo" id="edo" type="text"/>
		</div>
		<div class="form-group">
			<label for="telefono">Telefono</label>
			<input class="form-control" type="text" name="telefono" id="telefono">
			<input type="hidden" name="idsuc" id="frmidsuc" value="">
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