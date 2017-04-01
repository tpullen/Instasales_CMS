<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends MX_Controller{

	function __construct(){
		parent::__construct();
	}
	/*  Load view by default */
	function index(){
		$this->view();
	}

	/* 	Using $order_id as a parameter
		Run _update function to assign 'Cancelled' to the 'status' field of orders table
		Send a notification email by running the ordered_cancelled_customer method in the email module
		Then Redirect to order_dashboard
	*/
	function cancel_order($order_id){
		$data['status'] = 'Cancelled';
		$this->_update($order_id, $data);
		echo Modules::run('Email/order_cancelled_customer');
		redirect('Orders/Order_dashboard');
	}

	/*  Using the customer_id stored in the session run the get_where_custom_alt function and store in $data
		Load the order_dashboard view with in the Frontend Template with $data and $customer_id as parameters
	*/
	function Order_dashboard(){
		$customer_id = $this->session->userdata('customer_id');
		$data['query'] = $this->get_where_custom_alt('customer_id',$customer_id);
		$template = "Frontend";
		$data['view_file'] = "Order_dashboard";
		$this->load->module('Template');
		$this->template->$template($data, $customer_id);
	}

	/*  Get all order items with order with id of $order_id 
		Load the view of cust_order_details with in the template of Frontend with a parameter of $data 
	*/
	function cust_order_details($order_id){
		$customer_id = $this->session->userdata('customer_id');
		$data['query'] = $this->_custom_query('SELECT * FROM `order_items` INNER JOIN `products` ON `order_items`.`product_id` = `products`.`id` WHERE `order_items`.`order_id` = '.$order_id);
		$template = "Frontend";
		$data['view_file'] = "Cust_order_details";
		$current_url = current_url();
		$data['form_location'] = $current_url;
    	$this->load->module('Template');
    	$this->load->template->$template($data);		
	}

	/*	Gets the order id from the url segment 3, upon submit of the form in Order_details_options,
		Either the status of the order will be change to Cancelled or dispatched depending on which submit is clicked
		The user customer will then be emailed accordingly
	*/
	function _order_details_options(){	
		$this->load->view('Order_details_options');
		$order_id= $this->uri->segment(3);
		$submit = $this->input->post('submit', TRUE);
	
		if($submit=="Cancel Order" && 'status' != 'Cancelled'){
			$data['status'] = 'Cancelled';
			$this->_update($order_id, $data);
			echo Modules::run('Email/order_cancelled');
			redirect('Orders/manage');
			}

		if($submit=="Order Dispatched"){
			$data['status'] = 'Dispatched';
			$this->_update($order_id, $data);
		
			echo Modules::run('Email/order_dispatched');
			redirect('Orders/manage');
		}
	}

	/*	Load the order_table view with all orders from orders and order by order_id  */
	function _display_orders_table(){
		$data['query'] = $this->get('order_id');
		$this->load->view('Orders_table', $data);
	}

	/*  Load into the Order_status_details view, the value of 'status' for the order with the order_id of url segment 3 */
	function _order_status_details(){
		$order_id= $this->uri->segment(3);
		$query = $this->get_where2($order_id);
		foreach ($query->result() as $row) {
			$data['status'] = $row->status;
		}
		$this->load->view('Order_status_details', $data);
	}

	/*  Load into the Order_customer_details view, the customer details for the order with the customer_id of url segment 4 */
	function _order_customer_details(){
		$customer_id = $this->uri->segment(4);
		$data['query'] = $this->get_where($customer_id);
		$this->load->view('Order_customer_details', $data);
	}

	/*	Load the order with the order_id of $order_id into the template of Admin with the view as Order_details */
	function order_details($order_id){
		$data['query'] = $this->get_where_alt($order_id);
		$template = "Admin";
		$data['view_file'] = "Order_details";
		$current_url = current_url();
		$data['form_location'] = $current_url;
    	$this->load->module('Template');
    	$this->load->template->$template($data); 		
	}		

	/*  Load the Admin template with the view of Manage */
	function manage(){	
    	$template = "Admin";
    	$data['view_file'] = "Manage";
    	$this->load->module('Template');
    	$this->load->template->$template($data);    
    }

    /* Forces the customer to be logged in before progressing any further
       Gets the customer_id from the session and uses this to get the rest of the customer data
       Loads the data into the Order view which is loaded into the frontend template
    */
	function view(){
		$customer_id = $this->session->userdata('customer_id');
		if(!isset($customer_id)){
			redirect('Customer_account/customer_login');
		}
		$query = $this->get_where($customer_id);
		foreach ($query->result() as $row) {
			$data['first_name'] = $row->first_name;
			$data['sur_name'] = $row->sur_name;
			$data['address_1'] = $row->address_1;
			$data['address_2'] = $row->address_2;
			$data['town'] = $row->town;
			$data['county'] = $row->county;
			$data['country'] = $row->country;
			$data['postcode'] = $row->postcode;
			$data['card_type'] = $row->card_type;
			$data['card_number'] = $row->card_number;
			$data['expiry_date'] = $row->expiry_date;
			$data['security_code'] = $row->security_code;
		}
		$template = "Frontend";
		$data['view_file'] = "Order";
		$this->load->module('Template');
		$this->load->template->$template($data);	
	}

	/* Processes the order and added relevant data to the database */
	function process(){
		// Assign date and time to a variable
		$date = date("Y-m-d");
		// Assign the value of the shipping select to a variable
		$shipping_cost = $this->input->post('Shipping');
		// Get total cost of all items in the cart and assign to a variable
		$cart_total = $this->cart->total();		
		// Get customer name and id from session and assign to variables 
		$customer_id = $this->session->userdata('customer_id');
		$customer_name = $this->session->userdata('customer_name');
		// Get all customer data and assign to variables based on customer id
		$query = $this->get_where($customer_id);
		foreach ($query->result() as $row) {
			$v_first_name = $row->first_name;
			$v_sur_name = $row->sur_name;
			$v_address_1 = $row->address_1;
			$v_address_2 = $row->address_2;
			$v_town = $row->town;
			$v_county = $row->county;
			$v_country = $row->country;
			$v_postcode = $row->postcode;
			$v_card_type = $row->card_type;
			$v_card_number = $row->card_number;
			$v_expiry_date = $row->expiry_date;
			$v_security_code = $row->security_code;

			// If any of these fields are empty the redirect the user to account dashboard as they do not have complete account infromation
			if(empty($v_first_name) || empty($v_sur_name) || empty($v_address_1) || empty($v_town) || empty($v_county) || empty($v_postcode) || empty($v_card_type) || empty($v_card_number) || empty($v_expiry_date) || empty($v_security_code) || empty($v_country) ){
				redirect('Customer_account/accountDashboard/'.$customer_id);		
			}
		}
		// Call insert function with the data bellow as the parameter
		$data = array(
			'date'				=> $date,
			'customer_id'		=> $customer_id,
			'customer_name'		=> $customer_name,
			'subtotal'			=> $shipping_cost + $cart_total,
			'status'			=> 'Pending',
			'shipping'			=> $shipping_cost
		);
		$this->_insert($data);
		// Where each variable maches with its corresponding column in the order table (to ensure its the correct id), get order_id and assign it to a variable
		$query = $this->get_where_custom_alt('customer_id', $customer_id, 'date', $date, 'subtotal', $cart_total);
		foreach($query->result() as $row){
			$order_id = $row->order_id;
		}
		// For every item in the cart
		foreach ($this->cart->contents() as $items) {
			$option = "";
			// Concatenates each product option together, per product and stores in $option
			foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) {
				$option = $option . $option_name . ": " . $option_value . " ";
			}
			// Store required data in an array $data
			$data = array(
				'order_id'			=> $order_id,
				'product_id'		=> $items['id'],
				'quantity'			=> $items['qty'],
				'price'				=> $items['price'],
				'product_name'		=> $items['name'],
				'options'			=> $option
			);
			// Insert $data array into order_items
			$this->_insert_alt($data);

		}
		// Destroy the cart session as the order has now been processed
		$this->cart->destroy();
		// Send order confirmed email via function bellow
		echo Modules::run('Email/order_confirmed');
		// Load function bellow to take user to thier order history section
		$this->Order_dashboard($customer_id);
	}

	/* Calls get from 'Mdl_orders' */
	function get($order_by){
		$this->load->model('Mdl_orders');
		$query = $this->Mdl_orders->get($order_by);
		return $query;
	}

	/* Calls get_where from 'Mdl_orders' */
	function get_where($customer_id){
		$this->load->model('Mdl_orders');
		$query = $this->Mdl_orders->get_where($customer_id);
		return $query;
	}

	/* Calls get_where2 from 'Mdl_orders' */
	function get_where2($order_id){
		$this->load->model('Mdl_orders');
		$query = $this->Mdl_orders->get_where2($order_id);
		return $query;
	}

	/* Calls get_where_alt from 'Mdl_orders' */
	function get_where_alt($order_id){
		$this->load->model('Mdl_orders');
		$query = $this->Mdl_orders->get_where_alt($order_id);
		return $query;
	}

	/* Calls get_where_custom_alt from 'Mdl_orders' */
	function get_where_custom_alt($col, $value){
		$this->load->model('Mdl_orders');
		$query = $this->Mdl_orders->get_where_custom_alt($col, $value);
		return $query;
	}

	/* Calls _insert from 'Mdl_orders' */
	function _insert($data){
		$this->load->model('Mdl_orders');
		$this->Mdl_orders->_insert($data);
	}

	/* Calls _insert_alt from 'Mdl_orders' */
	function _insert_alt($data){
		$this->load->model('Mdl_orders');
		$this->Mdl_orders->_insert_alt($data);
	}

	/* Calls _update from 'Mdl_orders' */
	function _update($id, $data){
		$this->load->model('Mdl_orders');
		$this->Mdl_orders->_update($id, $data);
	}

	/* Calls _custom_query from 'Mdl_orders' */
	function _custom_query($mysql_query){
		$this->load->model('Mdl_orders');
		$query = $this->Mdl_orders->_custom_query($mysql_query);
		return $query;
	}

}