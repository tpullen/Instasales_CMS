<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_dashboard extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/* Assign table name to variable */
	function get_table() {
		$table = "orders";
		return $table;
	}

	/* Get all records from table and order by vaiable passed in */
	function get($order_by) {
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query=$this->db->get($table);
		return $query;
	}

	/* Get all records from table with a limit of 10 order by descending */
	function get_with_limit($limit, $offset, $order_by) {
		$table = $this->get_table();
		$this->db->limit($limit, $offset);
		$this->db->order_by($order_by,'desc');
		$query=$this->db->get($table);
		return $query;
	}
}