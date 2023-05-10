<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_invitation extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		base_url();
		if ($this->session->userdata('status') != "login") {
			// redirect(base_url("login"));
			redirect('http://localhost/myApps');
		}
		$this->load->library('form_validation');
		$this->load->model('M_invitation', 'model');
		$this->load->helper('url');
	}

	public function index()
	{
		$tbl = 'tbl_invitation';
		$log = $this->session->userdata("nama");
		$where = array('information' => $log);
		$where2 = array('name' => $this->input->post('data'));
		$whereadm = array('name' => $this->input->post('data'));

		$data['list'] 		= null;
		if ($this->input->post('data')) {
			if($log != 'admin'){
				$data['list'] = $this->model->getlist($tbl, $where, $where2);
			} else {
				// echo 'admin';
				$data['list'] = $this->model->getlistadm($tbl, $whereadm);
			}
		}

		// var_dump($log);

		$this->load->view('list_v', $data);
	}

	function store()
	{
		$tbl = 'tbl_invitation';

		$name = $this->input->post('name');
		$price = $this->input->post('price');
		$address = $this->input->post('address');
		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'name' => $name,
			'price' => $price,
			'address' => $address,
			// 'information' => 'father',
			'information' => $this->session->userdata("nama"),
			'created_at' => date('Y-m-d H:i:s')
		);

		$this->model->insert($tbl, $data);

		// var_dump($data);
		$this->session->set_flashdata('success', 'Data has been inserted successfully!');
		redirect('http://localhost/myApps/invite/c_invitation');
	}

	function info()
	{
		$tbl = 'tbl_invitation';
		$tbl2 = 'users';
		// $log = ('' =>$this->session->userdata("nama"));

		$data['user'] = $this->model->geted($tbl2)->num_rows();
		$data['data'] = $this->model->geted($tbl)->num_rows();

		// var_dump($data['user']);
		$this->load->view('info_v', $data);
	}

}
