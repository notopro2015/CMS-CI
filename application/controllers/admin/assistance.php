<?php
class Assistance extends Admin_Controller
{
	function __construct(){
		parent::__construct();
		//echo $this->assistance_m->hash('?qb@iec');
		//return FALSE;
		
	}
	public function index(){
		
		$this->data['donations'] = $this->assistance_m->get();
		$this->data['subview'] = 'admin/assistance/index';
		$this->load->view('admin/_layout_main', $this->data);
		
	}
	public function edit($id = NULL){
		
		if ($id) {
			$this->data['assistance'] = $this->assistance_m->get($id);
			count($this->data['assistance']) || $this->data['errors'][] = 'assistance could not be found';
			
		
		}
		else {
			$this->data['assistance'] = $this->assistance_m->get_new();
		}
		// Pages for dropdown
	
		$this->data['get_electiontype'] = $this->general_m->get_electionype();
		$this->data['get_candidate'] = $this->general_m->get_candidate($this->data['assistance']->ElectionType);
		$this->data['get_provinces'] = $this->general_m->get_provinces();
		$this->data['get_donortype'] = $this->general_m->get_donortype();
		$this->data['get_round'] = $this->general_m->get_round();
		
		//$this->data['get_usertype'] = $this->general_m->get_usertype();
		
		
		$rules = $this->assistance_m->rules;
		$id || $rules['ElectionType']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			$data = $this->assistance_m->array_from_post(array('ElectionType', 'CandidateID', 'ProvinceID', 'Name','FatherName','Amount','DonorType','TypeOfAssistance','Date','RoundID','UserID'));
			
			$this->assistance_m->save($data, $id);
			redirect('admin/assistance');
		}
		
		$this->data['subview'] = 'admin/assistance/edit';
		$this->load->view('admin/_layout_main', $this->data);
		
	}
	public function delete($id){
		if($this->session->userdata('user_type')== 3){
			redirect('admin/assistance');
		}
		$this->assistance_m->delete($id);
		redirect('admin/assistance');
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
	
public function getCandidate(){
		
		
		//var_dump($electiontype . ' ' . $provinceid);
		//return false;
		$electiontype = $this->input->post('electiontype');
		$provinceid = $this->input->post('provinceid');
		
		if($electiontype > 1 && $provinceid > 0){
			$result = $this->assistance_m->getCandidate($electiontype, $provinceid);
			header('Content-Type: application/x-json; charset=utf-8');
			$this->output->set_output(json_encode($result));
		}
		
		if ($electiontype == 1 && $provinceid==0){
			
			$result = $this->assistance_m->getCandidate($electiontype, $provinceid);
			header('Content-Type: application/x-json; charset=utf-8');
			$this->output->set_output(json_encode($result));
		}
	}
}