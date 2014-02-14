<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table id="tablaServicio" class="table table-bordered table-hover table table-condensed">
				<thead>
					<TH>Nombre</TH>
					<th>Direccion</th>
					<th>Folio</th>
					<th>Fecha</th>
					<th>Estado</th>
					<th>Total</th>
					<th>Ver</th>
				</thead>
				<tbody>
					<?php foreach ($query->result() as $row)
					 {?>
					<tr>
						<td><?=$row->nombre?></td>
						<td><?=$row->direccion?></td>
						<td><?=$row->folio?></td>
						<td><?=$row->fecha?></td>
						<td><?=$row->estadogeneral?></td>
						<td><?=$row->total?></td>
						<td>
							<form action="<?=base_url()?>serviciofolio/cargarVariable" method="post" role="form">
								<input type="hidden" name="folio" value="<?=$row->folio?>">
								<button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-check"></span></button>
							</form>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		<center><?=$paginacion?></center>
	</div>
</div>