<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_cust_account extends CI_Model {

	function __construct() {
	parent::__construct();
	}

	/* Get customer details table */
	function get_table() {
		$table = "customer_details";
		return $table;
	}

	/* Gets username and password form the database and check password*/
	function customer_password_check($username,$password){
		$table = $this->get_table();
		$this->db->where('user_name', $username);
		$this->db->where('password', sha1($password));
		$query=$this->db->get($table);
		$num_rows = $query->num_rows();

		if($num_rows>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function get($order_by) {
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query=$this->db->get($table);
		return $query;
	}


	function get_where($customer_id) {
		$table = $this->get_table();
		$this->db->where('customer_id', $customer_id);
		$query=$this->db->get($table);
		return $query;
	}

	function get_where_custom($col, $value) {
		$table = $this->get_table();
		$this->db->where($col, $value);
		$query=$this->db->get($table);
		return $query;
	}

	function _insert($data) {
		$table = $this->get_table();
		$this->db->insert($table, $data);
	}

	function _update($id, $data) {
		$table = $this->get_table();
		$this->db->where('customer_id', $id);
		$this->db->update($table, $data);
	}

	function _delete($id) {
		$table = $this->get_table();
		$this->db->where('id', $id);
		$this->db->delete($table);
	}


}