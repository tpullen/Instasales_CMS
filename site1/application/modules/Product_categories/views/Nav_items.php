<?php foreach($q->result() as $row){	
?>
<li> <a href="/Products/FilteredList/<?php echo $row->category_id ;?>"><?php echo $row->category_name ;?> </a></li>
<?php 
} ?>

