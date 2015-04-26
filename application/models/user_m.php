<?php
class User_M extends My_Model 
{
	
	protected $_table_name = 'users';
	protected $_order_by = 'name';
	public $rules = array(
		'username' => array(
			'field' => 'username', 
			'label' => 'Username', 
			'rules' => 'trim|required'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);
	public $rules_admin = array(
		'name' => array(
			'field' => 'name', 
			'label' => 'Name', 
			'rules' => 'trim|required|xss_clean'
		), 
		'username' => array(
			'field' => 'username', 
			'label' => 'Username', 
			'rules' => 'trim|required|callback__unique_email|xss_clean'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm', 
			'label' => 'Confirm password', 
			'rules' => 'trim|matches[password]'
		),
		'user_type' => array(
			'field' => 'user_type', 
			'label' => 'User Type', 
			'rules' => 'trim|required|intval'
		),
	);
	
	function __construct() {
		parent::__construct();
		
	}
	
	public function login(){
		
		$user = $this->get_by(array(
			'username' => $this->input->post('username'),
			'password' => $this->hash($this->input->post('password')),
		), TRUE);
		
		if (count($user)) {
			// Log in user
			$data = array(
				'name' => $user->name,
				'username' => $user->username,
				'id' => $user->id,
				'user_type' => $user->user_type,
				'loggedin' => TRUE,
			);
			
			
			$this->session->set_userdata($data);
		}
	}
	public function logout(){
		$this->session->sess_destroy();
	}
	public function loggedin(){
		return (bool) $this->session->userdata('loggedin');
	}
	public function get_new(){
		$user = new stdClass();
		$user->name = '';
		$user->username = '';
		$user->password = '';
		$user->user_type = '';
		return $user;
	}
	
	public function hash( $string ){
		return hash('sha512', $string . config_item('encryption_key'));
	}
}