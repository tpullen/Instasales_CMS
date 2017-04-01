<div class="col-md-12 loginlogo" >
	<img src="../../assets/images/logo.png" class="login-logo" alt="Instasales Logo"> 
</div>
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Log In</h3>
	</div>
	<?php 
	echo validation_errors();
	echo form_open('Users/submit'); ?>
	<fieldset class="form-group">
		<label>Username</label>
		<?php echo form_input('user_name','',['class'=>'form-control']); ?>
	</fieldset>
	<fieldset class="form-group">	
		<label>Password</label>
		<?php echo form_password('password','',['class'=>'form-control']); ?>
	</fieldset>
	<fieldset class="form-group">
		<?php echo form_submit('submit', 'Login',['class'=>'form-control']); ?>
	</fieldset>
	<?php 
		echo form_close(); 
	?>
</div>