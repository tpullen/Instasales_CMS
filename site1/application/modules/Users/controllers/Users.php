<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Users extends MX_Controller
{

	function __construct(){
		parent::__construct();
	}

	/*Loads the backend login template and inserts loginform view file*/
	function login(){
		$template = "backend_login";
		$data['view_file'] = "loginform";
		$this->load->module('Template');
		$this->template->$template($data);
	}
	
	/*Destroys the session in order to logout*/
	public function logout(){
		$this->session->sess_destroy();
		$this->login();
	}

	/*Do login checks username agains the user id and sets the userdata redirecting to dashboard*/
	function _doLogin($username){
		$query = $this->get_where_custom('user_name', $username);
		foreach($query->result() as $row){
			$user_id = $row->user_id;
		}
		$this->session->set_userdata('user_id', $user_id);
		$this->session->set_userdata('admin_user_name', $username);
		redirect('Dashboard/Home');
	}

	/* Checks username and password validation before submitting data and directing to doLogin function*/
	function submit(){
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'callback_password_check|required');
		if ($this->form_validation->run($this) == FALSE){
			$this->login();
		}else{
			$username = $this->input->post('user_name', TRUE);
			$this->_doLogin($username);
		}
	}

	/* Checks password against database and if false tells user that the credentials are incorrect*/
	function password_check($password){
		$username = $this->input->post('user_name', TRUE);
		$this->load->model('Mdl_users');
		$result = $this->Mdl_users->password_check($username, $password);
		if ($result == FALSE){
			$this->form_validation->set_message('password_check', 'Incorrect Password or Username');
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	/* Calls get from 'Mdl_users' */
	function get($order_by){
		$this->load->model('Mdl_users');
		$query = $this->Mdl_users->get($order_by);
		return $query;
	}
	
	/* Calls get_where from 'Mdl_users' */
	function get_where($id){
		$this->load->model('Mdl_users');
		$query = $this->Mdl_users->get_where($id);
		return $query;
	}
	
	/* Calls get_where_custom from 'Mdl_users' */
	function get_where_custom($col, $value){
		$this->load->model('Mdl_users');
		$query = $this->Mdl_users->get_where_custom($col, $value);
		return $query;
	}
	
	/* Calls _insert from 'Mdl_users' */
	function _insert($data){
		$this->load->model('Mdl_users');
		$this->Mdl_users->_insert($data);
	}
}