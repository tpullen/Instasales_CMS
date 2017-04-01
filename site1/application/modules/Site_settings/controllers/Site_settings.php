<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Site_settings extends MX_Controller
{
	function __construct() {
		parent::__construct();
	}

	/* Sets the maximun depth categories can go into a variable*/
	function get_max_category_depth(){
		$max_depth = 3;
		return $max_depth;
	}

	/* Sets the currency into a variable */
	function get_currency(){
		$currency = "£";
		return $currency;
	}
}