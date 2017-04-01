<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

	function __construct(){
		parent::__construct();
	}

	/* Run Check_is_admin function from Site_security module to only allow backend user access to the admin view
	   Loads admin view */
	function admin($data){
		Modules::run('Site_security/check_is_admin');
		$this->load->view('Admin', $data);
	}

	/* Loads frontend view */
	function frontend($data){	
		$this->load->view('Frontend', $data);
	}
	
	/* Loads backend_login view */
	function backend_login($data){	
		$this->load->view('backend_login', $data);
	}

	/* Loads ProductListing view */
	function ProductListing($data){	
		$this->load->view('ProductListing', $data);
	}

	/* Loads FrontendLogin view */
	function Login($data){	
		$this->load->view('FrontendLogin', $data);
	}

	/* Loads FrontendLogin view */
	function FrontendLogin($data){	
		$this->load->view('FrontendLogin', $data);
	}
}