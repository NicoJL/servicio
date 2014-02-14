<div id="panelFolio"class="row">
<div class="panel panel-primary">
  <div class="panel-heading">Folio</div>
  <div class="panel-body">
  	<form name="rutas" id="rutas">
  		<input type="hidden" name="rutaEquipo" id="rutaEquipo" value="<?=base_url()?>equipos/getEquipoAjax">
  	</form>
	<form class="form-horizontal" name="frmFolio" id="frmFolio" role="form" method="post" action="<?=base_url()?>serviciofolio/addFolio">
<div class="row">
	<div class="col-md-4">
	 	<div class="form-group">
			<label for="fecha" class="col-md-3 control-label">Fecha</label>
			<div class="col-md-9">
				<input type="date" class="form-control" name="fecha" id="fecha" >
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="fecha" class="col-md-3 control-label">Estado</label>
			<div class="col-md-9">
				<select name="estado" id="estado" class="form-control">
					<option value="pendiente">Pendiente</option>
					<option value="prioridad">Prioritario</option>
					<option value="entregado">Entregado</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="folio" class="col-md-3 control-label">Folio</label>
			<div class="col-md-9">
				<input type="number" name="folio"  id="folio" class="form-control" disabled>
			</div>		
		</div>	
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="folio" class="col-md-2 control-label">Cliente</label>
			<div class="col-md-10">
				<input type="text" name="cliente" id="cliente" class="form-control" value="<?=$nombre?>" disabled>
				<input type="hidden" name="idCli" id="idCli" value="<?=$idcli?>">
			</div>		
		</div>	
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<div class="col-md-5">
				<button type="button" id="btn_folio" class="btn btn-primary">Crear Folio</button>
				
			</div>
			<div id="spFolio"  style="height:30px"class="col-md-3 "></div>
		</div>
	</div>
	</form>
</div>
</div>
</div>
</div>
<div id="panelEquipo" class="row">
	<div class="panel panel-primary">
  		<div class="panel-heading">Equipo del Cliente</div>
 			<div class="panel-body">
				<form class="form-horizontal" id="frmEquipo" name="frmEquipo" role="form" action="<?=base_url()?>equipos/addEquipo" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="comboId" class="col-md-3 control-label">Equipos Existentes</label>
								<div class="col-md-9">
									<select name="comboId" id="comboId" class="form-control">
										<option value="" selected disabled>Seleccione el equipo si ya existe</option>
										<?php foreach($query->result() as $row){
											?>
										<option  value="<?=$row->idEq?>">Nombre: <?=$row->nomEquipo?> - Marca: <?=$row->marca?>- Modelo: <?=$row->modelo?></option>
										<?php }?>
									</select>
								</div>
							</div>
						</div><!--col-md-6-->
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nomEquipo" class="col-md-3 control-label">Nombre</label>
								<div class="col-md-9">
									<input name="nomEquipo" type="text" id="nomEquipo" class="form-control"/>
								</div>
							</div>
						</div><!--col-md-6-->
						<div class="col-md-6">
							<div class="form-group">
								<label for="marca" class="col-md-3 control-label">Marca</label>
								<div class="col-md-9">
									<input type="text" name="marca" id="marca" class="form-control"/>
								</div>
							</div>
						</div><!--col-md-6-->
					</div><!--row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="modelo" class="col-md-3 control-label">Modelo</label>
								<div class="col-md-9">
									<input name="modelo" type="text" id="modelo" class="form-control"/>
								</div>
							</div>
						</div><!--col-md-6-->
						<div class="col-md-6">
							<div class="form-group">
								<label for="numSerie" class="col-md-4 control-label">Nom. Serie</label>
								<div class="col-md-8">
									<input type="text" name="numSerie" id="numSerie" class="form-control"/>
								</div>
							</div>
						</div><!--col-md-6-->
					</div><!--row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="descripcion" class="col-md-3 control-label">Descripción</label>
								<div class="col-md-9">
									<textarea name="descripcion" rows="3"id="descripcion"class="form-control"></textarea>
								</div>
							</div>
						</div><!--col-md-12-->
						<div class="col-md-6">
							<div class="form-group">
								<label for="color" class="col-md-2 control-label">Color</label>
								<div class="col-md-10">
									<input type="text" name="color" id="color" class="form-control">
									<input type="hidden" name="idEq" id="idEq">
								</div>
							</div>
						</div><!--col-md-6-->
					</div><!--row-->
					<div class="row">
						<div class="col-md-6 ">
							<div class="form-group">
								<div class="col-md-8 ">
									<button type="button" id="btn_equipo" class="btn btn-primary">Guardar Equipo</button>
								<div class="col-md-6">	<button type="button" id="btn_sig" class="btn btn-info">Siguiente</button></div>
									<div class="col-md-6"><button type="button" id="btn_cancel" class="btn btn-danger">Cancelar</button></div>
								</div>
								<div id="spEquipo"  style="height:30px"class="col-md-3 "></div>
							</div>
						</div>
					</div><!--row-->
				</form>
			</div><!--panel body-->
		</div><!--Panel Titulo-->
