	<div class="container-wrap" id ="top-bar">
		<div class="container">
			<a href="<?php echo base_url().'Products/'; ?>" class="logo">
				<img src="http://instasales.co.uk/assets/images/logo.png" alt="Instasales Logo">
			</a>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            	<span class="sr-only">Toggle navigation</span>
	            	<i class="fa fa-bars fa-white"></i>
	            </button>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li>
						<a href="<?php echo base_url().'Products/'; ?>">Home</a>
					</li>
					<?php echo Modules::run('Product_categories/parent_navigation_categories'); ?>
					<?php 
					if ($this->session->userdata('user_name')):
						$customer_id = $this->session->userdata('customer_id'); ?>
						<li>					
							<?php echo ('<a href="' .base_url().'Customer_account/accountDashboard/'.$customer_id.'">Account <i class="fa fa-user"></i></a>'); ?>
						</li>
						<li>
							<?php echo anchor('Customer_account/customer_logout','Logout');?>
							<?php else:?>
						</li>
						<li>
							<?php echo anchor('Customer_account/customer_login','Login / Sign Up');?>
						</li>
					<?php endif;?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle basket2" data-toggle="dropdown">My Cart <?= $this->cart->total_items(); ?> <i class="fa fa-shopping-cart"> </i> <b class="caret"> </b></a>
						<ul class="dropdown-menu">
							<li><?php
									$url_cart	 = 'My Cart ';
									$url_cart	.=$this->cart->total_items().'';
								?>
								<?php if ($this->cart->total_items() > 0): ?>
									<?= anchor('Cart/',$url_cart); ?>
								<?php endif ;?>					
							</li>
							<li><?php
									$url_order	 = 'Check Out';
									$url_order	.=' <i class="fa fa-shopping-cart"></i></a>';
								?>
								<?php if ($this->cart->total_items()!=0):?>
									<?= anchor('Orders',$url_order); ?>
								<?php else:?>
									<?= anchor('Products/','No Items!'); ?>
								<?php endif ;?>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>	
	</div>
	<div class="visible-tablet visible-phone header-block"></div>