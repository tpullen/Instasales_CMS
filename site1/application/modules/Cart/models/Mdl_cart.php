<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_cart extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/* Assign table name to variable */
	function get_table(){
		$table = "products";
		return $table;
	}

	/* Get all records where 'id' = $product_id */
	function get_where_row($product_id){
		$table = $this->get_table();
		$this->db->where('id', $product_id);
		$query=$this->db->get($table)->row();
		return $query;
	}

}