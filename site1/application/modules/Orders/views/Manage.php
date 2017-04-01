<?php 
    if (isset($flash)){
        echo $flash;
    }    
?>
<div class="col-md-12">
	<h2>Current Orders</h2>
    <?php 
        echo Modules::run('Orders/_display_top_box');
    ?>
</div>
<?php 
    echo Modules::run('Orders/_display_orders_table');
?>
