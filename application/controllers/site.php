<?php
class Site extends Frontend_Controller{
	
	public function __construct(){
		parent::__construct();
		
	}
	public function index(){
		
		$this->data['donations'] = $this->site_m->getCandidate_TotalDonation();
		
		
		$this->load->view('site_view', $this->data);
		//$data = $this->site_m->get_by(array('Amount'=>'20000'));
		
		
	}
	
	
	
}