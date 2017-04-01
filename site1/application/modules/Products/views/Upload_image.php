<?php if(!isset($main_image)){
		$main_image = 'placeholder.png';
	}
	if(!isset($main_image1)){
		$main_image1 = 'placeholder.png';
	}
	if(!isset($main_image2)){
		$main_image2 = 'placeholder.png';
	}
	if(!isset($main_image3)){
		$main_image3 = 'placeholder.png';
	}
  	$main_image_path = base_url()."ProductImages/".$main_image;
    $main_image1_path = base_url()."ProductImages/".$main_image1;
    $main_image2_path = base_url()."ProductImages/".$main_image2;
    $main_image3_path = base_url()."ProductImages/".$main_image3;
?>
<div class="col-md-12">
	<h2>Upload Product Image</h2>
</div>
<div class="col-md-8" id="top-box">
	<button class="btn btn-primary btn-lg stack" id="back"><i class="fa fa-arrow-left"></i><?php echo anchor('Products/create/'.$product_id,' Back');?></button> 
</div>
<div class="col-md-8">
	<div class="panel image_pan">
		<?php 
			if (isset($error)){
				foreach($error as $fault){
					echo $fault;
				}
			}
		?>
		<table class="table image-upload_tbl no-footer">
			<thead>
				<tr role="row">
					<th class="image_col">Image</th>
					<th >Current Image</th>
					<th >Upload Image</th>
					<th ></th>
				</tr>	
			</thead>
			<tbody>
				<tr>
					<td data-label="Image" class="image_col" >Image 1 </td>
					<td data-label="Current Image"><img style="width:75px;height:90px;" src="<?php echo $main_image_path; ?>"></td>
					<?php echo form_open_multipart('Products/do_upload/'.$product_id);?>
						<td class="upload_img_row" data-label="Upload Image"><input class="input-file" type="file" name="userfile" size="5"/></td>
						<td data-label=" "><button class="btn btn-primary btn-md stack"><?php echo form_submit('submit', 'Update'); ?><i class="fa fa-floppy-o"></i></button></td>
					</form>
				</tr>
				<tr>
					<td data-label="Image" class="image_col">Image 2 </td>
					<td data-label="Current Image"><img style="width:75px;height:90px;" src="<?php echo $main_image1_path; ?>"></td>
					<?php echo form_open_multipart('Products/do_upload1/'.$product_id);?>
						<td  class="upload_img_row"data-label="Upload Image"><input  class="input-file" type="file" name="userfile" size="5"/></td>
						<td data-label=" "><button class="btn btn-primary btn-md stack"><?php echo form_submit('submit', 'Update'); ?><i class="fa fa-floppy-o"></i></button></td>
					</form>
				</tr>
				<tr>
					<td data-label="Image" class="image_col">Image 3 </td>
					<td data-label="Current Image"><img style="width:75px;height:90px;" src="<?php echo $main_image2_path; ?>"></td>
					<?php echo form_open_multipart('Products/do_upload2/'.$product_id);?>
						<td class="upload_img_row" data-label="Upload Image"><input class="input-file" type="file" name="userfile" size="5"/></td>
						<td data-label=" "><button class="btn btn-primary btn-md stack"><?php echo form_submit('submit', 'Update'); ?><i class="fa fa-floppy-o"></i></button></td>
					</form>
				</tr>
				<tr>
					<td data-label="Image" class="image_col">Image 4 </td>
					<td data-label="Current Image"><img style="width:75px;height:90px;" src="<?php echo $main_image3_path; ?>"></td>
					<?php echo form_open_multipart('Products/do_upload3/'.$product_id);?>
						<td class="upload_img_row" data-label="Upload Image"><input class="input-file" type="file" name="userfile" size="5"/></td>
						<td data-label=" "><button class="btn btn-primary btn-md stack"><?php echo form_submit('submit', 'Update'); ?><i class="fa fa-floppy-o"></i></button></td>

					</form>
				</tr>
			</tbody>
		</table>
	</div>
</div>