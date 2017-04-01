<div class="col-md-12">
	<div class="panel orders_panel">	
		<table class="table orders_tbl table-striped table-bordered" style="width: 100%;">
			<thead>
				<tr role="row">
					<th>Order ID</th>
					<th>Customer Name</th>
					<th>Date</th>
					<th>Total</th>
					<th>Status</th>
					<th>Action</th>
				</tr>	
			</thead>	
			<tbody>
				<?php 
					foreach($query->result() as $row){
				?>
				<tr role="role">
					<td data-label="Order ID"><?php echo $row->order_id; ?></td>
					<td data-label="Customer Name"><?php echo $row->customer_name; ?></td>
					<td data-label="Date"><?php echo $row->date; ?></td>
					<td data-label="Subtotal"><?php echo '£' . $row->subtotal; ?></td>
					<td data-label="Status"><?php echo $row->status; ?></td>
					<td data-label=" "><button class="btn btn-primary btn-md stack" id="order_details"><?php echo anchor('Orders/order_details/'.$row->order_id.'/'.$row->customer_id,'View Order Details'); ?> <i class="fa fa-eye"></i></button></td>
				</tr>
				<?php 
					}
				?>
			</tbody>		
		</table>
	</div>	
</div> 