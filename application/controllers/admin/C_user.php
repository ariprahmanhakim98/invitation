<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url());
		}
		$this->load->library('form_validation');
		$this->load->model('M_auth', 'model');
		$this->load->helper('url');
	}

	public function index()
	{
		$tbl = 'users';
		$data['list'] = $this->model->getlist($tbl);

		$this->load->view('pages/header');
		$this->load->view('admin/user_v', $data);
		$this->load->view('pages/footer');
	}

	function store()
	{
		$tbl = 'users';

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$fname = $this->input->post('full_name');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('full_name', 'Fname', 'required');	

		if ($this->form_validation->run() === false) {
			$this->session->set_flashdata('failed', 'Harap isi semua data!');
			redirect(base_url('admin/c_user'));
		} else {
			$data = array(
				'username' => $username,
				'password' => md5($password),
				'full_name' => $fname
			);

			$this->model->insert($tbl, $data);
			$this->session->set_flashdata('success', 'Data has been inserted successfully!');
			redirect(base_url('admin/c_user'));
		}
	}

	function edit()
	{

	}

	function update()
	{
		
	}

	function delete()
	{
		$tbl = 'users';
		$id = array('id' => $this->input->post('id'));
		$exe = $this->model->delete($tbl, $id);
		if($exe){
			$this->session->set_flashdata('success', 'Delete successfully!');
			redirect(base_url('admin/c_user'));
		}
	}

}
