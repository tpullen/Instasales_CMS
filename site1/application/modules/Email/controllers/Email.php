<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Email extends MX_Controller
{

	/* Code below for sending emails is based upon examples shown on ellislab.com 
	   Link: https://ellislab.com/codeigniter/user-guide/libraries/email.html */

	function __construct() {
		parent::__construct();
		/* Config for email class */
		$config = Array(
			'protocol' => 'mail',
		);
		$this->email->initialize($config);
	}

	/* Sends email confirming customer registration upon submitting register form */
	function customer_registered($username){
		$email_address = $username;
		$this->email->set_newline('\r\n');
		$this->email->from('orders@instasales.co.uk','Instasales Orders' );
		$this->email->to($email_address);
		$this->email->subject('Your Instasales account has been created');
		$this->email->message('Thankyou for registering, your Instasales account has been created');
		if($this->email->send()){	
		}else{
			show_error($this->email->print_debugger());
		}
	}

	/* Sends email confirming order upon checkout, gets email address from session data */
	function order_confirmed(){
		$email_address = $this->session->userdata('user_name');
		$this->email->set_newline('\r\n');
		$this->email->from('orders@instasales.co.uk','Instasales Orders' );
		$this->email->to($email_address);
		$this->email->subject('Thank You For Your Order');
		$this->email->message('Thank you for your order, we will send you an email when your order has been dispatched');
		if($this->email->send()){
		}else{
			show_error($this->email->print_debugger());
		}
	}

	/* Selects username based on customer_id from url segment 4,
	   Sends email cancelling order upon update from backend admin */
	function order_cancelled(){
		$customer_id = $this->uri->segment(4);
		$query= $this->_custom_query('SELECT `user_name` FROM `orders` INNER JOIN `customer_details` ON `orders`.`customer_id` = `customer_details`.`customer_id` WHERE `orders`.`customer_id` = '.$customer_id );
		foreach ($query->result() as $row) {
			$data['user_name'] = $row->user_name;
		}
		$customer_email = $data;
		$this->email->set_newline('\r\n');
		$this->email->from('orders@instasales.co.uk','Instasales Orders' );
		$this->email->to($customer_email);
		$this->email->subject('Your order has been cancelled');
		$this->email->message('Your order has been cancelled');
		if($this->email->send()){		
		}else{
			show_error($this->email->print_debugger());
		}
	}

	/* Sends email confirming order cancelation to customer when updated from customer dashboard */
	function order_cancelled_customer(){
		$email_address = $this->session->userdata('user_name');
		$this->email->set_newline('\r\n');
		$this->email->from('orders@instasales.co.uk','Instasales Orders' );
		$this->email->to($email_address);
		$this->email->subject('Your order has been cancelled');
		$this->email->message('Your order has been cancelled');
		if($this->email->send()){	
		}else{
			show_error($this->email->print_debugger());
		}
	}

	/* Selects username based on customer_id from url segment 4,
	   Sends email updating order status to dispatched */
	function order_dispatched(){
		$order_id = $this->uri->segment(3);
		$customer_id = $this->uri->segment(4);
		$query= $this->_custom_query('SELECT `user_name` FROM `orders` INNER JOIN `customer_details` ON `orders`.`customer_id` = `customer_details`.`customer_id` WHERE `orders`.`customer_id` = '.$customer_id );
		foreach ($query->result() as $row) {
			$data['user_name'] = $row->user_name;
		}
		$customer_email = $data;
		$email_address = $this->session->userdata('user_name');
		$this->email->set_newline('\r\n');
		$this->email->from('orders@instasales.co.uk','Instasales Orders' );
		$this->email->to($customer_email);
		$this->email->subject('Your order: '. $order_id . ' has been dispatched');
		$this->email->message('Your order has been dispatched');
		if($this->email->send()){
		}else{
			show_error($this->email->print_debugger());
		}
	}

	/* Call the custom_query function in Mdl_email */
	function _custom_query($mysql_query) {
		$this->load->model('Mdl_email');
		$query = $this->Mdl_email->_custom_query($mysql_query);
		return $query;
	}

}