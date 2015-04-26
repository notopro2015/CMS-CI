<?php
class Admin_Controller extends My_Controller
{
	
	function __construct(){
		
		parent::__construct();
		$this->data['meta_title'] = 'IEC Candidate Financial Report System';
		$this->data['meta_title_short'] = 'سیستم مدیریت مالی مبارزات انتخاباتی';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');
		$this->load->model('general_m');
		$this->load->model('assistance_m');
		$this->load->model('expenditure_m');
		
		$exception_uris = array(
			'admin/user/login',
			'admin/user/logout'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			
			if ($this->user_m->loggedin() == FALSE){
				redirect('admin/user/login');
			}
		}
	}
}