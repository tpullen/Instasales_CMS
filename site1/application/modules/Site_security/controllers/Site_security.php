<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_security extends MX_Controller {

	function __construct(){
		parent::__construct();
	}

	/*Checks the session to check if user is logged in as admin */
	function check_is_admin(){
		$user_id = $this->session->userdata('user_id');
		if(!isset($user_id)){
			redirect('Users/login');
		}
	}

	/* Checks the session to check the customer is logged in */
	function check_is_logged_in(){
		$customer_id = $this->session->userdata('customer_id');
		if(!isset($customer_id)){
			redirect('Customer_account/customer_login');
		}
	}

	/* Hashs passwords to make them secure in sha1 format */
	function hash($password){
		$secure_password = sha1($password);
		return $secure_password;
	}

}