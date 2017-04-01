<?php if (isset($flash)){
    echo $flash;
} ?>
<div class="col-md-12 col-sm-12" id="top-box">
    <div class="col-md-4 col-sm-12">
	   <h2> Manage Products</h2>
    </div>
    <div class="col-md-8 col-sm-12">
        <button class="btn btn-primary btn-lg stack" id="add_product"><?php echo anchor('Products/create', 'Create New Product ');?><i class="fa fa-plus-square"></i></button> 
    </div>
</div>
<?php echo Modules::run('Products/_display_top_box'); ?>
<?php echo Modules::run('Products/_display_products_table'); ?>
