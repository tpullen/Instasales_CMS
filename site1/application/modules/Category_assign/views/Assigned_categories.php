<div class="col-md-12">
	<h4>Current Assigned Catergories</h4>
</div>
<table class="table cat_assigned_tbl table-striped table-bordered dataTable no-footer" style="width:100%;">
	<thead>
		<tr role="row">
			<th>Category</th>
			<th>Remove</th>
		</tr>	
	</thead>		
	<tbody>
		<?php 	
			foreach ($query->result() as $row) {
			$delete_url = base_url()."Category_assign/remove/".$row->category_assign_id."/".$product_id;
			$category_name = Modules::run('Product_categories/get_category_name',$row->category_id);
		?>
		<tr>
			<td><?php echo $category_name; ?></td>
		<td>
			<?php echo "<button class='btn btn-danger btn-md stack'><a href='". $delete_url ."'> Delete </a><i class='fa fa-times'></i></button>"; ?></td>
		</tr>
		<?php }	?>
	</tbody>
</table>
</br>


