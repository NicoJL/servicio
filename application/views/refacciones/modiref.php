<div class="row">
	<div class="col-md-6 col-md-offset-2">
		<div class="panel panel-primary">
  <div class="panel-heading"><B>MODIFICAR REFACCIÓN</B></div>
  <div class="panel-body">
		<form role="form" action="<?=base_url()?>refacciones/modiRef" method="post">
			<?php if($query->num_rows()>0) foreach($query->result() as $row){?>
			<div class="form-groug">
				<label for="nombreAcc">Nombre</label>
				<input type="text" class="form-control" name="nombreAcc" id="nombreAcc" value="<?=$row->nombreAcc?>">
			</div>
			<div class="form-groug">
				<label for="marca">Marca</label>
				<input type="text" class="form-control" name="marca" id="marca" value="<?=$row->marca?>">
			</div>
			<div class="form-groug">
				<label for="precio">Precio</label>
				<input type="text" class="form-control" name="precio" id="precio" value="<?=$row->precio?>">
			</div>
			<div class="form-groug">
				<label for="descripcion">Descripción</label>
				<input type="text" class="form-control" name="descripcion" id="descripcion" value="<?=$row->descripcion?>">
			</div>
			<div class="form-groug">
				<label for="cant">Cantidad</label>
				<input type="number" class="form-control" name="cant" id="cant" value="<?=$row->cant?>">
			</div>
			<input type="hidden" name="idsuc" value="<?=$row->idsuc?>">
			<input type="hidden" name="idref" value="<?=$row->idref?>">
			<button class="btn btn-primary">Modificar</button><?=validation_errors()?>
			<?php };?>
		</form>
	</div>
</div><!--paneles-->
	</div>
</div>