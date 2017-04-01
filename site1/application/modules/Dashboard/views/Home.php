<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container-fluid dashboard">
	<div class="row">
	<section>
	    <div class="col-md-12" id="top-box">
	        <div class="col-lg-3  col-sm-6">
	            <div class="info-box">
					<span class="info-box-icon bg-blue"><i class="fa fa-archive"></i></span>
					<div class="info-box-content">
	 					<span class="info-box-text">Total Products:</span>
	  					<span class="info-box-number"><?php echo Modules::run('Dashboard/count_all_products');?></span>
					</div>
				</div>
			</div>
			<div class="col-lg-3  col-sm-6">
            	<div class="info-box">
					<span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
					<div class="info-box-content">
	 					<span class="info-box-text">Total Orders:</span>
	  					<span class="info-box-number"><?php echo Modules::run('Dashboard/count_all_orders');?></small></span>
					</div>
				</div>
			</div>
			<div class="col-lg-3  col-sm-6">
            	<div class="info-box">
					<span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
					<div class="info-box-content">
	 					<span class="info-box-text">Customers:</span>
	  					<span class="info-box-number"><?php echo Modules::run('Dashboard/count_all_customers');?></span>
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
    </section>
    </div>
	<section class="top-dashboard">
		<div class="col-md-12" id="dashboard-topbar">
			<div class="panel panel-default">
			<div class="panel-heading">	Welcome <?php echo $this->session->userdata('admin_user_name')?></div>
				<div class="panel-body">
					<div class="col-md-4">
					<?php echo Modules::run('Charts/stacked_bar');?>
				  	</div>
				  	 <div class="col-md-8">
				  	 	<?php echo Modules::run('Charts/monthly_sales_chart');?>
				  
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="col-lg-4 col-md-4">
			<div class="panel panel-default">
			<div class="panel-heading">Useful Links</div>
			 	 <div class="panelN" id="">
                    <div class="list-group">
                        <?php echo anchor('Products/manage','Manage Products','class="list-group-item"'); ?>
                    	<?php echo anchor('Product_categories/manage','Manage Categories','class="list-group-item"'); ?>
                    	<?php echo anchor('Orders/manage','Manage Orders','class="list-group-item"'); ?>
                    	<?php echo anchor('Customer_account/manage','View Customers','class="list-group-item"'); ?>
                    	<?php echo anchor('Shipping','Manage Shipping','class="list-group-item"'); ?>
               		</div>
                </div>
			</div>
		</div>
		<div class="col-lg-4 col-md-4" >
			<div class="panel panel-default">
			  <div class="panel-heading">Latest 10 Orders</div>
			 <div class="panel-body">
			  	<table class="table dashboard_orders_tbl table-striped table-bordered dataTable no-footer">
					<thead>
						<tr role="row">
							<th class="hide_this">Order ID</th>
							<th>Customer Name</th>
							<th>Subtotal</th>
						</tr>	
					</thead>
					<tbody>
					<?php 
						$count = 0;
						foreach($query->result() as $row){
						$count++;
					?>
						<tr>
							<td class="hide_this"><?php echo $row->order_id; ?></td>
							<td><?php echo $row->customer_name; ?></td>
							<td><?php echo '£' . $row->subtotal; ?></td>
						</tr>
						<?php 
						}
					?>
					</tbody>
					
				</table>
				</br>
				<button class="btn btn-primary btn-lg stack" id="add_product"><?php echo anchor('Orders/manage','View All Orders '); ?> <i class="fa fa-plus-square"></i></button>

			  </div>
			</div>
		</div>
		<div class="col-lg-4 col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Order Status</div>
			    <div class="panel-body">
			    <div class="pop_div">
			  <?php echo Modules::run('Charts/donut_chart');?>
			  </div>
			    </div>
			</div>
		</div>
	</section>


