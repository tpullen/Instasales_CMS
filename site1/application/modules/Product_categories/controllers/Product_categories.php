<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Product_categories extends MX_Controller
{

	function __construct() {
		parent::__construct();
	}

	/*Loads manage by default */
	function index(){
		$this-> manage();
	}

	/* Get parent category where it equals 0 and load nav items view */
	function parent_navigation_categories() {
		$data['q'] = $this->get_where_custom('parent_category', '0');
		$this->load->view('Nav_items', $data);
	}

	/* Gets parent cateogry if not prints out parent category in reverse */
	function get_breadcrumb($category_id){
		$breadcrumb = "";
		do{
			if(!isset($parent_category)){
				$parent_category = $category_id;
			}
			$parent_category = $this->get_parent_category($parent_category);
			if($parent_category>0){
				 $parents[] = $parent_category;
			}
		}while ($parent_category!=="");
		if(isset($parents)){
			$parents = array_reverse($parents);
			foreach($parents as $parent){
				$category_name = $this->get_category_name($parent);
				$breadcrumb.= $category_name." > ";
			}
		}
		return $breadcrumb;
	}
	
	/* Get category name and for each result set its values as rows. Set categories as an array. If no catogries found then return blank.
	   If categories are found then return categories. */
	function get_end_of_line_categories(){
		$query = $this->get('category_name');
		foreach($query->result() as $row){
			$category_id = $row->category_id;
			$parent_category = $row->parent_category;
			$category_depth = $this->get_category_depth($parent_category);
			$categories[] = $category_id;
		}
			if(!isset($categories)){
			$categories = "";
		}
		return $categories;
	} 

	/* Set current_depth as variable of parent_category.
	   If current depth is less than max depth then return true
	   If current depth is greater than max depth return fals */
	function _restrict_category($parent_category){
		$max_depth = Modules::run('Site_settings/get_max_category_depth');
		$current_depth = $this->get_category_depth($parent_category);
		if($current_depth<$max_depth){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/* Set depth to 0
	   Increment depth by 1 and set parent category as a variable whilst parent category has no value.
	   Return depth */
	function get_category_depth($parent_category){
	$depth = 0;
		do {
			$depth++;
			$parent_category = $this->get_parent_category($parent_category);
		} while ($parent_category!=="");
	return $depth;
	}

	/* Gets parent category if its not 1 then sets to blank to stop erroring */
	function get_parent_category($id){
		$query = $this->get_where($id);
		foreach ($query->result() as $row) {
			$parent_category = $row->parent_category;
		}
		if(!isset($parent_category)){
			$parent_category = "";
		}
		return $parent_category;
	}

	/* Gets data from database and set category name as a variable and returns the value */
	function get_category_name($id){
		$data = $this->get_data_from_db($id);
		$category_name = $data['category_name'];
		return $category_name;
	}

	/* Displays the category table in the catergories table view */
	function _display_categories_table($parent_category){
		$data['query'] = $this->get_where_custom('parent_category', $parent_category);
		$this->load->view('Categories_table', $data);
	}

	/* If submit button is pressed then it deletes product category */
	function delete_category($update_id){
		$submit = $this->input->post('submit', TRUE);
		if ($submit=="Cancel Deletion"){
			redirect('Product_categories/create/'.$update_id);
		}
		if ($submit=="Confirm Deletion"){
			$this->_delete($update_id);
			$value = "<p>Category Successfully Deleted </p>";
			$this->session->set_flashdata('product',$value);
			redirect('Product_categories/Manage');
		}
		$data['update_id'] = $update_id;
		$template = "Admin";
		$current_url = current_url();
		$data['form_location'] = $current_url;
		$data['view_file'] = "Delete_conf";
		$this->load->module('Template');
		$this->load->template->$template($data);
	}


	/* Creates a new cateogory by if category id is greater than 0 then a current category is being updated
	If category ID is not greater than 0 then a new category is being created */
	function create(){
		$category_id = $this->uri->segment(3);
		$data = $this->get_data_from_post();
		$submit = $this->input->post('submit',TRUE);
		if ($category_id>0){
			if ($submit!="Submit") {
				$data = $this->get_data_from_db($category_id);
			}
			$data['headline'] = "Edit Category";
		} else{
			$data['headline'] = "Create New Category";
		}
		$current_url = current_url();
		$data['form_location'] = str_replace('/create','/submit', $current_url);
		$flash = $this->session->flashdata('product');
		if($flash!=""){
			$data['flash'] = $flash;
		}
		$data['category_id']= $category_id;
		$template = "Admin";
		$data['view_file'] = "Create";
		$this->load->module('Template');
		$this->template->$template($data);
	}

	/* Showing data on the backend*/
	function get_data_from_post(){
		$data['category_name'] = $this->input->post('category_name',TRUE);
		return $data;
	}

	/* Retrieving data from the database*/
	function get_data_from_db($update_id){
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['category_name'] = $row->category_name;
		}
		if(!isset($data)){
			$data = "";
		}
		return $data;
	}

	/* Gets parent cateogry from url if its not numeric sets to 0,
	   form validation category name required
	   if form validation fails go back to create view
	   If form validates correctly, it find what update_id is equal to
	   If update_id is greater than 0 then it is a current value
	   if update_id is less than 0 it is a new value   */
	function submit(){	
		$parent_category = $this->uri->segment(4);
		if(!is_numeric($parent_category)){
			$parent_category = 0;
		}
		$this->form_validation->set_rules('category_name', 'Category Name', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->create();
		}else{
			$update_id = $this->uri->segment(3);
			if($update_id>0){
				//Update
				$data = $this->get_data_from_post();
				$data['category_url'] = url_title($data['category_name']);
				$this->_update($update_id, $data);
				$value = "<p>Category Successfully Updated </p>";
				$parent_category = $update_id;
			}else{
				//Creat New
				$data = $this->get_data_from_post();
				$data['category_url'] = url_title($data['category_name']);
				$data['parent_category'] = $parent_category;
				$this->_insert($data);
				$value = "<p>Category Successfully added </p>";
				$update_id = $this->get_max();
			}
			//Flash message
			$this->session->set_flashdata('product',$value);
			redirect('Product_categories/Manage/'.$parent_category);
		}
	}

	/* Gets parent cateogry from url if its not numeric sets to 0,
		form validation category name required
		if form validation fails go back to create view
		If form validates correctly, it find what update_id is equal to
		If update_id is greater than 0 then it is a current value
		if update_id is less than 0 it is a new value   
	*/
	function manage(){	
		$template = "Admin";
		$parent_category = $this->uri->segment(3);
			if(($parent_category<1) || (!is_numeric($parent_category))){
				$parent_category = 0;
			}
		$data['parent_category'] = $parent_category;
		if($parent_category>0){
			$data['headline'] = "Manage ".$this->get_category_name($parent_category);	
		}else{
			$data['headline'] = "Manage Categories";
		}
		$flash = $this->session->flashdata('product');
		if($flash!=""){
			$data['flash'] = $flash;
		}
		$data['new_category_allowed'] = $this->_restrict_category($parent_category);
		$data['view_file'] = "Manage";
		$this->load->module('Template');
		$this->load->template->$template($data);
	}

	/* Calls get function from mdl product categories */
	function get($order_by) {
		$this->load->model('Mdl_product_categories');
		$query = $this->Mdl_product_categories->get($order_by);
		return $query;
	}

	/* Calls get where function from mdl product categories */
	function get_where($id) {
		$this->load->model('Mdl_product_categories');
		$query = $this->Mdl_product_categories->get_where($id);
		return $query;
	}

	/* Calls get_where_custom function from mdl product categories */
	function get_where_custom($col, $value) {
		$this->load->model('Mdl_product_categories');
		$query = $this->Mdl_product_categories->get_where_custom($col, $value);
		return $query;
	}

	/* Calls insert function from mdl product categories */
	function _insert($data) {
		$this->load->model('Mdl_product_categories');
		$this->Mdl_product_categories->_insert($data);
	}

	/* Calls update function from mdl product categories */
	function _update($id, $data) {
		$this->load->model('Mdl_product_categories');
		$this->Mdl_product_categories->_update($id, $data);
	}

	/* Calls delete function from mdl product categories */
	function _delete($id) {
		$this->load->model('Mdl_product_categories');
		$this->Mdl_product_categories->_delete($id);
	}

	/* Calls get max function from mdl product categories */
	function get_max() {
		$this->load->model('Mdl_product_categories');
		$max_id = $this->Mdl_product_categories->get_max();
		return $max_id;
	}
}