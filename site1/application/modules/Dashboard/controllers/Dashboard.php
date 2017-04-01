<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	function __construct(){
		parent::__construct();
		Modules::run('Site_security/check_is_admin');
	}

	function index(){
		$this->home();
	}

	/* Gets latest 10 orders by calling the get_with_limit function and loads the result into the Home view within Admin template */
	function home(){ 	
		$data['query'] = $this->get_with_limit('10','0','date');
    	$template = "Admin";
    	$data['view_file'] = "Home";
    	$this->load->module('Template');
    	$this->template->$template($data);
	}

	/* Counts number of rows in products table */
	function count_all_products(){
		$query = $this->db->query('SELECT * FROM products');
		echo $query->num_rows();
	}

	/* Counts number of rows in orders table */
	function count_all_orders(){
		$query = $this->db->query('SELECT * FROM orders');
		echo $query->num_rows();
	}
	/* Counts number of rows in customer_details table */
	function count_all_customers(){
		$query = $this->db->query('SELECT * FROM customer_details');
		echo $query->num_rows();
	}

	/* Calls the get function in Mdl_dashboard */
	function get($order_by) {
		$this->load->model('Mdl_dashboard');
		$query = $this->Mdl_dashboard->get($order_by);
		return $query;
	}

	/* Calls the get_with_limits function in Mdl_dashboard */
	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('Mdl_dashboard');
		$query = $this->Mdl_dashboard->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

}
