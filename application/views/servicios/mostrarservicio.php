<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<form rule="form">
				<input type="hidden" name="rutaEliFolio" id="rutaEliFolio" value="<?=base_url()?>serviciofolio/eliFolioAjax">
			</form>
			<table id="tablaServicio" class="table table-bordered table-hover table table-condensed">
				<thead>
					<TH>Nombre</TH>
					<th>Direccion</th>
					<th>Folio</th>
					<th>Fecha</th>
					<th>Estado</th>
					<th>Total</th>
					<th>Ver</th>
					<th>Eliminar</th>
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
								<input type="hidden" name="pag" value="<?=$cont?>">
								<button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-check"></span></button>
							</form>
						</td>
						<td><form action="" method=""><input type="hidden" name="folio" value="<?=$row->folio?>"><button type="button" class="btn btn-danger btn-xs btnEliFolio" ><span class="glyphicon glyphicon-remove"></span></button></form></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		<center><?=$paginacion?></center>
	</div>
</div>
<div id="modalServ" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><font color="red">Confirmación</font></h4>
      </div>
      <div class="modal-body">
        <p id="mnsConfir">Realmente desea borrar este servicio?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnAceptar" class="btn btn-primary">Aceptar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->