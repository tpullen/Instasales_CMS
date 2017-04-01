<?php
	$customer_id = $this->session->userdata('customer_id');
?>
<div class="orderDashboard">
	<div class="panel">
		<div class="main">
			<div class="sidepanel">
				<button class="btn" id="back"><?php echo anchor('Customer_account/accountDashboard/'.$customer_id, 'Dashboard'); ?><i class="fa fa-user"></i></button>
				<button class="btn" id="orders"><?php echo anchor('Orders/Order_dashboard/'.$customer_id, 'Your Orders'); ?><i class="fa fa-shopping-bag"></i></button>
			</div>
			<div class ="rightsection">
				<h3 class="main-title">Your Orders</h3>
				<div class="no-orders">You have no current orders</div>
				<table class="table order-table table-striped table-bordered dataTable no-footer">
					<thead>
						<tr role="row">
							<th>Order ID</th>
							<th>Date</th>
							<th>Total</th>
							<th>Status</th>
							<th>View More</th>
							<th>Cancel Order</th>
						</tr>	
					</thead>
					<?php 
						foreach($query->result() as $row){
					?>
					<tbody>
						<tr role="role">
							<td data-label="Order Id" class="order-id"><?php echo $row->order_id; ?></td>
							<td data-label="Date"><?php echo $row->date; ?></td>
							<td data-label="Total"><?php echo '£' . $row->subtotal; ?></td>
							<td data-label="Status"><?php echo $row->status; ?></td>
							<td data-label="View More" class="View"><button class="btn btn-md" id="order_details"><?php echo anchor('Orders/Cust_order_details/'.$row->order_id.'/'.$row->customer_id,'View Order Details'); ?> <i class="fa fa-eye"></i></button></td>
							<td data-label="Cancel Orders"><?php echo anchor('Orders/cancel_order/'.$row->order_id,'<i class="fa fa-times"></i>'); ?></button></td>
						</tr>
					</tbody>
					<?php 
						}
					?>
				</table> 
			</div>
		</div>
	</div>
</div>

