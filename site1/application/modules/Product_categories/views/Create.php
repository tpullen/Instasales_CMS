
<div class="col-md-12">
	<h2 class=""><?php echo $headline; ?></h2>
</div>
<div class="col-md-8 col-sm-12" id="top-box">
	<button class="btn btn-primary btn-lg stack" id="back" onclick="history.back();"><i class="fa fa-arrow-left"></i> Back</button> 
</div>
<div class="col-md-8 col-md-sm-12">
		<div class="panel">
			<?php 
				if (isset($flash)){
					echo $flash;
				}
				echo form_open($form_location);
				echo validation_errors("<p style='color:red;'>", "</p>")
				?>
				<div class="form-group">
					<td><label>Category Name</label></td>
					<td><?php echo form_input('category_name', $category_name,['class'=>'form-control']); ?> </td>
				</div>	
				<div class="form-group">	
					<button class="btn btn-primary btn-md stack"><?php echo form_submit('submit', 'Submit'); ?><i class="fa fa-floppy-o"></i></button>
					<button class='btn btn-danger btn-md stack'><?php echo anchor ('Product_categories/delete_category/'.$category_id,' Delete ') ?><i class='fa fa-times'></i></button>
				</div>
				<?php
					echo form_close();
				?>
		</div>	
</div>
