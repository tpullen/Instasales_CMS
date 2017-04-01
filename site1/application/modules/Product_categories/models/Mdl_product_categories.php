<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_product_categories extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/* Gets product categories table*/
	function get_table() {
		$table = "product_categories";
		return $table;
	}

	/* Selects table and gets data from database */
	function get($order_by) {
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query=$this->db->get($table);
		return $query;
	}

	/* Selects table and gets data from database where category id is an id */
	function get_where($id) {
		$table = $this->get_table();
		$this->db->where('category_id', $id);
		$query=$this->db->get($table);
		return $query;
	}

	/* Selects table and gets data from database where category custom value set */
	function get_where_custom($col, $value) {
		$table = $this->get_table();
		$this->db->where($col, $value);
		$query=$this->db->get($table);
		return $query;
	}

	/* Selects table and inserts data into table */
	function _insert($data) {
		$table = $this->get_table();
		$this->db->insert($table, $data);
	}

	/* Updates table with new data where there is a category id */
	function _update($id, $data) {
		$table = $this->get_table();
		$this->db->where('category_id', $id);
		$this->db->update($table, $data);
	}

	/* Delete data from the table */
	function _delete($id) {
		$table = $this->get_table();
		$this->db->where('category_id', $id);
		$this->db->delete($table);
	}

	/* Selects table and gets the maximum category id */
	function get_max() {
		$table = $this->get_table();
		$this->db->select_max('category_id');
		$query = $this->db->get($table);
		$row=$query->row();
		$id=$row->category_id;
		return $id;
	}
}