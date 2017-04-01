<div class= "frontendlogin">
<div class="panel">
		<div class="panel-heading">
			<h3 class="panel-title">Log In</h3>
		 </div>


<div class ='validate'> 
	<?php echo validation_errors(); ?>
</div>
<?php echo form_open('Customer_account/customer_submit'); ?>
<fieldset class="form-group">
	<?php echo "Username " ; 
	echo form_input('user_name',''); ?>
</fieldset>
<fieldset class="form-group">
	<?php
	echo "Password " ; 
	echo form_password('password',''); ?>
</fieldset>
<fieldset class="form-group submit">
<?php
echo form_submit('submit', 'Submit' ); ?>
</fieldset>
<fieldset class="form-group register-button">
	<?php echo anchor('Customer_account/register','Register Here'); ?>
</fieldset>	
<?php 
echo form_close(); ?>
</div>
</div>