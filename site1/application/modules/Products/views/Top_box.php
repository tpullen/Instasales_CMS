<?php $count = 0;
    foreach($query->result() as $row){
        $count++;
    }
?>
<div class="col-md-12" id="top-box">
    <div class="col-lg-3  col-sm-6">
        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-archive"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Products:</span>
                <span class="info-box-number"><?php echo $count; ?></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3  col-sm-6">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Products Added Today:</span>
                <span class="info-box-number"><?php echo Modules::run('Products/count_date_added');?></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3  col-sm-6">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Active Products:</span>
                <span class="info-box-number"><?php echo Modules::run('Products/count_all_in_of_stock');?></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3  col-sm-6">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Out Of Stock Products:</span>
                <span class="info-box-number"><?php echo Modules::run('Products/count_all_out_of_stock');?></span>
            </div>
        </div>
    </div>
</div>


