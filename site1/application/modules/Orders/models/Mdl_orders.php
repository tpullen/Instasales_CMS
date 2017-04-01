<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_orders extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	/* Assign table name to variable */
	function get_table() {
		$table = "customer_details";
		return $table;
	}

	/* Assign table name to variable */
	function get_table2() {
		$table2 = "orders";
		return $table2;
	}

	/* Assign table name to variable */
	function get_table3() {
		$table3 = "order_items";
		return $table3;
	}

	/* Get all from orders and orderby parameter */
	function get($order_by) {
		$table = $this->get_table2();
		$this->db->order_by($order_by);
		$query=$this->db->get($table);
		return $query;
	}

	/* Get all from customer_details where $customer_id = 'customer_id' */
	function get_where($customer_id) {
		$table = $this->get_table();
		$this->db->where('customer_id', $customer_id);
		$query=$this->db->get($table);
		return $query;
	}

	/* Get all from orders where $order_id = 'order_id' */
	function get_where2($order_id) {
		$table = $this->get_table2();
		$this->db->where('order_id', $order_id);
		$query=$this->db->get($table);
		return $query;
	}

	/* Get all from order_items where $order_id = 'order_id' */
	function get_where_alt($order_id) {
		$table = $this->get_table3();
		$this->db->where('order_id', $order_id);
		$query=$this->db->get($table);
		return $query;
	}

	/* Get all from orders where $col has a value of $value */
	function get_where_custom_alt($col, $value) {
		$table = $this->get_table2();
		$this->db->where($col, $value);
		$query=$this->db->get($table);
		return $query;
	}

	/* Insert $data into orders */
	function _insert($data) {
		$table = $this->get_table2();
		$this->db->insert($table, $data);
	}

	/* Insert $data into order_items */
	function _insert_alt($data) {
		$table = $this->get_table3();
		$this->db->insert($table, $data);
	}

	/* Update orders where 'order_id' = $id with $data */
	function _update($id, $data) {
		$table = $this->get_table2();
		$this->db->where('order_id', $id);
		$this->db->update($table, $data);
	}

	/* Run $mysql_qeury against database */
	function _custom_query($mysql_query) {
		$query = $this->db->query($mysql_query);
		return $query;
	}

}