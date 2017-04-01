<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_shipping extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/* Assign table name to variable */
	function get_table() {
		$table = "shipping";
		return $table;
	}

	/* Get all records from table and order by vaiable passed in */
	function get($order_by) {
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query=$this->db->get($table);
		return $query;
	}

	/* Insert data into table*/
	function _insert($data) {
		$table = $this->get_table();
		$this->db->insert($table, $data);
	}

	/* Remove everything with 'id' from table */
	function _delete($id) {
		$table = $this->get_table();
		$this->db->where('id', $id);
		$this->db->delete($table);
	}

}