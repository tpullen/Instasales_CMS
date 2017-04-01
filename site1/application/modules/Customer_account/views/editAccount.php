<div class="editAccount">

<div class="panel">
	<div class="editPanel">

	<div class="back-dashboard">
			<button class="btn" id="back"><?php echo anchor('Customer_account/accountDashboard/'.$customer_id, 'Dashboard'); ?><i class="fa fa-user"></i></button>
			<button class="btn" id="orders"><?php echo anchor('Orders/Order_dashboard/'.$customer_id, 'Your Orders'); ?><i class="fa fa-shopping-bag"></i></button>
	</div>

	<div class="panel-heading">
		<h3 class="panel-title">Edit Account</h3>
	</div>

	<?php 
	echo validation_errors();
	echo form_open($form_location); ?>


	<div class="button-panel">
		<input type="button" name="personal" value="Personal" onclick="showPersonal()" />
		<input type="button" name="delivery" value="Delivery" onclick="showDelivery()" />
		<input type="button" name="delivery" value="Card" onclick="showCard()"/>
	</div>


	<div id="personal" class"editblock">

		<fieldset class="form-group">
			<?php echo '<p class="form-tag">Username</p>' ; 
			echo form_input('user_name',$user_name); ?>
		</fieldset>

		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">First Name</p>' ; 
			echo form_input('first_name',$first_name); ?>
		</fieldset>

		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">Last Name</p>' ; 
			echo form_input('sur_name',$sur_name); ?>
		</fieldset>

		<fieldset class="form-group submit">
			<?php
			echo form_submit('submit', 'Submit' ); ?>
		</fieldset>
	</div>

	<div id="delivery" class="editblock" style="display:none;">

		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">Address First Line</p>' ; 
			echo form_input('address_1',$address_1); ?>
		</fieldset>
	
		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">Address Second Line</p>' ; 
			echo form_input('address_2',$address_2); ?>
		</fieldset>

		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">Town</p>' ; 
			echo form_input('town',$town); ?>
		</fieldset>

		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">County</p>' ; 
			echo form_input('county',$county); ?>
		</fieldset>

		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">Country</p>' ; 
			echo form_input('country',$country); ?>
		</fieldset>

		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">Postcode</p>' ; 
			echo form_input('postcode',$postcode); ?>
		</fieldset>

		<fieldset class="form-group submit">
			<?php
			echo form_submit('submit', 'Submit' ); ?>
		</fieldset>
	</div>

	<div id="card" class="editblock" style="display:none;">	

		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">Card Type</p>' ; 
			echo form_input('card_type',$card_type); ?>
		</fieldset>
		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">Card Number</p>' ; 
			echo form_input('card_number',$card_number); ?>
		</fieldset>
		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">Expiry Date</p>' ; 
			echo form_input('expiry_date',$expiry_date); ?>
		</fieldset>
		<fieldset class="form-group">
			<?php
			echo '<p class="form-tag">Security Code</p>' ; 
			echo form_input('security_code',$security_code); ?>
		</fieldset>
		<fieldset class="form-group submit">
			<?php
			echo form_submit('submit', 'Submit' ); ?>
		</fieldset>
	</div>
	<?php echo form_close(); ?>
</div>
</div>