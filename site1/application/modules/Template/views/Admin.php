	<?php $this->load->view('backend-header'); ?>
	<body>
		<?php 
			if (!isset($module)){
				$module = $this->uri->segment(1);
			}
			if (!isset($view_file)){
				$view_file = $this->uri->segment(2);
			}
			if (($module!="") && ($view_file!="")){
				$path = $module."/".$view_file;
				$this->load->view($path);
			}
		?>
	
	</body>
	<?php $this->load->view('backend-footer'); ?>

