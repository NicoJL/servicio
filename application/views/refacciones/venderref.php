<div class="row">
	<div class="col-md-12">
		<a href="<?=base_url()?>serviciofolio/mostrarsalida/<?=$uri?>">Ver carrito </a>
		<hr>
		<a href="<?=base_url()?>refacciones/terminar">Terminar</a>
		<table class="table table-bordered table-hover">
			<thead>
				<th>Nombre</th>
				<th>Marca</th>
				<th>Precio</th>
				<th>Descripcion</th>
				<th>Existencia</th>
				<th>Cantidad</th>
				<th>Agregar</th>
			</thead>
			<tbody><form action="" method=""><input type="hidden" name="ruta" id="ruta" value="<?=base_url()?>refacciones/agregarCarrito">
			</form>
				<?php foreach ($query->result() as $row)
				{?>
					<tr>
						<form role="form" action="<?=base_url()?>refacciones/agregarCarrito" method="post">
						<td><input type="hidden" name="nombreAcc" value="<?=$row->nombreAcc?>"><?=$row->nombreAcc?></td>
						<td><?=$row->marca?></td>
						<td><input type="hidden" name="precio" value="<?=$row->precio?>"><?=$row->precio?></td>
						<td><?=$row->descripcion?></td>
						<td><input type="number" class="form-control" name="existencia" id="existencia" value="<?=$row->cant?>" disabled></td>
						<td>
							<input type="hidden" name="idServ" value="<?=$idServ?>">
							<input type="hidden" name="idref" value="<?=$row->idref?>">
							<input type="number" class="form-control" name="cant" id="cant">
						</td>
						<td>
							<input type="hidden" name="idsuc" value="<?=$row->idsuc?>">
							
							<button type="button" class="btn btn-success btn-xs btn_vender"><span class="glyphicon glyphicon-plus"></span></button>
						</td>
						</form>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<center><?=$paginacion?></center>
</div>
