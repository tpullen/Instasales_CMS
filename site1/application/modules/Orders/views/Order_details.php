<div class="col-md-12">
	<h2 class="">Order Details</h2>
</div>
<div class="col-md-12" id="top-box">
	<button class="btn btn-primary btn-lg stack" id="back"><i class="fa fa-arrow-left"></i><?php echo anchor('Orders/manage',' Back');?></button> 
</div>
<div class="col-md-12">
	<?php 
	echo Modules::run('Orders/_order_details_options');

	echo Modules::run('Orders/_order_status_details');
			
	echo Modules::run('Orders/_order_customer_details');
	?>
	<div class="col-md-12">
		<div class="panel orders_panel">
			<div class="panel-heading">
				<h3 class="panel-title">Products</h3>
			 </div>
			<div class="panel-body">
				<table class="table orders_tbl table-striped table-bordered dataTable no-foote" style="width: 100%;">
					<thead>
						<tr>
							<th>Product ID</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Options</th>
						</tr>	
					</thead>
					
					<tbody>
					<?php 
						foreach($query->result() as $row){	
					?>
						<tr>
							<td data-label="Product ID"><?php echo $row->product_id; ?></td>
							<td data-label="Product Name"><?php echo $row->product_name; ?></td>
							<td data-label="Quantity"><?php echo $row->quantity; ?></td>
							<td data-label="Price"><?php echo '£' . $row->price; ?></td>
							<td data-label="Options"><?php echo $row->options; ?></td>
						</tr>
						<?php 
						}
					?>
					</tbody>
					
				</table>
			</div>
		</div>	
	</div> 
</div>

