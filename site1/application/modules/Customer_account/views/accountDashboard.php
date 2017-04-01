<div class="accountDashboard">
<div class="panel">
	<div class="myDetails">
		<div class="sidepanel">
			<button class="btn" id="edit_details"><?php echo anchor('Customer_account/editDetails/'.$customer_id, 'Edit Details'); ?><i class="fa fa-pencil"></i></button>
			<button class="btn" id="orders"><?php echo anchor('Orders/Order_dashboard/'.$customer_id, 'Your Orders'); ?><i class="fa fa-shopping-bag"></i></button>
		</div>
		<div class ="rightsection">
			<h3 class="main-title">Your Details</h3>
			<div class ="personaldetails">
				<label class="tag">Username:</label> 
				<div class="item-name"><?php echo $user_name;?></div>
				<label class="tag">First Name:</label> 
				<div class="item-name"><?php echo $first_name;?></div>
				<label class="tag">Last Name:</label> 
				<div class="item-name"><?php echo $sur_name;?></div>
			</div>
			<div class="subdetails">
				<h4 class="subtitle">Delivery Address</h4>
				<label class="tag">Address 1:</label> 
				<div class="item-name"><?php echo $address_1;?></div>
				<label class="tag">Address 2:</label> 
				<div class="item-name"><?php echo $address_2;?></div>
				<label class="tag">Town:</label> 
				<div class="item-name"><?php echo $town;?></div>
				<label class="tag">County:</label> 
				<div class="item-name"><?php echo $county;?></div>
				<label class="tag">Country:</label> 
				<div class="item-name"><?php echo $country;?></div>
				<label class="tag">Postcode:</label> 
				<div class="item-name"><?php echo $postcode;?></div>
			</div>
			<div class="subdetails">
				<h4 class="subtitle">Bank Details</h4>
				<label class="tag">Card Type:</label> 
				<div class="item-name"><?php echo $card_type;?></div>
				<label class="tag">Card Number:</label> 
				<div class="item-name"><?php echo $card_number;?></div>
				<label class="tag">Expiry Date:</label> 
				<div class="item-name"><?php echo $expiry_date;?></div>
				<label class="tag">Security Code:</label> 
				<div class="item-name"><?php echo $security_code;?></div>
			</div>
		</div>
	</div>

</div>
</div>
