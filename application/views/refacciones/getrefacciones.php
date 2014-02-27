<div class="row">
	<div class="col-md-8 md-offset-3">
		<form role="form" class="form-horizontal" action="<?=base_url()?>refacciones/consultaGeneral" method="post">
			<div class="form-group">
    			<label for="idsuc" class="col-md-2 control-label">Sucursal</label>
    			<div class="col-sm-6">
      				<select name="idsuc" class="form-control">
      					<?php foreach($suc->result() as $row){?>
      					<option value="<?=$row->idsuc?>"><?=$row->nombre?></option>
      					<?php }?>
      				</select>
    			</div>
    			<div class="col-md-4"><button class="btn btn-primary">Buscar</button></div>
  			</div>	
  		</form>		
	</div>
</div><br>
<div class="row">
	<div class="col-md-12 col-sm-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="ref">
				<thead>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Precio</th>
					<th>Descripcion</th>
					<th>Cantidad</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</thead>
				<tbody>
					<?php foreach ($query->result() as $row)
					{?>
						<tr>
							<td><?=$row->nombreAcc?></td>
							<td><?=$row->marca?></td>
							<td><?=$row->precio?></td>
							<td><?=$row->descripcion?></td>
							<td><?=$row->cant?></td>
							<td>
								<form role="form" action="<?=base_url()?>refacciones/getRefaccion" method="post">
								<input type="hidden" name="idsuc" value="<?=$row->idsuc?>">
								<input type="hidden" name="idref" value="<?=$row->idref?>">
								<button  class="btn btn-info btn-xs btn-edi"><span class="glyphicon glyphicon-pencil"></span>
								</button>
								</form>
							</td>
							<td>
								<form role="form" action="" method="post">
								<input type="hidden" name="idref" value="<?=$row->idref?>">
								<input type="hidden" name="idsuc" value="<?=$row->idsuc?>">
								<button type="button" class="btnEliRef btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash "></span></button>
								</form>
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
			<center><?=$paginacion?></center>
	</div>
	</div>
</div>
<div id="confirRef" style="opacity:0" class="row">
	<p id="mnsRef"></p>
</div>
<form rule="form">
	<input type="hidden" name="rutaEliRef" id="rutaEliRef" value="<?=base_url()?>refacciones/eliminarRef">
</form>