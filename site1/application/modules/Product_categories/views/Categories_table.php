<div class="col-md-12">
	<div class="panel categories_panel">
		<div class="panel-heading">
			<h3 class="panel-title">Categories</h3>
		</div>

	<?php 
		$num_rows = $query->num_rows();
		if($num_rows>0){
	?>
			<table class="table table-striped categories_tbl table-bordered categories_tbl" style="width:100%;">
				<thead>
					<tr role="row">
						<th>Category ID</th>
						<th>Category Name</th>
						<th></th>
					</tr>	
				</thead>	
				<tbody>
				<?php 
				foreach($query->result() as $row){
				?>
					<tr>
						<td data-label="Category ID"><?php echo $row->category_id; ?></td>
						<td data-label="Category Name"><?php echo $row->category_name; ?></td>
						<td data-label=""><button class="btn btn-primary btn-sm stack" id="edit_button"><?php echo anchor('Product_categories/manage/'.$row->category_id,'Edit Category '); ?><i class="fa fa-pencil"></i></button></td>
					</tr>
					<?php 
				}
		}
		?>
			</tbody>
		</table>	
	</div>	
</div> 