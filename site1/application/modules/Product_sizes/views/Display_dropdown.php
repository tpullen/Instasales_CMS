	<select name="Size" class="product-size" required>
		<?php foreach($query->result() as $row){	
			echo '<option value="'.$row->product_size.'">'.$row->product_size.'</option>';
		} ?>
	</select>

