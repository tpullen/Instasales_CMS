<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_products extends CI_Model {

    function __construct(){
		// Call the Model constructor
		parent::__construct();
    }

    /* Get products table */
    function get_table() {
		$table = "products";
		return $table;
    }

    /* Get product categories table */
    function get_table_alt() {
		$table_alt = "product_categories";
		return $table_alt;
    }

    /* Get table and retrieve data */
    function get($order_by) {
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query=$this->db->get($table);
		return $query;
    }

    /* Gets the latest data by date */
    function get_latest($order_by) {
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$this->db->where('date', 'CURDATE()', FALSE);
		$query=$this->db->get($table);
		return $query;
    }

    /* Gets table and selects data where there is an id */
    function get_where($id) {
		$table = $this->get_table();
		$this->db->where('id', $id);
		$query=$this->db->get($table);
		return $query;
    }

    /* Gets table and selects data where custom values are inserted */
    function get_where_custom($col, $value) {
		$table = $this->get_table();
		$this->db->where($col, $value);
		$query=$this->db->get($table);
		return $query;
    }

    /* Gets table and selects data where custom values are inserted */
    function get_where_custom_alt($col, $value) {
		$table = $this->get_table_alt();
		$this->db->where($col, $value);
		$query=$this->db->get($table);
		return $query;
    }

    /* Inserts data into database */
    function _insert($data) {
		$table = $this->get_table();
		$this->db->insert($table, $data);
    }

    /* Updates data into database */
    function _update($update_id, $data) {
		$table = $this->get_table();
		$this->db->where('id', $update_id);
		$this->db->update($table, $data);
    }

    /* Deletes data from database */
    function _delete($id) {
		$table = $this->get_table();
		$this->db->where('id', $id);
		$this->db->delete($table);
    }

    /* Selects table and gets the maximum id */
    function get_max() {
		$table = $this->get_table();
		$this->db->select_max('id');
		$query = $this->db->get($table);
		$row=$query->row();
		$id=$row->id;
		return $id;
    }

    /* Custom query which queries whole database rather than specific table in order to join tables */
    function _custom_query($mysql_query) {
		$query = $this->db->query($mysql_query);
		return $query;
    }
}