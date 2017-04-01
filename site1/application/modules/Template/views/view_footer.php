			<div class="footer-container">
				<div class="container">
					<div class="contact-content">
						<div class="links">
						<ul class="no-bullets">
								<li><a href="<?php echo base_url().'Products/'; ?>">Home</a></li>
								<?php echo Modules::run('Product_categories/parent_navigation_categories'); ?>
								<?php 
									if ($this->session->userdata('user_name')):
										$customer_id = $this->session->userdata('customer_id'); ?>					
										<?php echo ('<a href="' .base_url().'Customer_account/accountDashboard/'.$customer_id.'">My Account</a>'); ?>
										<?php else:
									endif;
								?>
								<li><a href="<?php echo base_url().'Cart/'; ?>">My Cart</a></li>
							</ul>
						</div> 
						<div class="address">
							<span>University of Kent, Canterbury, Kent, United Kingdom, CT2 7NZ,  Tel: +44 (0)1227 764000</span>
						</div>
						<div class="copyright">
							<span>©2016 instasales.co.uk Ltd</span>
							<span>All rights reserved</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

	<!-- Bootstrap JS -->
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo base_url();?>assets/js/boostrap/bootstrap.min.js"></script>

	<!-- JS -->
	<script src="<?php echo base_url();?>assets/js/frontend/jPages.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/frontend/main.js"></script>

</html>