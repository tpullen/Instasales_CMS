<?php 
	$num_rows = $query->num_rows();
	if($num_rows>0){
?>
	<hr>
	<div class="filtering">
	<h4>Filter by Category </h4>
	<ul class="no-bullets">
		<?php foreach($query->result() as $row){
			echo '<li class="category-filter"><a href="/Products/FilteredList/'.$row->category_id.'">'.$row->category_name.'</a></li>';
		} ?>
	</ul>
	</div>
	<hr>
<?php } ?> 