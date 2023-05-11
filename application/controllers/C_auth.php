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
		$get = $this->auth->cek_login("users", $where)->row();
		if ($cek > 0) {

			$data_session = array(
				'id' => $get->id,
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

	function updatepicture()
	{
		$imgname 						= $this->input->post('forname');
		$id								= $this->input->post('forid');
		$config['upload_path']          = "./assets/potoprofile";
		$config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
		$config['overwrite']            = true;
		$config['file_name'] 			= $imgname.+rand().".png";
		$this->load->library('upload',$config);

		if ($this->upload->do_upload('file_img')) {
			$uploaded_data 				= $this->upload->data();
			$data				    	= array('photo' => $uploaded_data['file_name']);
			$wh                     	= array('id'	=> $id);
			$this->auth->update($wh, 'users', $data);
			$this->session->set_flashdata('success', 'Update successfully!');
			redirect(base_url('profile/c_profile'));
		}

	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());

	}
}
