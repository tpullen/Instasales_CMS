	<div class="col-md-12">
		<h2>Update item Colours</h2>
	</div>
	<div class="col-md-8" id="top-box">
		<button class="btn btn-primary btn-lg stack" id="back"><i class="fa fa-arrow-left"></i><?php echo anchor('Products/create/'.$product_id,' Back');?></button> 
	</div>
	<div class="col-md-12">
		<div class="panel">
			<?php 
			echo form_open($form_location);
			echo '<div class="form-group">';
			echo '<label>Add Colours</label>';
			
			echo form_input('product_colour', '',['class'=>'form-control']);
			?>
		</div>

		<div class="form-group">
			<button class="btn btn-primary btn-md stack"><?php echo form_submit('submit', 'Submit'); ?><i class="fa fa-floppy-o"></i></button>
		</div>
		<?php
			echo form_close();
			echo Modules::run('Product_colours/_display_options',$product_id);
		?>
	</div>

