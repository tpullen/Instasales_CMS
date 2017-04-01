
	<select name="Colour" class="product-color" required>
		<?php foreach($query->result() as $row){	
			echo '<option value="'.$row->product_colour.'">'.$row->product_colour.'</option>';
		} ?>
	</select>