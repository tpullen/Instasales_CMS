<div class="col-md-12">
<h2>Delete Category</h2>
</div>
<div class="col-md-12">
	<div class="panel">
		<div class="">
			<p>Are you sure you want to delete theis category </p>
			<?php 
			echo form_open($form_location);
			?>
			<button class="btn btn-primary btn-md stack"><?php echo form_submit('submit', 'Confirm Deletion'); ?><i class="fa fa-floppy-o"></i></button>
			<button class="btn btn-danger btn-md stack"><?php echo form_submit('submit', 'Cancel Deletion'); ?><i class="fa fa-times"></i></button>
			<?php
			echo form_close();
			?>
		</div>
	</div>
</div>