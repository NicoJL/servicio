<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			Servicio
			<table id="tabla_detservicio" class="table table-bordered table-hover table-condensed">
				<thead>
					<th>Folio</th>
					<th>Num. Servicio</th>
					<th>Tipo</th>
					<th>Estado</th>
					<th>Tecnico</th>
					<th>Falla</th>
				</thead>
				<tbody>
					<?php foreach ($query->result() as $row) {?>
					<tr>
						<td><?=$row->folio?></td>
						<td><?=$row->idServ?></td>
						<td><?=$row->tipo?></td>
						<td><?=$row->estado?></td>
						<td><?=$row->tecnico?></td>
						<td><?=$row->falla?></td><?php }?>
					</tr>
				</tbody>
			</table>
		</div><!--responsive tabla detservicio-->
		<div class="table-responsive">
			Equipo
			<table class="table table-hover table-bordered table-condensed" id="tablaEquipo">
				<thead>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Nom. Serie</th>
					<th>Descripción</th>
					<th>Color</th>
				</thead>
				<tbody>
					<?php foreach($query->result() as $row){?>
					<tr>
						<td><?=$row->nomEquipo?></td>
						<td><?=$row->marca?></td>
						<td><?=$row->modelo?></td>
						<td><?=$row->numSerie?></td>
						<td><?=$row->descripcion?></td>
						<td><?=$row->color?></td>
					</tr><?php }?>
				</tbody>
			</table>
		</div><!--responsive tabla detservicio-->
		<div class="table-responsive">
			Cliente
			<table class="table table-hover table-bordered table-condensed" id="tablaCliente">
				<thead>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Estado</th>
					<th>Celular</th>
					<th>Correo</th>
				</thead>
				<tbody>
					<?php foreach($query->result() as $row){?>
					<tr>
						<td><?=$row->nombre?></td>
						<td><?=$row->direccion?></td>
						<td><?=$row->estado?></td>
						<td><?=$row->celular?></td>
						<td><?=$row->correo?></td>
					</tr><?php }?>	
				</tbody>
			</table>
		</div>
	</div>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-3">
		<form action="<?=base_url()?>refacciones/vender" method="post">
			<input type="hidden" name="servicio" value="<?=$cont?>">
			<?php foreach($query->result() as $row){?>
			<input type="hidden" name="idServ" id="idServ" value="<?=$row->idServ?>">
			<?php $id=$row->idServ;}?>Agregar Refacción
			<button class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-wrench"></span></button>
		</form></div>
		<div class="col-md-3">
		<form action="<?=base_url()?>refacciones/destruir" method="post">
				Deshacer<input type="hidden" name="uri" value="<?=$cont?>">
			<button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
		</form></div>
		<div class="col-md-3">
		<form action="<?=base_url()?>refacciones/terminar" method="post">
				Terminar<input type="hidden" name="uri" value="<?=$cont?>">
			<button class="btn btn-xs btn-danger">x</button>
		</form></div>
		<div class="col-md-8">
		<div class="table-responsive">
			<table class="table table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
					<th>Modificar</th>
				</thead>
				<tbody><form action="<?=base_url()?>refacciones/actualizar" method="post"?>
					<?php $i=1; 
					foreach($this->cart->contents() as $items){ if($items['idServ']==$id){?>
					<tr>
						<input type="hidden" name="<?=$i?>[rowid]" value="<?=$items['rowid']?>">
						<td><?=$items['name']?></td>
						<td><?php echo $this->cart->format_number($items['price']);?></td>
						<td><input class="form-control"name="<?=$i?>[qty]" value="<?=$items['qty']?>"></td>
						<td><?php echo $this->cart->format_number($items['subtotal']);?>
							<input type="hidden" name="uri" value="<?=$cont?>"></td>
						<td><button class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span></button></td>
					<tr>
						<?php $i++;}else break;}?></form>
						<tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
	<div class="row">
		<div class="col-md-12">
		<form class="form-horizontal" role="form" action="" method="post">
			<div class="col-md-4">
				<div class="form-group">
					<label for="estado" class="col-md-3 control-label">Estado</label>
					<div class="col-md-9">
						<select id="estado" name="estado" class="form-control">
							<option class="pendiente">Pendiente</option>
							<option value="Entregado">Entregado</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="tecnico" class="col-md-3 control-label">Tecnico</label>
					<div class="col-md-9">
						<input class="form-control" name="tecnico" id="tecnico" type="text"/>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="subtotal" class="col-md-3 control-label">Total</label>
					<div class="col-md-9">
						<input class="form-control" name="subtotal" id="subtotal" type="text"/>
					</div>
				</div>
			</div>
		</div>
	</div>	
	
			<div class="row">
				<div class="col-md-4">
				<div class="form-group">
					<button class="btn btn-primary">Salida</button>
				</div>
			</div>
			</div>
		</form>
	<center><?=$paginacion?></center>
</div><!--row principal-->