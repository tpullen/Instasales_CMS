<?php $currency = Modules::run('Site_settings/get_currency'); ?>
	<select name="Shipping" id="shipping" class="shipping form-control" required>
		<?php foreach($query->result() as $row){	
			echo '<option value="'.$row->cost.'">'.$row->shipping_type.' '.$currency.$row->cost.'<span  class="hidden"></span></option>';
		} ?>
	</select>

