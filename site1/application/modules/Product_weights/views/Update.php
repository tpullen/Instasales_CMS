	<div class="col-md-12">
		<h2>Update item Weights</h2>
	</div>
	<div class="col-md-8" id="top-box">
		<button class="btn btn-primary btn-lg stack" id="back"><i class="fa fa-arrow-left"></i><?php echo anchor('Products/create/'.$product_id,' Back');?></button> 
	</div>
	<div class="col-md-12">
		<div class="panel">
			<?php 
			echo form_open($form_location);
			echo '<div class="form-group">';
			echo '<label>Add Weights</label>';
			echo form_input('product_weight', '',['class'=>'form-control']);
			echo '</div>';
			echo '<div class="form-group">';
			echo '<label>Add Weight Price</label>';
			echo form_input('weight_price', '',['class'=>'form-control']);
			echo '</div>';
			?>
		</div>
		<div class="form-group">
			<button class="btn btn-primary btn-md stack"><?php echo form_submit('submit', 'Submit'); ?><i class="fa fa-floppy-o"></i></button>
		</div>
			<?php
			echo form_close();
			echo Modules::run('Product_weights/_display_options',$product_id);
			?>
	</div>


