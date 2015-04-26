<?php
class Expenditure_M extends My_Model 
{
	
	protected $_table_name = 'expenditure';
	protected $_order_by = 'ID';
	public $rules = array(
		'ElectionType' => array(
			'field' => 'ElectionType', 
			'label' => 'نوعیت انتخابات', 
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
		'Amount' => array(
			'field' => 'Amount', 
			'label' => 'مقدار', 
			'rules' => 'trim|required|intval'
		), 
		'SPDetail' => array(
			'field' => 'SPDetail', 
			'label' => 'مشخصات ارائه کننده خدمات و تهیه کننده مواد', 
			'rules' => 'trim|required'
		),
		'TypeOfExpenditure' => array(
			'field' => 'TypeOfExpenditure', 
			'label' => 'مورد مصرف', 
			'rules' => 'trim|required'
		), 
		'Date' => array(
			'field' => 'Date', 
			'label' => 'تاریخ', 
			'rules' => 'trim'
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
		$expenditure = new stdClass();
		$expenditure->ElectionType = '';
		$expenditure->CandidateID = '';
		$expenditure->ProvinceID = '';
		$expenditure->Amount = '';
		$expenditure->SPDetail = '';
		$expenditure->TypeOfExpenditure = '';
		$expenditure->Date = '';
		$expenditure->RoundID = '';
		$expenditure->UserID = '';
		return $expenditure;
	}
}