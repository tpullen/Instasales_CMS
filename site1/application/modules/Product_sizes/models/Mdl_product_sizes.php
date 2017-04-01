<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_product_sizes extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/* Assign table name to variable */
	function get_table() {
		$table = "product_sizes";
		return $table;
	}

	/* Get where $col = $value from product_sizes */
	function get_where_custom($col, $value) {
		$table = $this->get_table();
		$this->db->where($col, $value);
		$query=$this->db->get($table);
		return $query;
	}

	/* Insert $data into product_sizes */
	function _insert($data) {
		$table = $this->get_table();
		$this->db->insert($table, $data);
	}

	/* Delete rows wher id = $id from product_sizes */
	function _delete($id) {
		$table = $this->get_table();
		$this->db->where('id', $id);
		$this->db->delete($table);
	}

}