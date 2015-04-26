<?php
class Assistance_M extends My_Model 
{
	
	protected $_table_name = 'assistance';
	protected $_order_by = 'Name DESC';
	public $rules = array(
		'ElectionType' => array(
			'field' => 'ElectionType', 
			'label' => 'نوع انتخابت', 
			'rules' => 'trim|required|intval'
		),
		'CandidateID' => array(
			'field' => 'CandidateID', 
			'label' => 'کاندید', 
			'rules' => 'trim|required|intval'
		), 
		'ProvinceID' => array(
			'field' => 'ProvinceID', 
			'label' => 'ولایت', 
			'rules' => 'trim|intval'
		), 
		'Name' => array(
			'field' => 'Name', 
			'label' => 'نام', 
			'rules' => 'trim|required'
		), 
		'FatherName' => array(
			'field' => 'FatherName', 
			'label' => 'نام پدر', 
			'rules' => 'trim|required'
		), 
		'Amount' => array(
			'field' => 'Amount', 
			'label' => 'مقدارمساعدت', 
			'rules' => 'trim|required|intval'
		), 
		'DonorType' => array(
			'field' => 'DonorType', 
			'label' => 'مشخصات مساعدت', 
			'rules' => 'trim|required|intval'
		), 
		'TypeOfAssistance' => array(
			'field' => 'TypeOfAssistance', 
			'label' => 'نوعیت مساعدت', 
			'rules' => 'trim|required'
		), 
		'Date' => array(
			'field' => 'Date', 
			'label' => 'تاریخ مساعدت', 
			'rules' => 'trim|required'
		), 
		'RoundID' => array(
			'field' => 'RoundID', 
			'label' => 'دوره', 
			'rules' => 'trim|required|intval'
		), 
		'UserID' => array(
			'field' => 'UserID', 
			'label' => 'کاربر', 
			'rules' => 'trim|required|intval'
		)
	);
	
	
	function __construct() {
		parent::__construct();
		
	}
	
	
public function get_new(){
		$assistance = new stdClass();
		$assistance->ElectionType = '';
		$assistance->CandidateID = '';
		$assistance->ProvinceID = '';
		$assistance->Name = '';
		$assistance->FatherName = '';
		$assistance->Amount = '';
		$assistance->DonorType = '';
		$assistance->TypeOfAssistance = '';
		$assistance->Date = '';
		$assistance->RoundID = '';
		$assistance->UserID = '';
		return $assistance;
	}
	
	public function getCandidate($electiontype = NULL, $provinceid = NULL){
		
		$data = array(
			'ElectionType' => $electiontype,
			'ProvinceID' => $provinceid	
		);
		//print_r($data);
		
		
		$this->_table_name = 'candidate';
		$this->_order_by = 'BallotOrder';
		$this->db->select('VoterID, Name');
		$this->db->where($data);
		$data  = parent::get();
		//print_r($data);
		//return FALSE;
		
		
		return $data;
		
	}

}