<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_invitation extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url());
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
				$data['list'] = $this->model->getlistadm($tbl, $whereadm);
			}
		}

		$this->load->view('pages/header');
		$this->load->view('list_v', $data);
		$this->load->view('pages/footer');
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
			'information' => $this->session->userdata("nama"),
			'created_at' => date('Y-m-d H:i:s')
		);

		$this->model->insert($tbl, $data);

		$this->session->set_flashdata('success', 'Data has been inserted successfully!');
		redirect(base_url('invite/c_invitation'));

	}

	function edit()
	{
		$id  	= array('id' => $this->uri->segment('4'));
		$data['edit'] = $this->model->getlistforupdate('tbl_invitation', $id)->row();

		$this->load->view('pages/header');
		$this->load->view('list_edit_v', $data);
		$this->load->view('pages/footer');
	}

	function update()
	{
		$tbl = 'tbl_invitation';
		$url = $this->input->post('id');
		$where = array('id' => $this->input->post('id'));
		$name = $this->input->post('name');
		$price = $this->input->post('price');
		$address = $this->input->post('address');
		$data = array(
			'name' => $name,
			'price' => $price,
			'address' => $address
		);

		$exe = $this->model->updated($where, $tbl, $data);
		if($exe){
			$this->session->set_flashdata('success', 'Update successfully!');
			redirect(base_url('invite/c_invitation/edit/').$url);
		}
	}

	function delete()
	{
		$tbl = 'tbl_invitation';
		$id = array('id' => $this->input->post('id'));
		$exe = $this->model->delete($tbl, $id);
		if($exe){
			$this->session->set_flashdata('success', 'Delete successfully!');
			redirect(base_url('invite/c_invitation'));
		}
	}

	function info()
	{
		$tbl = 'tbl_invitation';
		$tbl2 = 'users';

		$data['user'] = $this->model->geted($tbl2)->num_rows();
		$data['data'] = $this->model->geted($tbl)->num_rows();

		$this->load->view('pages/header');
		$this->load->view('info_v', $data);
		$this->load->view('pages/footer');
	}

}
