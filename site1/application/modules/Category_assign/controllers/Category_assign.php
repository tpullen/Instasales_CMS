<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_assign extends MX_Controller{

	function __construct(){
		parent::__construct();
	}

	/* Unasign a category from a product */
	function remove(){
		$id = $this->uri->segment(3);
		$product_id = $this->uri->segment(4);
		$this->_delete($id);
		redirect('Category_assign/assign/'.$product_id);
	}

	/* Gets all categories that are assigned to a certain product */
	function _current_assigned_categories($product_id){
		$data['query'] = $this->get_where_custom('product_id', $product_id);
		$num_rows = $data['query']->num_rows();
		if($num_rows>0){
			$this->load->view('Assigned_categories', $data);
		}
	}

	/* Uses product id from url segment 3 to identify product
	   Loads the assign view with in the admin template
	   Once the view's form is submitted assign selected category to the product
	*/
	function assign(){
		$product_id = $this->uri->segment(3);
		$submit = $this->input->post('submit', TRUE);
		if ($submit== "Cancel"){
			redirect('Products/create/'.$product_id);
		}
		if ($submit=="Submit"){
			$data['product_id'] = $product_id;
			$data['category_id'] = $this->input->post('category_id',TRUE);
			$this->_insert($data);
		}
		$data['product_id'] = $product_id;
		$template = "Admin";
		$current_url = current_url();
		$data['form_location'] = $current_url;
		$data['view_file'] = "Assign";
		$this->load->module('Template');
		$this->load->template->$template($data);
	}

	/* Calls get_where_custom from 'Mdl_category_assign' */
	function get_where_custom($col, $value){
		$this->load->model('Mdl_category_assign');
		$query = $this->Mdl_category_assign->get_where_custom($col, $value);
		return $query;
	}

	/* Calls _insert from 'Mdl_category_assign' */
	function _insert($data){
		$this->load->model('Mdl_category_assign');
		$this->Mdl_category_assign->_insert($data);
	}

	/* Calls _delete from 'Mdl_category_assign' */
	function _delete($id){
		$this->load->model('Mdl_category_assign');
		$this->Mdl_category_assign->_delete($id);
	}

}