<div class="container" id="cart">
    <div class="row">		
		<h4>My Cart : <?=  $this->cart->total_items()?> <i class="fa fa-shopping-cart"></i></h4> 
		<hr>
            <?php echo form_open('Cart/update');?>
            <table class="table table-striped">
            	<thead>
            		<tr>
            			<th>Product</th>
            			<th>Options</th>
            			<th>Quantity</th>
            			<th>Subtotal</th>
            			<th>Remove</th>
            		</tr>
            	</thead>
            	<tbody>
				<?php $currency = Modules::run('Site_settings/get_currency'); 
				$i = 1; ?>
				<?php foreach ($this->cart->contents() as $items): ?>
				<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
				<tr>
					<td data-label="Product">
						<?php echo $items['name']; ?>
					</td>
					<td data-label="Option">					
						<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
							<?php echo $option_name.' : '.$option_value; ?>
						<?php endforeach; ?>					
					</td>
					<td data-label="Quantity">
						<?php echo form_input(array('name' => 'qty'.$i, 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
					</td>
					<td data-label="Total">
						<?php echo $currency.$this->cart->format_number( $items['subtotal'] );?>
					</td>
					<td data-label="Remove">
						<div class="button remove-item">
							<?php echo anchor('Cart/delete_item/'.$items['rowid'],'Remove <i class="fa fa-times"></i>',['class'=>'btn ','role'=>'button']);?>
						</div>
					</td>
					</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
				</tbody>
				</table>
				<div class="col-sm-12 no-padding">			
					<hr>
					<div class="col-sm-9"></div>
					<div class="col-sm-3">
						<h4>Total : <?php echo $currency.$this->cart->format_number( $this->cart->total() ); ?></h4>
					</div>
				</div>
				<div class="col-sm-12 align-center cart-buttons">
					<div class="button">
						<?=  anchor('Cart/clear_cart','Clear Cart',['class'=>'btn','role'=>'button','onClick' =>"confirm('Are you sure you want to clear your cart')"]) ?>
					</div>
					<div class="button">
						<?php echo form_submit('Cart/update','Update Cart',['class'=>'btn','role'=>'button']) ?>
					</div>
					<div class="button">
						<?=  anchor(base_url()."Products",'Continue Shopping',['class'=>'btn','role'=>'button']) ?>
					</div>
					<?php							
						$url_check	='<button class="btn" type="submit">';
						$url_check	 .= 'Check Out'.'</button>';
					?>
					<?php if  ($this->cart->total_items()!=0):?>
						<div class="button">
							<?=  anchor('Orders/view',' Check Out',['class'=>'btn','role'=>'button']) ?>
						</div>		
					<?php else:?>
						<div class="button">
							<?= anchor(base_url(),$url_check); ?>
						</div>
					<?php endif ;?>
				</div>
            </div>
        </div> 		