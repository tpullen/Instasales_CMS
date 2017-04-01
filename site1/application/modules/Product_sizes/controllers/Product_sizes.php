<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Product_sizes extends MX_Controller
{

	function __construct() {
		parent::__construct();
	}

	/* Sets the index page to be the Update function */
	function index(){
			$this-> Update();
	}

	/* Calls the get_where_custom function to get all rows from product_sizes table where product_id then passes 
	   data into the display dropdown view */ 
	function _display_dropdown($product_id){
		$data['query'] = $this-> get_where_custom('product_id',$product_id);
		$this->load->view('Display_dropdown', $data);
	}

	/* Calls the get_where_custom function to get all rows from product_sizes table where product_id then passes into display_options view */
	function _display_options($product_id){
		$data['query'] = $this-> get_where_custom('product_id',$product_id);
		$this->load->view('Current_options', $data);
	}

	/* Takes the value from url segment 4 and assign it to update_id variable then calls the delete function and redirects to Update page */
	function remove($update_id){
		Modules::run('Site_security/check_is_admin');
		$product_id = $this->uri->segment(4);
		$this->_delete($update_id);
		redirect('Product_sizes/update/'.$product_id);
	}

	/* Takes value from post if not empty, then inserts product_sizes into database
	   Loads update view inside the admin template view. */
	function Update($product_id){
		$submit = $this->input->post('submit', TRUE);
		$product_size = trim($this->input->post('product_size', TRUE));
		if($submit=="Cancel"){
			redirect('Products/Create/'.$product_id);
		}
		if(($submit=="Submit") && ($product_size!=="")){
			$data['product_id'] = $product_id;
			$data['product_size'] = $product_size;
			$this->_insert($data);
		}
		$data['product_id'] = $product_id;
		$template = "Admin";
		$current_url = current_url();
		$data['form_location'] = $current_url;
	    $data['view_file'] = "Update";
	    $this->load->module('Template');
	    $this->load->template->$template($data);
	}

	/* Calls the get_where_custom in Mdl_product_sizes */
	function get_where_custom($col, $value) {
		$this->load->model('Mdl_product_sizes');
		$query = $this->Mdl_product_sizes->get_where_custom($col, $value);
		return $query;
	}

	/* Calls the _insert in Mdl_product_sizes */
	function _insert($data) {
		$this->load->model('Mdl_product_sizes');
		$this->Mdl_product_sizes->_insert($data);
	}

	/* Calls the _delete in Mdl_product_sizes */
	function _delete($id) {
		$this->load->model('Mdl_product_sizes');
		$this->Mdl_product_sizes->_delete($id);
	}

}