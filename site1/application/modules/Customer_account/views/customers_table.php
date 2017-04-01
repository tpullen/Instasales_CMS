
<div class="col-md-12">
	<div class="panel customers_panel" >
		<div class="panel-heading">
			<h3 class="panel-title">Customer</h3>
		 </div>
		<table class="table customers_tbl table-striped table-bordered" id="example" style="width:100%;">
			<thead>
				<tr role="row">
					<th>Customer ID</th>
					<th>Customer Name</th>
					<th>Customer Email Address</th>
					<th>Customer Address</th>
				</tr>	
			</thead>
			
			<tbody>
			<?php 
			
			foreach($query->result() as $row){
				$count = 0;
				$count++;
				?>
				<tr role="role">
					<td data-label="Customer ID"><?php echo $row->customer_id; ?></td>
					<td data-label="Customer Name"><?php echo $row->first_name . ' ' . $row->sur_name; ?></td>
					<td data-label="Customer Email Address"><?php echo $row->user_name; ?></td>
					<td data-label="Customer Address"><?php echo $row->address_1 . ', ' . $row->address_2 . ', ' . $row->town . ', ' .  $row->county . ', ' .  $row->postcode ?></td>
				</tr>
			<?php 
				}
			?>
			</tbody>

		</table>
	
	</div>	
</div> 