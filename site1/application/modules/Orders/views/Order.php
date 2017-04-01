<div class="container" id="order">
    <div class="row">
        <div class="panel-heading">					
			<h4>Order Summary</h4>
		</div> 
		<table class="table table-striped">
			<thead>
				<tr>
					<th colspan="4">Product</th>
					<th colspan="4">Options</th>
					<th colspan="2">Quantity</th>
					<th colspan="2">Total</th>
				</tr>
			</thead>
			<?php $currency = Modules::run('Site_settings/get_currency');
				  $i = 1; ?>
			<?php foreach ($this->cart->contents() as $items): ?>
			<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
			<tr>
				<td colspan="4" data-label="Product">
					<?php echo $items['name']; ?>
					<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
					<?php endif; ?>
				</td>
				<td colspan="4" data-label="Options">
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
					<?php echo $option_name.' : '.$option_value; ?>
					<?php endforeach; ?>
				</td>
				<td colspan="2" data-label="Quantity">
					<?php echo $items['qty']; ?>
				</td>
				<td colspan="2" data-label="Total">
					<?php echo $currency.$this->cart->format_number( $items['subtotal'] );?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<div class="hr no-border"></div>
		<?php echo form_open('Orders/process');?>
			<div class="panel-heading">
				<h4>Shipping Method</h4>
			</div>
			<div class="col-sm-6 no-padding clearfix">
				<?php echo Modules::run('Shipping/_display_dropdown'); ?>
			</div>
			<div class="col-sm-6 no-padding clearfix">
				<h4 class="pull-right">Total : <?php echo $currency. '<span id="order-total">' . $this->cart->format_number( $this->cart->total() ) . '</span>'; ?></h4>
			</div>
			<div class="hr no-border clearfix"></div>
			<div class="panel-heading">
				<h4>Delivery & Billing Address</h4>
			</div>
			<div class="col-sm-6 no-padding">
				<table class="table table-striped half">							
					<tr> 
						<td class="clearfix">
							<b>Name: </b><?php echo $first_name .' '. $sur_name; ?>
						</td>
					</tr>
					<tr> 
						<td class="clearfix">
							<b>Address: </b><?php echo $address_1.' '.$address_2. ', '.$town;; ?>
						</td>
					</tr>
					<tr> 
						<td class="clearfix">
							<b>County: </b><?php echo $county; ?>
						</td>
					</tr>
					<tr> 
						<td class="clearfix">
							<b>Postcode: </b><?php echo $postcode; ?>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-6 no-padding ">
				<table class="table table-striped half">							
					<tr>
						<td class="clearfix">
							<b>Card Type: </b><?php echo $card_type; ?>
						</td>
					</tr>
					<tr>
						<td class="clearfix">
							<b>Card Number: </b><?php echo $card_number; ?>
						</td>
					</tr>
					<tr>
						<td class="clearfix">
							<b>Expiry Date: </b><?php echo $expiry_date; ?>
						</td>
					</tr>
					<tr>
						<td class="clearfix">
							<b>Security Code: </b><?php echo $security_code ; ?>
						</td>
					</tr>
				</table>
			</div>
			<div class="hr no-border"></div>
			<?php if  ($this->cart->total_items()!=0):?>
				<?php echo form_submit('Orders/process','Confirm Payment',['class'=>'btn btn-success','role'=>'button']) ?>
				<?php else:?>
					<?= anchor(base_url(),$url_check); ?>
			<?php endif ;?>
		<?php echo form_close(); ?>		
    </div>
</div>