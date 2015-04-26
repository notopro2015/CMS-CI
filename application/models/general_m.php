<?php
class General_M extends My_Model
{
	protected $_table_name = '';
	protected $_order_by = '';
	function __construct(){
		
		parent::__construct();
	}
	
	public function get_usertype()
	{
		// Fetch pages without parents
		$this->_table_name = 'user_type';
		$this->_order_by = 'id';
		$this->db->select('id, user_type');
		//$this->db->where('id', 0);
		$user = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => '-- Select User Type --'
		);
		if (count($user)) {
			foreach ($user as $row) {
				$array[$row->id] = $row->user_type;
			}
		}
		
		return $array;
	}
	public function get_electionype()
	{
		$this->_table_name = 'electiontype';
		$this->_order_by = 'id';
		// Fetch pages without parents
		$this->db->select('id, type');
		//$this->db->where('id', 0);
		$user = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => '-- نوعیت انتخابات --'
		);
		if (count($user)) {
			foreach ($user as $row) {
				$array[$row->id] = $row->type;
			}
		}
		
		return $array;
	}
	public function get_candidate($electiontype = NULL)
	{
		$this->_table_name = 'candidate';
		$this->_order_by = 'BallotOrder';
		if($electiontype==NULL){
			$electiontype = 1;
		}
		// Fetch pages without parents
		$this->db->select('VoterID, Name');
		$this->db->where('ElectionType', $electiontype);
		$user = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => '-- انتخاب کاندید --'
		);
		if (count($user)) {
			foreach ($user as $row) {
				$array[$row->VoterID] = $row->Name;
			}
		}
		
		return $array;
	}
	public function get_provinces()
	{
		$this->_table_name = 'provinces';
		$this->_order_by = 'ID';
		
		// Fetch pages without parents
		$this->db->select('ID, NameDari');
		//$this->db->where('ElectionType', $electiontype);
		$user = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => '-- انتخاب ولایت --'
		);
		if (count($user)) {
			foreach ($user as $row) {
				$array[$row->ID] = $row->NameDari;
			}
		}
		
		return $array;
	}
	public function get_donortype()
	{
		$this->_table_name = 'donortype';
		$this->_order_by = 'id';
		
		// Fetch pages without parents
		$this->db->select('id, Donor');
		//$this->db->where('ElectionType', $electiontype);
		$user = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => '-- انتخاب نوع مساعدت --'
		);
		if (count($user)) {
			foreach ($user as $row) {
				$array[$row->id] = $row->Donor;
			}
		}
		
		return $array;
	}
public function get_round()
	{
		$this->_table_name = 'round';
		$this->_order_by = 'ID';
		
		// Fetch pages without parents
		$this->db->select('ID, Round');
		//$this->db->where('ElectionType', $electiontype);
		$user = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => '-- انتخاب دوره مساعدت --'
		);
		if (count($user)) {
			foreach ($user as $row) {
				$array[$row->ID] = $row->Round;
			}
		}
		
		return $array;
	}
}