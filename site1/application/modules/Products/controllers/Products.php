<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MX_Controller {

	function __construct(){
		parent::__construct();
	}

	/* Sets the index page to be the Productlist function */
	function index(){
		$this-> Productlist();
	}

	/* Get all products by name and get latest products added by name and pass results into Top_box view */
	function _display_top_box(){
		$data['query'] = $this->get('product_name');
		$data['query'] = $this->get_latest('product_name');
		$this->load->view('Top_box', $data);
	}

	/* Select all from products where quanitity = 0 then echo number of rows in the result */
	function count_all_out_of_stock(){
		$query = $this->db->query('SELECT * FROM products WHERE quantity = 0');
		echo $query->num_rows();
	}

	/* Select all from products where quanitity greater than 0 then echo number of rows in the result */
	function count_all_in_of_stock(){
		$query = $this->db->query('SELECT * FROM products WHERE quantity > 0');
		echo $query->num_rows();
	}

	/* Select all from products where column row = 0 current date then echo number of rows in the result */
	function count_date_added(){
		$query = $this->db->query('SELECT * FROM products WHERE added = CURRENT_DATE()');
		echo $query->num_rows();
	}

	/* Get product details
	   Gets all rows from from database where product_id then pass the results into the Productdetails view within Frontend template. */
	function show($product_id){
		$data = $this->get_data_from_db($product_id);
		$template = "Frontend";
		$data['product_id'] = $product_id;
    	$data['view_file'] = "Productdetails";
    	$this->load->module('Template');
    	$this->load->template->$template($data);
	}

	/* Get all products for product list
	   Get all rows from products table and order by product_name then pass result into ProductList view within ProductListing template */
	function ProductList(){
		$data['query'] = $this->get('product_name');
		$template = "ProductListing";
    	$data['view_file'] = "ProductList";
    	$this->load->module('Template');
    	$this->load->template->$template($data);
	}

	/* Filter products by category 
	   Select all from product where product_categories.category_id  = $category_id then pass results into ProductList within ProductListing*/ 
	function FilteredList($category_id) {
		$data['query'] = $this->_custom_query('SELECT * FROM `products` INNER JOIN `category_assign` ON `products`.`id` = `category_assign`.`product_id` INNER JOIN `product_categories` ON `category_assign`.`category_id` = `product_categories`.`category_id` WHERE `product_categories`.`category_id` = "'.$category_id.'"');
		$template = "ProductListing";
    	$data['view_file'] = "ProductList";
    	$this->load->module('Template');
    	$this->load->template->$template($data);
	}

	/* Generate list of categories 
	   get categoires where parent_category = $parent_id */ 
	function generate_catergories() {
		$parent_id = $this->uri->segment(3);
   		$data['query'] = $this->get_where_custom_alt('parent_category', $parent_id);
   		if (!isset($data)) {
   			$data = "";
   		}
   		$this->load->view('category_list', $data);
	}

	/* Load upload library, and configure upload setting including image width and height 
	   If unable to run do upload then load Upload_image view with error
	   Else upload file to folder on webserver and update path into  database */
	function do_upload3($product_id){
		$config['upload_path'] = './ProductImages/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '2024';
		$config['max_height']  = '2768';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload()){
			$data['error'] = array('error' => $this->upload->display_errors("<p style='color: red;'>","</p>"));
			$data['product_id'] = $product_id;
			$template = "Admin";
    		$data['view_file'] = "Upload_image";
    		$this->load->module('Template');
    		$this->load->template->$template($data);
		}else{	
			$data = $this->upload->data();
			$file_name = $data['file_name'];
			//Insert into database
			$raw_file_name = $data['raw_name'];
			$file_ext = $data['file_ext'];
			unset($data);
			$data['main_image3'] = $file_name;
			$this->_update($product_id, $data);
			redirect("Products/upload_image/".$product_id);
		}
	}

	/* Load upload library, and configure upload setting including image width and height 
	   If unable to run do upload then load Upload_image view with error
	   Else upload file to folder on webserver and update path into  database */
	function do_upload2($product_id){
		$config['upload_path'] = './ProductImages/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '2024';
		$config['max_height']  = '2768';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload()){
			$data['error'] = array('error' => $this->upload->display_errors("<p style='color: red;'>","</p>"));
			$data['product_id'] = $product_id;
			$template = "Admin";
    		$data['view_file'] = "Upload_image";
    		$this->load->module('Template');
    		$this->load->template->$template($data);
		}else{	
			$data = $this->upload->data();
			$file_name = $data['file_name'];
			//Insert into database
			$raw_file_name = $data['raw_name'];
			$file_ext = $data['file_ext'];
			unset($data);
			$data['main_image2'] = $file_name;
			$this->_update($product_id, $data);
			redirect("Products/upload_image/".$product_id);
		}
	}

	/* Load upload library, and configure upload setting including image width and height 
	   If unable to run do upload then load Upload_image view with error
	   Else upload file to folder on webserver and update path into  database */
	function do_upload1($product_id){
		$config['upload_path'] = './ProductImages/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '2024';
		$config['max_height']  = '2768';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload()){
			$data['error'] = array('error' => $this->upload->display_errors("<p style='color: red;'>","</p>"));
			$data['product_id'] = $product_id;
			$template = "Admin";
    		$data['view_file'] = "Upload_image";
    		$this->load->module('Template');
    		$this->load->template->$template($data);
		}else{	
			$data = $this->upload->data();
			$file_name = $data['file_name'];
			//Insert into database
			$raw_file_name = $data['raw_name'];
			$file_ext = $data['file_ext'];
			unset($data);
			$data['main_image1'] = $file_name;
			$this->_update($product_id, $data);
			redirect("Products/upload_image/".$product_id);
		}
	}

	/* Load upload library, and configure upload setting including image width and height 
	   If unable to run do upload then load Upload_image view with error
	   Else upload file to folder on webserver and update path into  database */
	function do_upload($product_id){
		$config['upload_path'] = './ProductImages/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '2024';
		$config['max_height']  = '2768';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload()){
			$data['error'] = array('error' => $this->upload->display_errors("<p style='color: red;'>","</p>"));
			$data['product_id'] = $product_id;
			$template = "Admin";
    		$data['view_file'] = "Upload_image";
    		$this->load->module('Template');
    		$this->load->template->$template($data);
		}else{	
			$data = $this->upload->data();
			$file_name = $data['file_name'];
			//Insert into database
			$raw_file_name = $data['raw_name'];
			$file_ext = $data['file_ext'];
			unset($data);
			$data['main_image'] = $file_name;
			$this->_update($product_id, $data);
			redirect("Products/upload_image/".$product_id);
		}
	}	

	/* Get image urls from database if url not set then set it to placeholder image, load result into Upload_image view within Admin */ 
	function upload_image($product_id){
		$query = $this->get_where($product_id);
		foreach ($query->result() as $row) {
			$data['main_image'] = $row->main_image;
			$data['main_image1'] = $row->main_image1;
			$data['main_image2'] = $row->main_image2;
			$data['main_image3'] = $row->main_image3;
		}if(!isset($data)){
			$data['main_image'] = 'placeholder.png';
			$data['main_image1'] = 'placeholder.png';
			$data['main_image2'] = 'placeholder.png';
			$data['main_image3'] = 'placeholder.png';
		}
		$data['product_id'] = $product_id;
		$template = "Admin";
    	$data['view_file'] = "Upload_image";
    	$this->load->module('Template');
    	$this->load->template->$template($data);
	}

	/* Delete product if submit button with 'Confirm Deletion' is pressed,
	   If cancel button pressed then redirect to create screen
	   Load Delete Conf view within Admin template */ 
	function delete_product($update_id){
		$submit = $this->input->post('submit', TRUE);
		if ($submit=="Cancel Deletion"){
			redirect('Products/create/'.$update_id);
		}
		if ($submit=="Confirm Deletion"){
			$this->_delete($update_id);
			$value = "<p>Product Successfully Deleted </p>";
			$this->session->set_flashdata('product',$value);
			redirect('Products/Manage');
		}
		$data['update_id'] = $update_id;
		$template = "Admin";
		$current_url = current_url();
		$data['form_location'] = $current_url;
    	$data['view_file'] = "Delete_conf";
    	$this->load->module('Template');
    	$this->load->template->$template($data);

	}

	/* Get all products and order by product name the pass results into Products Table */ 
	function _display_products_table(){
		$data['query'] = $this->get('product_name');
		$this->load->view('Products_table', $data);
	}

	/* Get data from post on the create screen and return data  */
	function get_data_from_post(){
		$data['quantity'] = $this->input->post('quantity',TRUE);
		$data['product_name'] = $this->input->post('product_name',TRUE);
		$data['product_price'] = $this->input->post('product_price',TRUE);
		$data['product_short_description'] = $this->input->post('product_short_description',TRUE);
		$data['product_description'] = $this->input->post('product_description',TRUE);
		return $data;
	}

	/* Get data from database where '$update_id' if data not set then set it to blank */
	function get_data_from_db($update_id){
		$query = $this->get_where($update_id);
		foreach ($query->result() as $row) {
			$data['product_name'] = $row->product_name;
			$data['quantity'] = $row->quantity;
			$data['product_price'] = $row->product_price;
			$data['main_image'] = $row->main_image;
			$data['main_image1'] = $row->main_image1;
			$data['main_image2'] = $row->main_image2;
			$data['main_image3'] = $row->main_image3;
			$data['product_description'] = $row->product_description;
			$data['product_short_description'] = $row->product_short_description;
		}
		if(!isset($data)){
			$data = "";
		}
		return $data;
	}

	/* Get Product_id from url segemnt 3, get data from get_data_from_post function,
	   if product_id > 0 then product already exists in database so display headline edit else its a new product so display create headline
	   load create view within admin template */
	function create(){
		$product_id = $this->uri->segment(3);
		$data = $this->get_data_from_post();
		$submit = $this->input->post('submit',TRUE);
		if ($product_id>0){
			if ($submit!="Submit"){
				$data = $this->get_data_from_db($product_id);
			}
			$data['headline'] = "Edit Product";
		} else{
			$data['headline'] = "Create New Product";
		}
		$current_url = current_url();
		$data['form_location'] = str_replace('/create','/submit', $current_url);
		$flash = $this->session->flashdata('product');
		if($flash!=""){
			$data['flash'] = $flash;
		}
		$data['product_id']= $product_id;
		$template = "Admin";
    	$data['view_file'] = "Create";
    	$this->load->module('Template');
    	$this->template->$template($data);
	}

	/* Run form validation if validation fails then run create function 
	   else validation passed, if update_id is > 0 then update exsisting product in database, 
	   else must be new product to insert new row of data into database */
	function submit(){	
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('product_price', 'Product Price', 'is_numeric|required');
		$this->form_validation->set_rules('product_description', 'Product Description', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->create();
		}else{
			$update_id = $this->uri->segment(3);
			if($update_id>0){
				//Update
				$data = $this->get_data_from_post();
				$this->_update($update_id, $data);
				$value = "<p>Product Successfully Updated </p>";
			}else{
				//Creat New
				$data = $this->get_data_from_post();
				$data['added']= date("Y-m-d H:i:s");
				$this->_insert($data);
				$value = "<p>Product Successfully added </p>";
				$update_id = $this->get_max();
			}
			//Flash message
			$this->session->set_flashdata('product',$value);
			redirect('Products/create/'.$update_id);
		}
	}

	/* Load flash data into manage view, load manage view within Admin template view */ 
	function manage(){	
    	$template = "Admin";
    	$flash = $this->session->flashdata('product');
		if($flash!=""){
			$data['flash'] = $flash;
		}
    	$data['view_file'] = "Manage";
    	$this->load->module('Template');
    	$this->load->template->$template($data);
    }

    /* Calls get from 'Mdl_products' */
	function get($order_by){
		$this->load->model('Mdl_products');
		$query = $this->Mdl_products->get($order_by);
		return $query;
	}

	/* Calls get_latest from 'Mdl_products' */
	function get_latest($order_by){
		$this->load->model('Mdl_products');
		$query = $this->Mdl_products->get($order_by);
		return $query;
	}

	/* Calls get_where from 'Mdl_products' */
	function get_where($id){
		$this->load->model('Mdl_products');
		$query = $this->Mdl_products->get_where($id);
		return $query;
	}

	/* Calls get_where_custom from 'Mdl_products' */
	function get_where_custom($col,$value){
		$this->load->model('Mdl_products');
		$query = $this->Mdl_products->get_where_custom($col,$value);
		return $query;
	}

	/* Calls get_where_custom_alt from 'Mdl_products' */
	function get_where_custom_alt($col,$value){
		$this->load->model('Mdl_products');
		$query = $this->Mdl_products->get_where_custom_alt($col,$value);
		return $query;
	}

	/* Calls _insert from 'Mdl_products' */
	function _insert($data){
		$this->load->model('Mdl_products');
		$this->Mdl_products->_insert($data);
	}

	/* Calls _update from 'Mdl_products' */
	function _update($update_id, $data){
		$this->load->model('Mdl_products');
		$this->Mdl_products->_update($update_id, $data);	
	}

	/* Calls _delete from 'Mdl_products' */
	function _delete($id){
		$this->load->model('Mdl_products');
		$this->Mdl_products->_delete($id);
	}

	/* Calls get_max from 'Mdl_products' */
	function get_max(){
		$this->load->model('Mdl_products');
		$max_id = $this->Mdl_products->get_max();
		return $max_id;
	}

	/* Calls _custom_query from 'Mdl_products' */
	function _custom_query($mysql_query){
		$this->load->model('Mdl_products');
		$query = $this->Mdl_products->_custom_query($mysql_query);
		return $query;
	}
}
