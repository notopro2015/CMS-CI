<?php
class User extends Admin_Controller
{
	function __construct(){
		parent::__construct();
		//echo $this->user_m->hash('?qb@iec');
		//return FALSE;
		
	}
	public function index(){
		
		$this->data['users'] = $this->user_m->get();
		
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
		
	}
	public function edit($id = NULL){
		if ($this->session->userdata('user_type') == '3') {
			redirect('admin/dashboard');
			exit;
		}
	
		if ($id) {
			$this->data['user'] = $this->user_m->get($id);
			count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
		}
		else {
			$this->data['user'] = $this->user_m->get_new();
		}
		// Pages for dropdown
		
		$this->data['get_usertype'] = $this->general_m->get_usertype();
		//var_dump($this->data['get_usertype']);
		//Rules
		$rules = $this->user_m->rules_admin;
		$id || $rules['password']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			$data = $this->user_m->array_from_post(array('name', 'username', 'password', 'user_type'));
			$data['password'] = $this->user_m->hash($data['password']);
			$this->user_m->save($data, $id);
			redirect('admin/user');
		}
		
		$this->data['subview'] = 'admin/user/edit';
		$this->load->view('admin/_layout_main', $this->data);
		
	}
	public function delete($id){
		if ($this->session->userdata('user_type') == '3') {
			redirect('admin/dashboard');
			exit;
			
		}elseif ($this->session->userdata('user_type') == '2'){
			redirect('admin/user');
		}
		$this->user_m->delete($id);
		redirect('admin/user');
	}

	public function login(){
		$dashboard = 'admin/dashboard';
		$this->user_m->loggedin() == FALSE || redirect($dashboard);
		
		$rules = $this->user_m->rules;
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE){
			
			
			// We can login and redirect
			if ($this->user_m->login() == TRUE) {
				
				redirect($dashboard);
			}
			else {
				
				$this->session->set_flashdata('error', 'That username/password combination does not exist');
				redirect('admin/user/login', 'refresh');
			}
			
		}
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_layout_modal', $this->data);
		
	}
	public function logout(){
		
		$this->user_m->logout();
		redirect('admin/user/login');
	}
public function _unique_username ($str)
	{
		$id = $this->uri->segment(4);
		$this->db->where('username', $this->input->post('username'));
		!$id || $this->db->where('id !=', $id);
		$user = $this->user_m->get();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_username', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}
}