<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_users extends CI_Model {

	function __construct() {
		parent::__construct();
	}


	/*Gets the user table*/
	function get_table(){
		$table = "users";
		return $table;
	}

	/* Checks password agains database */
	function password_check($username,$password){
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

	/* Get all from users and orderby parameter */
	function get($order_by) {
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query=$this->db->get($table);
		return $query;
	}

	/* Get all from users where $id = 'id' */
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

}