<?php
defined('BASEPATH') or exit('No direct script access allowed');
class C_auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_auth', 'auth');
	}

	function index()
	{
		$this->load->view('login_v');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);
		$cek = $this->auth->cek_login("users", $where)->num_rows();
		if ($cek > 0) {

			$data_session = array(
				'nama' => $username,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			$this->session->set_flashdata('success', 'Login successfully!');
			redirect(base_url('invite/c_invitation'));

		} else {
			$this->session->set_flashdata('failed', 'Username dan password salah !');
			redirect(base_url());

		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());

	}
}
