<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Shipping extends MX_Controller
{

	function __construct() {
		parent::__construct();
	}

	/* Sets the index page to be the update function */
	function index(){
		$this-> Update();
	}

	/* Calls the get function to get all rows from shipping table by id then passes data into the display dropdown view */ 
	function _display_dropdown(){
		$data['query'] = $this-> get('id');
		$this->load->view('Display_dropdown', $data);
	}

	/* Calls the get function to get all rows fro shipping and by id then pass into Current_options view */
	function _display_options(){
		Modules::run('Site_security/check_is_admin');
		$data['query'] = $this-> get('id');
		$this->load->view('Current_options', $data);
	}

	/* Takes the value from url segment 4 and assign it to shipping_id variable then calls the delete function and redirects to Update page */
	function remove($update_id){
		Modules::run('Site_security/check_is_admin');
		$shipping_id = $this->uri->segment(4);
		$this->_delete($update_id);
		redirect('Shipping/Update/'.$shipping_id);
	}

	/* Takes vlaue from post if not empty then inserts shippong type and cost into database
	   Loads update view inside the admin template view. */
	function Update(){
		Modules::run('Site_security/check_is_admin');
		$submit = $this->input->post('submit', TRUE);
		$shipping_type = trim($this->input->post('shipping_type', TRUE));
		$cost = trim($this->input->post('cost', TRUE));
		if(($submit=="Submit") && ($shipping_type!=="")&& ($cost!=="")){
			$data['shipping_type'] = $shipping_type;
			$data['cost'] = $cost;
			$this->_insert($data);
		}
		$template = "Admin";
		$current_url = current_url();
		$data['form_location'] = $current_url;
	    $data['view_file'] = "Update";
	    $this->load->module('Template');
	    $this->load->template->$template($data);
	}

	/* Calls the get function in Mdl_shipping */
	function get($order_by) {
		$this->load->model('Mdl_shipping');
		$query = $this->Mdl_shipping->get($order_by);
		return $query;
	}

	/* Calls the _insert function in Mdl_shipping */
	function _insert($data) {
		$this->load->model('Mdl_shipping');
		$this->Mdl_shipping->_insert($data);
	}
	
	/* Calls the get function in Mdl_shipping */
	function _delete($id) {
		$this->load->model('Mdl_shipping');
		$this->Mdl_shipping->_delete($id);
	}

}