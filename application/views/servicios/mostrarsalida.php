<div class="row">
	<div class="col-md-12">
		<div id="servicio" class="encabezado">Servicio</div>
			<div class="table-responsive">
				<table id="tabla_detservicio" class="table table-bordered table-hover table-condensed">
					<thead>
						<tr class="success">
							<th>Folio</th>
							<th>Tipo</th>
							<th>Tecnico</th>
							<th>Falla</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($query->result() as $row) {?>
						<tr class="active">
							<td><?=$row->folio?></td>
							<td><?=$row->tipo?></td>
							<td><?=$row->tecnico?></td>
							<td><?=$row->falla?></td><?php }?>
						</tr>
					</tbody>
				</table>
			</div><!--responsive tabla detservicio-->
		<div class="table-responsive">
			<div id="equipo" class="encabezado">Equipo</div>
			<table class="table table-hover table-bordered table-condensed" id="tablaEquipo">
				<thead>
					<tr class="success">
					<th>Nombre</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Nom. Serie</th>
					<th>Descripción</th>
					<th>Color</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach($query->result() as $row){?>
					<tr class="active">
						<td><?=$row->nomEquipo?></td>
						<td><?=$row->marca?></td>
						<td><?=$row->modelo?></td>
						<td><?=$row->numSerie?></td>
						<td><?=$row->descripcion?></td>
						<td><?=$row->color?></td>
						<?php $id=$row->idServ;?>
					</tr><?php $idEquipo=$row->idEq; 
								$idCli=$row->idCli;}?>
				</tbody>
			</table>
		</div><!--responsive tabla detservicio-->
		<div class="table-responsive">
			<div class="encabezado">Cliente</div>
			<table class="table table-hover table-bordered table-condensed" id="tablaCliente">
				<thead>
					<tr class="success">
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Estado</th>
					<th>Celular</th>
					<th>Correo</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($query->result() as $row){?>
					<tr class="active">
						<td><?=$row->nombre?></td>
						<td><?=$row->direccion?></td>
						<td><?=$row->estado?></td>
						<td><?=$row->celular?></td>
						<td><?=$row->correo?></td>
					</tr><?php $idC=$row->idCli;}?>	
				</tbody>
			</table>
		</div>
	</div>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-3">
			<div class="list-group">
  <a href="#" class="list-group-item active">
  Refacciones
  </a>
		<a href="#" class="list-group-item"><form action="<?=base_url()?>refacciones/vender" method="post">
			<!--input type="hidden" name="servicio" value="<?=$cont?>"-->
			<?php foreach($query->result() as $row){?>
			<input type="hidden" name="idServ" id="idServ" value="<?=$row->idServ?>">
			<?php $id=$row->idServ;}?>
			<button class="btn btn-xs btn-info">Agregar<span class="glyphicon glyphicon-wrench"></span></button>
		</form></a>
		<a href="#" class="list-group-item">
		<form action="<?=base_url()?>refacciones/destruir" method="post">
				<!--input type="hidden" name="uri" value="<?=$cont?>"-->
			<button class="btn btn-xs btn-danger">Deshacer<span class="glyphicon glyphicon-trash"></span></button>
		</form></a>
		<a href="" class="list-group-item">
		<form action="<?=base_url()?>refacciones/terminar" method="post">
				<!--input type="hidden" name="uri" value="<?=$cont?>"-->
			<button class="btn btn-xs btn-success">Terminar <span class="glyphicon glyphicon-ok"></span></button>
		</form></a></div></div>
		<div class="col-md-9">
			<div class="encabezado">Refacciones Utilizadas</div>
		<div class="table-responsive">
			<table class="table table-bordered table-condensed table-hover">
				<thead>
					<tr class="success">
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
					<th>Modificar</th>
					</tr>
				</thead>
				<tbody><form action="<?=base_url()?>refacciones/actualizar" method="post"?>
					<?php $i=1; 
					foreach($this->cart->contents() as $items){ if($items['idServ']==$id){?>
					<tr class="active">
						<input type="hidden" name="<?=$i?>[rowid]" value="<?=$items['rowid']?>">
						<td><?=$items['name']?></td>
						<td><?php echo $this->cart->format_number($items['price']);?></td>
						<td><input class="form-control"name="<?=$i?>[qty]" value="<?=$items['qty']?>"></td>
						<td><?php echo $this->cart->format_number($items['subtotal']);?>
							<!--input type="hidden" name="uri" value="<?=$cont?>"></td-->
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
<div class="well">
	<div class="row">
		<div class="col-md-12">
		<form class="form-horizontal" role="form" action="<?=base_url()?>serviciofolio/salida" method="post">
			<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="estado" class="col-md-3 control-label">Estado</label>
					<div class="col-md-9">
						<select id="estado1" name="estado" class="form-control">
							<option class="pendiente">Entegrado</option>
							<option value="Entregado">Pendiente</option>
							<option value="Entregado">Inconcluso</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="tecnico1" class="col-md-3 control-label">Tecnico</label>
					<div class="col-md-9">
						<input class="form-control" name="tecnico" id="tecnico" type="text"/>
					</div>
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="subtotal" class="col-md-3 control-label">Total</label>
					<div class="col-md-9">
						<input type="hidden" name="idServ" value="<?php if(isset($id) || !empty($id)) echo $id; else redirect('serviciofolio/mostrarServicios');?>"/>
						<input class="form-control" name="total" id="total" type="text"/>
					</div>
				</div>
			
			</div>
	
		
				<div class="col-md-5 col-md-offset-1">
				<div class="form-group">
					<button class="btn btn-primary">Salida</button>
				</div>
			</div>
		</div>
		</form></div></div></div>
	<!--center><?=$paginacion?></center-->
</div><!--row principal-->
<form id="frmService" name="frmService" action="" method="">
	<input type="hidden" name="rutaService" id="rutaService" value="<?=base_url()?>serviciofolio/getServicioAjax">
	<input type="hidden" name="rutaEquipo" id="rutaEquipo" value="<?=base_url()?>equipos/getEquipoAjax2">
	<input type="hidden" name="idS" id="idS" value="<?=$id?>">
</form>
<!-- Modal -->
<div id="modalEquipo" class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 id="tit_equipo" class="modal-title"></h4><div class="col-md-12" style="float:right"id="spEquipo"></div>
      </div>
      <div class="modal-body">
       <form rule="form" name="frmTeam" id="frmTeam" action="<?=base_url()?>equipos/modiEquipoAjax" method="post">
       		<div class="form-group">
    			<label for="nomEquipo1">Nombre del Equipo</label>
   				 <input type="text" class="form-control" id="nomEquipo1" name="nomEquipo" placeholder="Introuce el Nombre">
   				 <input type="hidden" name="idEquipo" id="idEquipo" value="<?=$idEquipo?>">
   				 <input type="hidden" name="servicio" id="eservicio" value="<?=$id?>">
   				 <input type="hidden" name="idCli" value="<?=$idC?>">
  			</div>
       		<div class="form-group">
    			<label for="marca1">Marca</label>
   				 <input type="text" class="form-control" id="marca1" name="marca" placeholder="Introuce la marca">
  			</div>
       		<div class="form-group">
    			<label for="modelo1">Modelo</label>
   				 <input type="text" class="form-control" id="modelo1" name="modelo" placeholder="Introuce el Modelo">
  			</div>
       		<div class="form-group">
    			<label for="numSerie">Número de Serie</label>
   				 <input type="text" class="form-control" id="numSerie1" name="numSerie" placeholder="Introuce el Nombre">
  			</div>

       		<div class="form-group">
    			<label for="descripcion1">Descripción</label>
   				 <textarea class="form-control" id="descripcion1" name="descripcion" rows="2"></textarea>
  			</div>
       		<div class="form-group">
    			<label for="color1">Color</label>
   				 <input type="text" class="form-control" id="color1" name="color" placeholder="Introuce el Color">
  			</div>
       </form>
      </div>
      <div class="modal-footer">
      		<div id="spEquipoInfe"></div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEq" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- modal para servicio-->
<div id="modalServicio" class=" modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 id="tit_servicio" class="modal-title"></h4><div class="col-md-12" style="float:right"id="spSalida"></div>
      </div>
      <div class="modal-body">
       	<form  id="frmServicio1" name="frmServicio1" role="form" action="<?=base_url()?>servicioFolio/modiServicioAjax" method="post">						
			<div class="form-group">
				<label for="tipo">Tipo</label>
					<select name="tipo" id="tipo" class="form-control">
						<option value="servicio">Servicio</option>
						<option value="garantia">Garantía</option>
						<option value="reingreso">Reingreso</option>
						<option value="diagnostico">Diagnostico</option>
					</select>
			</div>
			<div class="form-group">
				<label for="falla1" >Falla</label>
				<input type="hidden" name="idSrv" id="idSrv" >
				<textarea class="form-control" name="falla" id="falla" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label for="cables" >Cables</label>
				<input type="text" name="cables" id="cables" class="form-control">
			</div>
			<div class="form-group">
				<label for="discos" class=" control-label ">Discos</label>
				<input type="text" name="discos" id="discos" class="form-control">
			</div>
			<div class="form-group">
				<label for="accesorios" >Accesorios</label>
				<input type="text" name="accesorios" id="accesorios" class="form-control">
			</div>
			<div class="form-group">
				<label for="calcas" >Calcomonias</label>
				<input type="text" name="calcas" id="calcas" class="form-control">
			</div>
			<div class="form-group">
				<label for="golpes">Golpes</label>
				<input type="text" name="golpes" id="golpes" class="form-control">
			</div>
		</form>
      </div>
      <div class="modal-footer">
      	<div id="spServicioInfe"></div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id="btnSrv"class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->