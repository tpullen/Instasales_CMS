<div class="col-md-12">
	<div class="panel">
		<div class="panel-heading">
			<h3 class="panel-title">Options</h3>
		</div>
		<div class="panel-body">
		<?php
			echo form_open($form_location);
		?>
		<div class="form-group">
			<button class="btn btn-success btn-lg stack"><?php echo form_submit('submit', 'Order Dispatched'); ?><i class="fa fa-paper-plane-o"></i></button>
			<button class="btn btn-danger btn-lg stack"><?php echo form_submit('submit', 'Cancel Order'); ?><i class="fa fa-times"></i></button>
		</div>
		<?php
			echo form_close();
		?>
		</div>
	</div>	
</div>	