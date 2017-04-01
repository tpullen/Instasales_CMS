<div class="frontendregister">

	<div class="panel">
		<div class="panel-heading">
			<h3 class="panel-title">Register</h3>
		</div>

	<?php echo validation_errors();
	echo form_open('Customer_account/register_submit'); 	?>
		<fieldset class="form-group">
			<?php echo "Email Address " ; 
			echo form_input('emailaddress',''); ?>
		</fieldset>
		<fieldset class="form-group">
			<?php
			echo "Password " ; 
			echo form_password('password',''); ?>
		</fieldset>
		<fieldset class="form-group">
			<?php
			echo "Confirm Password " ; 
			echo form_password('passconf',''); ?>
		</fieldset>
		<fieldset class="form-group submit">
			<?php echo form_submit('submit', 'Submit' ); ?>
		</fieldset>
		<fieldset class="form-group login">
			<?php echo anchor('Customer_account/customer_login','Go to LogIn'); ?>
		</fieldset>	
	<?php echo form_close(); ?>

	</div>
</div>