<div class="col-md-12">
	<h2><?php echo $headline; ?></h2>
	<?php 
	if (isset($flash)){
	echo $flash;
	}
	?>
	<div class="col-md-12" id="top-box">
         <?php 
			if($new_category_allowed==TRUE){ ?>
				<button class="btn btn-primary btn-md stack" id="add_category"><?php echo anchor('Product_categories/create/x/'.$parent_category, 'Create New Category ');?> <i class="fa fa-plus-square"></i></button>
			<?php } 
			if ($parent_category>0){ ?>	
				<button class="btn btn-secondary btn-md stack" id="update_category"><?php echo anchor('Product_categories/create/'.$parent_category, 'Update Parent Category');?> <i class="fa fa-plus-square"></i></button>
			<?php }
			?>  
    </div>
</div>
<?php 
echo Modules::run('Product_categories/_display_categories_table', $parent_category);
?>
