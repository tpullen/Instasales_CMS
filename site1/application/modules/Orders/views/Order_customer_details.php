<div class="col-md-12">
	<div class="panel ">
		<div class="panel-heading">
			<h3 class="panel-title">Delivery & Billing Details</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered dataTable no-footer">
				<thead>
					<tr role="row">
						<th>Customer Name</th>
						<th>Delivery Address & Billing Address</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach($query->result() as $row){
					?>
					<tr>
						<td><?php echo $row->first_name .' '. $row->sur_name; ?></td>
						<td><?php echo $row->address_1 .', '. $row->address_2 .', '. $row->town . ', '.  $row->county . ', '.  $row->country . ', '. $row->postcode; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>	
</div>
<div class="col-md-12">
	<div class="panel orders_panel">
		<div class="panel-heading">
			<h3 class="panel-title">Customer Card Details</h3>
		</div>
		<div class="panel-body">
			<table class="table orders_tbl table-striped table-bordered dataTable no-footer" style="width: 100%;">
				<thead>
					<tr role="row">
						<th>Card Type</th>
						<th>Card Number</th>
						<th>Expiriry Date</th>
						<th>Security Code</th>
					</tr>
				</thead>				
				<tbody>
					<tr>
						<td data-label="Card Type"><?php echo $row->card_type; ?></td>
						<td data-label="Card Number"><?php echo $row->card_number; ?></td>
						<td data-label="Expiriny Date"><?php echo $row->expiry_date; ?></td>
						<td data-label="Security Code"><?php echo $row->security_code; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			
			</table>
		</div>
	</div>	
</div>