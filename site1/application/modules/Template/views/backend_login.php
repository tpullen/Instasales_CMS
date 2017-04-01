<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html> 
	<head>       
	    <!-- Meta --> 
	        <meta charset="utf-8">
	        <title>Login - Instasales</title>

	    <!-- CSS --> 
	        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap.min.css" />
	        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap-responsive.css" />
	        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap-reset.css" />
	        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/backend/styles.min.css" />
	        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	      
	    <!--[if lt IE 9]>
	          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
    </head> 
	<body id="backendLogin">
		<div class="container-wrap loginHeader">
			<div class="container">
				<div class="row">
					<br></br>
				</div>
			</div>
		</div>
		<div class="container-wrap loginForm">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-4">
						</div>
						<div class="col-md-4">
						<?php 
							if (!isset($view_file)){
								$view_file = "";
							}
							if (!isset($module)){
								$module = $this->uri->segment(1);
							}
							if(($view_file!="") && ($module!="")){
								$path = $module."/".$view_file;
								$this->load->view($path);
							}
						?>
						</div>
						<div class="col-md-4">
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>