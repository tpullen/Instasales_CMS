<div class="col-md-12 col-sm-12" id="products_table">
	<div class="panel products_panel ">
		<div class="panel-heading">
			<h3 class="panel-title">Products</h3>
		</div>
		<table class="table products_tbl table-striped table-bordered dataTable no-footer products_tbl" style="width: 100%;">
			<thead>
				<tr role="row">
					<th class="product_table_id">Product ID</th>
					<th>Product Image</th>
					<th>Product Name</th>
					<th></th>
				</tr>	
			</thead>		
			<tbody>
				<?php foreach($query->result() as $row){
					$count = 0;
					$count++;
				?>
					<tr role="role">
						<td data-label="Product ID" class="product_table_id" ><?php echo $row->id; ?></td>
							<?php $main_image_path = base_url()."ProductImages/".$row->main_image; ?>
						<td data-label="Product Image"><img style="width:75px;height:90px;" src="<?php echo $main_image_path; ?>"></td>
						<td data-label="Product Name"><?php echo $row->product_name; ?></td>
						<td><button class="btn btn-primary btn-md stack" id="edit_product"><?php echo anchor('Products/create/'.$row->id,'Edit Product '); ?><i class="fa fa-pencil"></i></button></td>
					</tr>
				<?php }	?>
			</tbody>
		</table>		
	</div>	
</div> 