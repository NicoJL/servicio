<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-condesend" id="tablaCorte">
				<thead>
					<tr>
						<td>Folio</td>
						<td>Status</td>
						<td>Fecha</td>
						<td>Tipo</td>
						<td>Sub.Ref.</td>
						<td>Subtotal S.</td>
						<td>Total</td>
					</tr>
				</thead>
				<?php $total=0;?>
				<tbody>
					<?php foreach ($query->result() as $row) {?>
					<tr>
						<td><?=$row->folio?></td>
						<td><?=$row->estadogeneral?></td>
						<td><?=$row->fecha?></td>
						<td><?=$row->tipo?></td>
						<td><?=$row->subtotal?></td>
						<td><?=$row->total?></td>
						<td><?php $subtotal=$row->subtotal+$row->total; echo $this->cart->format_number($subtotal); $total+=$subtotal;?></td>
					</tr>
					<?php }?>
							<tr><td ></td><td></td><td></td><td></td><td></td><td><b>Total</b></td><td><?php echo '<b>'.$this->cart->format_number($total).'</b>';?></td></tr>
				</tbody>	

			</table>
		</div>
	</div>
</div>