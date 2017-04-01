<?php ini_set('memory_limit', '-1'); ?>
<div class="container" id="listing-layout">
	<div class="row">
		<div class="listing-header">
			<br>
			<?php echo Modules::run('Products/generate_catergories');?>
		</div> 
		<div id="product-list">
			<?php $currency = Modules::run('Site_settings/get_currency'); 
				foreach ($query->result() as $product) { ?>
				<?php $main_image_path = base_url()."ProductImages/".$product->main_image; ?>		
				<div class="listing-item col-sm-4 col-md-3">
					<a href="<?php echo base_url().'Products/show/'.$product->id; ?>">
						<img class="thumb" src="<?php echo $main_image_path; ?>">
						<span class="item-name"><?php echo $product->product_name; ?></span>
						<span class="item-price"><?php echo $currency.$product->product_price; ?></span>
					</a>
				</div>
			<?php } ?>
		</div>
		<div class="pagination"></div>				
	</div>
</div>