</div><!--row PRINCIPAL DEL FORMULARIO EQUIPO-->
<div id="panelServicio" class="row">
	<div class="panel panel-primary">
  		<div class="panel-heading">Servicio</div>
 			<div class="panel-body">
				<form class="form-horizontal" id="frmServicio" name="frmServicio" role="form" action="<?=base_url()?>servicioFolio/addServicio" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="" class="col-md-2 control-label">Falla</label>
								<div class="col-md-9">
									<textarea class="form-control" name="falla" id="falla" rows="3"></textarea>
								</div>
							</div>
						</div><!--col-md-6-->
						<div class="col-md-6">
							<div class="form-group">
								<label for="tipo" class="col-md-2 control-label">Tipo</label>
								<div class="col-md-10">
									<select name="tipo" id="tipo" class="form-control">
										<option value="servicio">Servicio</option>
										<option value="garantia">Garantía</option>
										<option value="reingreso">Reingreso</option>
										<option value="diagnostico">Diagnostico</option>
									</select>
									<input type="hidden" name="sfolio" id="sfolio">
									<input type="hidden" name="sidEq" id="sidEq">
								</div>
							</div>
						</div><!--col-md-6-->
				
						
					</div><!--row-->
					<div class="row">
						<div class="alert alert-info ">Descripción del Equipo </div>
					</div><!--row Caracteristicas-->
					<div class="row">
						<div class="form-group">
							<label for="cables" class="col-md-2 control-label ">Cables</label>
							<div class="col-md-9">
								<input type="text" name="cables" id="cables" class="form-control" value="No tiene">
							</div>
						</div>
					</div><!--row-->
					<div class="row">
						<div class="form-group">
							<label for="discos" class="col-md-2 control-label ">Discos</label>
							<div class="col-md-9">
								<input type="text" name="discos" id="discos" class="form-control" value="No tiene">
							</div>
						</div>
					</div><!--row-->
					<div class="row">
						<div class="form-group">
							<label for="accesorios" class="col-md-2 control-label ">Accesorios</label>
							<div class="col-md-9">
								<input type="text" name="accesorios" id="accesorios" class="form-control" value="No tiene">
							</div>
						</div>
					</div><!--row-->
					<div class="row">
						<div class="form-group">
							<label for="calcas" class="col-md-2 control-label ">Calcomonias</label>
							<div class="col-md-9">
								<input type="text" name="calcas" id="calcas" class="form-control" value="No tiene">
							</div>
						</div>
					</div><!--row-->
					<div class="row">
						<div class="form-group">
							<label for="golpes" class="col-md-2 control-label ">Golpes</label>
							<div class="col-md-9">
								<input type="text" name="golpes" id="golpes" class="form-control" value="No tiene">
							</div>
						</div>
					</div><!--row-->
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<div class="col-md-7">
									<button type="button" id="btn_servicio" class="btn btn-primary">Guardar Servicio</button>
								</div><div id="spServicio"  style="height:30px"class="col-md-3 "></div>
							</div>
						</div>
					</div><!--row-->
				</form>
			</div><!--panel-body Cuerpo-->
	</div><!--panel-->
</div><!--row PRINCIPAL DEL FORMULARIO SERVICIO-->
<div id="confirServicio"class="row">
	<div class="col-md-12"><p>¿Desea agregar otro equipo a este servicio?</p></div>
</div>
<div id="confirEquipo"class="row">
	<div class="col-md-12"><p>Revise sus datos y si son correctos, de aceptar. De lo contrario elija nuevamente</p></div>
</div>
<div id="mns"class="row" style="opacity:0">
	<div class="col-md-12"><p id="mnsBan" style="color:red;"></p></div>
</div>