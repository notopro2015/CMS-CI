<?php
class Site_m extends My_Model {
	
	protected $_table_name = '';
	protected $_primary_key = '';
	protected $_primary_filter = '';
	protected $_order_by = '';
	protected $_rules = array();
	protected $_timestamps = FALSE;
	function __construct() {
		parent::__construct();
	}
	
	public  function getCandidate_TotalDonation($electiontype = NULL, $provinceid = NULL){
		
		$this->_table_name = 'assistance a, candidate c';
		$this->_order_by = 'c.BallotOrder';
		$this->db->select('c.Name As CandidateName, c.BallotOrder, c.VoterID, sum(a.Amount) AS TotalDonation, a.CandidateID');
		if($electiontype>1 && $provinceid != 0){
		$this->db->where('c.VoterID = a.CandidateID AND c.ElectionType='. $electiontype . ' AND c.ProvinceID='. $provinceid);
		}else{
			$this->db->where('c.VoterID = a.CandidateID');
		}
		$this->db->group_by('a.CandidateID, CandidateName');
		$result = parent::get();
		
		return $result;
		
		
	}
	
	public function getCandidate_TotalExpense($candidateID = NULL){
		$this->_table_name = 'expenditure';
		$this->_order_by = 'ID';
		$this->db->select('CandidateID, sum(Amount) As TotalExpenditure');
		$this->db->where('CandidateID =' . $candidateID );
		$this->db->group_by('CandidateID');
		$result = parent::get();
		$array = array();
		foreach ($result as $row){
			$array[$row->CandidateID] = $row->TotalExpenditure;
		}
		return $array;
	}
}