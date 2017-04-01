<?php
	$customer_id = $this->session->userdata('customer_id');
?>
<div class="custOrderDetails">
	<div class="panel">
		<div class="main">
			<div class="sidepanel">
				<button class="btn" id="back"><?php echo anchor('Orders/Order_dashboard/'.$customer_id, 'Back'); ?><i class="fa fa-arrow-left"></i></button>
			</div>
			<div class ="rightsection">
				<h3 class="main-title">Your Order Details</h3>
				<table class="table">
					<thead>
						<tr role="row">
							<th>Product ID</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Options</th>
							<th>Image</th>
						</tr>	
					</thead>
				<?php 
					foreach($query->result() as $row){
				?>
					<tbody>
						<tr role="role">
							<td data-label="Product Id"><?php echo $row->product_id; ?></td>
							<td data-label="Product Name"><?php echo $row->product_name; ?></td>
							<td data-label="Quantity"><?php echo $row->quantity; ?></td>
							<td data-label="Price"><?php echo '£'.$row->price; ?></td>
							<td data-label="Options"><?php echo $row->options; ?></td>
							<td data-label="Image"><img style="width:75-x;height:90px;" src="<?php echo base_url()."ProductImages/".$row->main_image;; ?>"></td>
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
