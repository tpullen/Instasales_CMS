<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_email extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function _custom_query($mysql_query) {
		$query = $this->db->query($mysql_query);
		return $query;
	}

}