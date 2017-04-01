<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cart extends MX_Controller{

	function __construct(){
		parent::__construct();
	}

	/* Load view_cart by default */
	function index(){
		$this->view_cart();
	}

	/* Loads the cart view indside the frontend template */
	function view_cart(){
		$template = "Frontend";
		$data['view_file'] = "Cart";
		$this->load->module('Template');
		$this->load->template->$template($data);
	}

	/* Adds a product to the cart using the cart class 
	   Storing the id of the product, product name, product price and dropdown options
	*/
	function add_to_cart($product_id){	
		$colour = $this->input->post('Colour');
		$size = $this->input->post('Size');
		$product = $this->get_where_row($product_id);
		$data = array(
			'id'      => $product->id,
			'qty'     => 1,
			'price'   => $product->product_price,
			'name'    => $product->product_name,
			'options' =>array('Colour' => $colour, 'Size' => $size)
		);
		$this->cart->insert($data);
		redirect('Products/show/'.$product_id);
	}
	
	/* Removes an item from the cart */
	function delete_item($rowid){
		$this->cart->update(array('rowid' => $rowid, 'qty'   => 0));
		$this->view_cart();
	}

	/* Updates the quantity of a item according to the value entered */
	function update(){
		$i = 1; 
		foreach($this->cart->contents() as $items){
			$this->cart->update(array('rowid' =>$items['rowid'], 'qty' => $_POST['qty'.$i]));
			$i++; 
		}
		$this->view_cart();
	}

	/* Destroys the cart */
	function clear_cart(){
		$this->cart->destroy();
		$this->view_cart();
	}

	/* Calls get_where_row from 'mdl_cart' */
	function get_where_row($product_id){
		$this->load->model('Mdl_cart');
		$query = $this->Mdl_cart->get_where_row($product_id);
		return $query;
	}

}