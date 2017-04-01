
<div class="col-md-12">
	<h2>Category Assign</h2>
</div>
<div class="col-md-8" id="top-box">
	<button class="btn btn-primary btn-lg stack" id="back"><i class="fa fa-arrow-left"></i><?php echo anchor('Products/create/'.$product_id,' Back');?></button> 
</div>
<div class="col-md-12">
	<div class="panel">
	  	<?php 
			$available_categories = Modules::run('Product_categories/get_end_of_line_categories');
			echo form_open($form_location);
		?>
		<div class="form-group">
			<select class="form-control" name="category_id">
				<option selected="selected">Choose One</opion>
				<?php
				foreach($available_categories as $option){
					$breadcrumb = Modules::run('Product_categories/get_breadcrumb',$option); 
					$category_name = Modules::run('Product_categories/get_category_name',$option);
					echo '<option value="'.$option.'">'.$breadcrumb.''.$category_name.'</option>';
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<button class="btn btn-primary btn-md stack"><?php echo form_submit('submit', 'Submit'); ?><i class="fa fa-floppy-o"></i></button>
			<button class="btn btn-danger btn-md stack"><?php echo form_submit('submit', 'Cancel'); ?><i class="fa fa-times"></i></button>
		</div>
		<?php
			echo form_close();
			echo Modules::run('Category_assign/_current_assigned_categories',$product_id);
		?> 
	</div>
</div>
