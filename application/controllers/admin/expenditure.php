<?php
class Expenditure extends Admin_Controller
{
	function __construct(){
		parent::__construct();
		//echo $this->assistance_m->hash('?qb@iec');
		//return FALSE;
		
	}
	public function index(){
		
		$this->data['donations'] = $this->expenditure_m->get();
		$this->data['subview'] = 'admin/expenditure/index';
		$this->load->view('admin/_layout_main', $this->data);
		
	}
	public function edit($id = NULL){
		
		if ($id) {
			$this->data['expenditure'] = $this->expenditure_m->get($id);
			count($this->data['expenditure']) || $this->data['errors'][] = 'expenditure could not be found';
		}
		else {
			$this->data['expenditure'] = $this->expenditure_m->get_new();
		}
		// Pages for dropdown
		
		$this->data['get_electiontype'] = $this->general_m->get_electionype();
		$this->data['get_candidate'] = $this->general_m->get_candidate($this->data['expenditure']->ElectionType);
		$this->data['get_provinces'] = $this->general_m->get_provinces();
		$this->data['get_donortype'] = $this->general_m->get_donortype();
		$this->data['get_round'] = $this->general_m->get_round();
		
		$rules = $this->expenditure_m->rules;
		$id || $rules['ElectionType']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			$data = $this->expenditure_m->array_from_post(array('ElectionType', 'CandidateID', 'ProvinceID', 'Amount','SPDetail','TypeOfExpenditure','Date','RoundID','UserID'));
			
			$this->expenditure_m->save($data, $id);
			redirect('admin/expenditure');
		}
		
		$this->data['subview'] = 'admin/expenditure/edit';
		$this->load->view('admin/_layout_main', $this->data);
		
	}
	public function delete($id){
		if($this->session->userdata('user_type')== 3){
			redirect('admin/expenditure');
		}
		$this->expenditure_m->delete($id);
		redirect('admin/expenditure');
	}

	public function logout(){
		
		$this->user_m->logout();
		redirect('admin/user/login');
	}
	/*
public function _unique_assistanceid ($str)
	{
		$id = $this->uri->segment(4);
		$this->db->where('AssistanceID', $this->input->post('assistancename'));
		!$id || $this->db->where('id !=', $id);
		$assistance = $this->assistance_m->get();
		
		if (count($assistance)) {
			$this->form_validation->set_message('_unique_assistancename', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}
	*/
}