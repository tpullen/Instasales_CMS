<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_category_assign extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	/* Assign table name to variable */
	function get_table(){
		$table = "category_assign";
		return $table;
	}

	/* Get all records where $col has a value of $value */
	function get_where_custom($col, $value){
		$table = $this->get_table();
		$this->db->where($col, $value);
		$query=$this->db->get($table);
		return $query;
	}

	/* Insert $data into $table */
	function _insert($data){
		$table = $this->get_table();
		$this->db->insert($table, $data);
	}

	/* Delete from table where 'category_assign_id' = $id */
	function _delete($id){
		$table = $this->get_table();
		$this->db->where('category_assign_id', $id);
		$this->db->delete($table);
	}

}