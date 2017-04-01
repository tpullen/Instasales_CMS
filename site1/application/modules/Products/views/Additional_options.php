<div class="panelN" id="">
    <div class="list-group">
		<?php echo anchor('Product_colours/update/'.$product_id, 'Update Product Colour' ,'class="list-group-item"'); ?>
		<?php echo anchor('Product_sizes/update/'.$product_id, 'Update Product Sizes','class="list-group-item"'); ?>
		<?php echo anchor('Products/upload_image/'.$product_id, 'Update Product Pictures' ,'class="list-group-item"'); ?>
		<?php echo anchor('Category_assign/assign/'.$product_id, 'Assign Categories'  ,'class="list-group-item"'); ?>
		<?php echo anchor('Products/delete_product/'.$product_id,'Delete Product','class="list-group-item"'); ?>
    </div>
</div>
        