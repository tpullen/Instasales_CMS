	<select name="Weight" class="product-weight" required>
		<?php
			foreach($query->result() as $row){	
				echo '<option value="'.$row->product_weight.'">'.$row->product_weight.'</option>';
			}
		?>
	</select>

