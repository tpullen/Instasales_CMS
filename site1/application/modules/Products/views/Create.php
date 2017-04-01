<div class="col-md-12">
	<h2 class=""><?php echo $headline; ?></h2>
</div>
<div class="col-md-12" id="top-box">
	<button class="btn btn-primary btn-lg stack" id="back"><i class="fa fa-arrow-left"></i><?php echo anchor('Products/manage',' Back');?></button> 
</div>
<?php if($product_id>0){
	echo '<div class="col-md-4">';
	include('Additional_options.php');
}
echo '</div>'; ?>		
<div class="col-md-8">
	<div class="panel">			
		<?php if (isset($flash)){
			echo $flash;
		}
		echo form_open($form_location);
			echo validation_errors("<p style='color:red;'>", "</p>") ?>					
			<div class="form-group">
				<td><label>Quantity</label></td>
				<td><?php echo form_input('quantity', $quantity,['class'=>'form-control']); ?> </td>
			</div>
			<div class="form-group">
				<td><label>Product Name</label></td>
				<td><?php echo form_input('product_name', $product_name,['class'=>'form-control']); ?> </td>
			</div>
			<div class="form-group">
				<td><label>Product Price</label></td>
				<td><?php echo form_input('product_price', $product_price,['class'=>'form-control']); ?> </td>
			</div>
			<div class="form-group">
				<td><label>Short Product Description</label></td>
				<td><?php echo form_textarea('product_short_description', $product_short_description,['class'=>'form-control']); ?> </td>
			</div>
			<div class="form-group">
				<td><label>Product Description</label></td>
				<td><?php echo form_textarea('product_description', $product_description,['class'=>'form-control']); ?> </td>
			</div>		
			<div class="form-group">
				<td>&nbsp;</td>
				<button class="btn btn-primary btn-md stack"><?php echo form_submit('submit', 'Submit'); ?><i class="fa fa-floppy-o"></i></button>
			</div>
		<?php echo form_close(); ?>			
	</div>
</div>
