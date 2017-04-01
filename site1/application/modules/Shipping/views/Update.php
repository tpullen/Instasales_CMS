	<div class="col-md-12">
		<h2>Add Shipping  Method</h2>
	</div>
	<div class="col-md-12">
		<div class="panel shipping_panel">
			<div class="form-group">
			<?php 
				echo form_open($form_location);
				echo '<label for="shipping-method">Shipping Method </label>';
				echo form_input('shipping_type', '',['class'=>'form-control']);
				echo '<label for="shipping-cost">Shipping Cost </label>';
				echo form_input('cost', '',['class'=>'form-control']);
			?>
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-md stack"><?php echo form_submit('submit', 'Submit'); ?><i class="fa fa-floppy-o"></i></button>
			</div>
			<?php
				echo form_close();
			?>
			<?php 
				echo Modules::run('Shipping/_display_options');
			?>
		</div>
	</div>