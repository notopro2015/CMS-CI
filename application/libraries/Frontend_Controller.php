<?php
class Frontend_Controller extends My_Controller
{
	
	function __construct(){
		
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('site_m');
		$this->load->model('general_m');
	}
}