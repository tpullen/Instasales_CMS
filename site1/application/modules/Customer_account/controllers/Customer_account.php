<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Customer_Account extends MX_Controller
{

	function __construct() {
	parent::__construct();
	}

	/* Function loads customers table and allows the data to be shown on the view */
	function _display_customers_table(){    
			$data['query'] = $this->get('sur_name');
			$this->load->view('customers_table', $data);
	}

	/* Loads the Admin view and puts the manage view inside the admin view*/
	function manage(){	
	    $template = "Admin";
	    $data['headline'] = "Current Customers";
	    $data['view_file'] = "manage";
	    $this->load->module('Template');
	    $this->load->template->$template($data);
	    
	}

	/* Gets data from customers table and sets data as a row which loads into the account dashboard view */
	function accountDashboard($customer_id){
		Modules::run('Site_security/check_is_logged_in');
		$query = $this->get_where($customer_id);
		foreach($query->result() as $row){
			$data['user_name'] = $row->user_name;
			$data['password'] = $row->password;
			$data['first_name'] = $row->first_name;
			$data['sur_name'] = $row->sur_name;
			$data['address_1'] = $row->address_1;
			$data['address_2'] = $row->address_2;
			$data['town'] = $row->town;
			$data['county'] = $row->county;
			$data['country'] = $row->country;
			$data['postcode'] = $row->postcode;
			$data['email_address'] = $row->email_address;
			$data['card_type'] = $row->card_type;
			$data['card_number'] = $row->card_number;
			$data['expiry_date'] = $row->expiry_date;
			$data['security_code'] = $row->security_code;
			$data['customer_id'] = $customer_id;
		}
		$template = "Frontend";
		$data['view_file'] = "accountDashboard";
		$this->load->module('Template');
		$this->template->$template($data);
	}

	/* Stops the session when a customer logs out */
	public function customer_logout(){
		$this->session->sess_destroy();
		$this->customer_login();
	}

	/* Loads the frontend template and loads the login form inside the template */
	function customer_login(){
		$template = "Frontend";
		$data['view_file'] = "loginformFrontEnd";
		$this->load->module('Template');
		$this->template->$template($data);	
	}

	/* Gets login values where they are a row and sets it as variable, it then sets a session on the site inserting the login values */
	function customer_doLogin($username){
		$query = $this->get_where_custom('user_name', $username);
		foreach($query->result() as $row){
			$customer_id = $row->customer_id;
			$first_name = $row->first_name;
			$sur_name = $row->sur_name;
		}
		$this->session->set_userdata('customer_id', $customer_id);
		$this->session->set_userdata('user_name', $username);
		$this->session->set_userdata('customer_name', $first_name . ' ' . $sur_name);
		redirect('Customer_account/accountDashboard/' .$customer_id);
	}

	/* Checks that login credentials match the database values and that both have been input, if not then redirects to login page*/
	function customer_submit(){
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'callback_customer_password_check|required');
		if ($this->form_validation->run($this) == FALSE){
			$this->customer_login();
		}
		else
		{
			$username = $this->input->post('user_name', TRUE);
			$this->customer_doLogin($username);
		}
	}

	/* Checks that  password is correct when logging in and tells user if username or password is incorrect, loads model customer acount if successful*/
	function customer_password_check($password){
		$username = $this->input->post('user_name', TRUE);
		$this->load->model('Mdl_cust_account');
		$result = $this->Mdl_cust_account->customer_password_check($username, $password);
		if ($result == FALSE){
			$this->form_validation->set_message('customer_password_check', 'Incorrect Password or Username');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	/* Loads frontent template and inserts view file register front end */
	function register(){
		$template = "Frontend";
		$data['view_file'] = "registerFrontEnd";
		$this->load->module('Template');
		$this->template->$template($data);
	}

	/* Checks that inserted email is in a valid email address format,
	checks that both passwords inserted are matching, 
	inserts new user data into database and hashes the password. */
	function register_submit(){
		$this->form_validation->set_rules('emailaddress', 'Email address', 'required|is_unique[customer_details.user_name]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->register();
		}
		else{
			$username = $this->input->post('emailaddress', TRUE);
			$password = $this->input->post('password', TRUE);
			$data['user_name'] = $username;
			$secure_password = Modules::run('Site_security/hash', $password);
			$data['password'] = $secure_password;
			$data['date_registered'] = date("Y-m-d");
			$this->_insert($data);
			echo Modules::run('Email/customer_registered',$username);
			$this->customer_doLogin($username);
			}
	}

	/* Getting data from the form and posting it to the database */
	function get_data_from_post(){
		$data['user_name'] = $this->input->post('user_name',TRUE);
		$data['password'] = $this->input->post('password',TRUE);
		$data['first_name'] = $this->input->post('first_name',TRUE);
		$data['sur_name'] = $this->input->post('sur_name',TRUE);
		$data['address_1'] = $this->input->post('address_1',TRUE);
		$data['address_2'] = $this->input->post('address_2',TRUE);
		$data['town'] = $this->input->post('town',TRUE);
		$data['county'] = $this->input->post('county',TRUE);
		$data['country'] = $this->input->post('country',TRUE);
		$data['postcode'] = $this->input->post('postcode',TRUE);
		$data['email_address'] = $this->input->post('email_address',TRUE);
		$data['card_type'] = $this->input->post('card_type',TRUE);
		$data['card_number'] = $this->input->post('card_number',TRUE);
		$data['expiry_date'] = $this->input->post('expiry_date',TRUE);
		$data['security_code'] = $this->input->post('security_code',TRUE);
		return $data;
	}

	/* Getting data from the database so it can shown on the frontend */
	function get_data_from_db($update_id){
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['user_name'] = $row->user_name;
			$data['password'] = $row->password;
			$data['first_name'] = $row->first_name;
			$data['sur_name'] = $row->sur_name;
			$data['address_1'] = $row->address_1;
			$data['address_2'] = $row->address_2;
			$data['town'] = $row->town;
			$data['county'] = $row->county;
			$data['country'] = $row->country;
			$data['postcode'] = $row->postcode;
			$data['email_address'] = $row->email_address;
			$data['card_type'] = $row->card_type;
			$data['card_number'] = $row->card_number;
			$data['expiry_date'] = $row->expiry_date;
			$data['security_code'] = $row->security_code;
		}
		if(!isset($data)){
			$data = "";
		}
		return $data;
	}

	/* Allows details to be edited on the frontend */
	function editDetails($customer_id){
		Modules::run('Site_security/check_is_logged_in');
		$customer_id = $this->uri->segment(3);
		$data = $this->get_data_from_post();
		$submit = $this->input->post('submit',TRUE);
		if ($customer_id>0){
			if ($submit!="Submit") {
				$data = $this->get_data_from_db($customer_id);
			}
			$data['headline'] = "Edit";
		}
			$current_url = current_url();
			$data['form_location'] = str_replace('/editDetails','/submit', $current_url);
			$data['customer_id']= $customer_id;
			$template = "Frontend";
	    	$data['view_file'] = "editAccount";
	    	$this->load->module('Template');
	    	$this->template->$template($data);
	}


	/* Submits account changes to the database */
	function submit(){
		Modules::run('Site_security/check_is_logged_in');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('sur_name', 'Last Name', 'required');
		$this->form_validation->set_rules('address_1', 'Address 1', 'is_numeric|required');
		$this->form_validation->set_rules('address_2', 'Address 2', 'is_numeric|required');
		$this->form_validation->set_rules('town', 'Town', 'required');
		$this->form_validation->set_rules('county', 'County', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('postcode', 'Postcode', 'required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'required');
		$this->form_validation->set_rules('card_type', 'Card Type', 'is_numeric|required');
		$this->form_validation->set_rules('expiry_date', 'Expiry Date', 'is_numeric|required');
		$this->form_validation->set_rules('security_code', 'Security Code', 'is_numeric|required');
		$update_id = $this->uri->segment(3);
		$data = $this->get_data_from_post();
		$this->_update($update_id, $data);
		$value = "<p>Details Successfully Changed</p>";
		$this->session->set_userdata('customer_name', $this->input->post('first_name') . ' ' . $this->input->post('sur_name'));
		redirect('Customer_account/editDetails/'.$update_id);
	}


	function get($order_by) {
		$this->load->model('Mdl_cust_account');
		$query = $this->Mdl_cust_account->get($order_by);
		return $query;
	}


	function get_where($customer_id) {
		$this->load->model('Mdl_cust_account');
		$query = $this->Mdl_cust_account->get_where($customer_id);
		return $query;
	}


	function _insert($data) {
		$this->load->model('Mdl_cust_account');
		$this->Mdl_cust_account->_insert($data);
	}

	function _update($id, $data) {
		$this->load->model('Mdl_cust_account');
		$this->Mdl_cust_account->_update($id, $data);
	}

	/* Calls the get_where_custom in Mdl_cust_account */
	function get_where_custom($col, $value) {
		$this->load->model('Mdl_cust_account');
		$query = $this->Mdl_cust_account->get_where_custom($col, $value);
		return $query;
	}

}