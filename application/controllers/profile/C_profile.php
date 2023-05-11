<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url());
		}
		$this->load->library('form_validation');
		$this->load->model('M_auth', 'auth');
		$this->load->helper('url');
	}

	function index()
	{
		$where = array('id' => $this->session->userdata("id"));
		$data['user'] = $this->auth->cek_login("users", $where)->row();

		$this->load->view('pages/header');
		$this->load->view('profile/index_v', $data);
		$this->load->view('pages/footer');
	}

	function update()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$fname = $this->input->post('fname');
		$tbl = 'users';

		if($password == ""){
			$data = array(
				'username' => $username,
				'full_name' => $fname
			);
		} else {
			$data = array(
				'username' => $username,
				'password' => md5($password),
				'full_name' => $fname
			);
		}
		
		$where = array('id' => $this->session->userdata("id"));
		$this->auth->update($where, $tbl, $data);

		$this->session->set_flashdata('success', 'Update successfully!');
		redirect(base_url('profile/c_profile'));

	}

}
