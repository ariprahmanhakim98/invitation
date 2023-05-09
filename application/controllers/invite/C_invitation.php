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
		$where = array('name' => $this->input->post('data'));

		$data['list'] 		= null;
		if ($this->input->post('data')) {
			$data['list'] = $this->model->getlist($tbl, $where);
		}

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
		redirect('http://localhost/myApps');
	}


	function create()
	{
		$permission = "0";
		$akses  	= $this->uri->segment('2');
		$cek		= $this->menu->getuserpermision($akses, $this->session->userdata('levelid'));
		if ($cek->add) :
			$permission = 1;
		endif;

		if ($permission > 0) {

			$this->form_validation->set_rules('deskripsiplaning', 'deskripsiplaning', 'required');
			$this->form_validation->set_rules('waktukerja', 'waktukerja', 'required');


			if ($this->form_validation->run() == TRUE) {
				//$userlevel	=$this->input->post('userlevel');
				$kodeplan	= $this->_uniknumber->generateKode(
					'P',
					$this->input->post('group'),
					'trans_planning',
					'planing_code',
					'create_date',
					date('Y-m')
				);
				$data		= array(
					'planing_code'			=>	$kodeplan,
					'planing_description'	=>	$this->input->post('deskripsiplaning'),
					'planing_times'			=>  $this->input->post('waktukerja'),
					'divisi'				=>	$this->session->userdata('divisi'),
					'subdivisi'				=>	$this->session->userdata('subdivisi'),
					'create_add'			=>	$this->session->userdata('userid'),

				);
				$activity		= "Menambah data $akses  Kode $akses  $kodeplan";
				$this->planning_m->_insert('trans_planning', $data);
				$this->_simpanhistory($activity);
				$this->session->set_flashdata('mesagge', '<div class="callout callout-info">
							<h4>Succcess !</h4>
							<p>Data Berhasil Disimpan</p>
						</div>');
				redirect(base_url($this->uri->segment('1') . "/" . $this->uri->segment('2')) . '/add', 'refresh');
			} else {
				$this->session->set_flashdata('mesagge', '<div class="callout callout-danger">
				<h4>Warning <span class="fa fa-times text-right"></span></h4>
				<p> Data gagal Disimpan</p>
			  </div>');
				redirect(base_url($this->uri->segment('1') . "/" . $this->uri->segment('2')) . '/add', 'refresh');
			}
		} else {
			redirect('pages/error_404', 'refresh');
		}
	}

	function edit()
	{
		$module  	= $this->uri->segment('1');
		$akses  	= $this->uri->segment('2');
		$permission = "0";
		$cek		= $this->menu->getuserpermision($akses, $this->session->userdata('levelid'));
		if ($cek->edit == 'Y') :
			$permission = 1;
		endif;

		if ($permission > 0) {
			$data['content']	= $module . '/' . $akses . '/edit_v';
			$data['module']		= 'Websales';
			$data['title']		= 'Revisi Obs';
			$data['detail']		= 'Revisi Obs';
			$data['link']		= $module . '/' . $akses;
			$data['role_akses']	= $cek;
			$data['obsheader']	= $this->modelrevisi->getdataobsbyid($this->uri->segment('4'))->row();
			$data['obsdetail']	= $this->modelrevisi->getdataobsd($this->uri->segment('4'))->result();
			$data['mscustomer']	= $this->modelrevisi->getmscustomer($this->uri->segment('4'))->result();
			$data['mssales']	= $this->modelrevisi->getmssales($this->uri->segment('4'))->result();
			$data['mscounter']	= $this->modelrevisi->getmscounter($this->uri->segment('4'))->result();
			$data['mskain']		= $this->modelrevisi->getmskain($this->uri->segment('4'))->result();
			$data['mswarna']	= $this->modelrevisi->getmswarna($this->uri->segment('4'))->result();
			$data['msgramasi']	= $this->modelrevisi->getmsgramasi($this->uri->segment('4'))->result();
			$data['mslebar']	= $this->modelrevisi->getmslebar($this->uri->segment('4'))->result();
			$data['mstipeorder']	= $this->modelrevisi->getordertype($this->uri->segment('4'))->result();


			$this->load->view($this->menus, $data);
		} else {
			redirect('pages/error_404', 'refresh');
		}
	}


	function view()
	{
		$module  	= $this->uri->segment('1');
		$akses  	= $this->uri->segment('2');
		$permission = "0";
		$cek		= $this->menu->getuserpermision($akses, $this->session->userdata('levelid'));
		if ($cek->edit == 'Y') :
			$permission = 1;
		endif;

		if ($permission > 0) {
			$data['content']	= $module . '/' . $akses . '/view';
			$data['module']		= 'Laporan';
			$data['title']		= 'Laporan';
			$data['detail']		= 'Lihat Planing Kerja';
			$data['link']		= $module . '/' . $akses;
			$data['role_akses']	= $cek;
			$data['report']		= $this->planning_m->getreportbyreportid($this->uri->segment('4'))->row();

			$this->load->view($this->menus, $data);
		} else {
			redirect('pages/error_404', 'refresh');
		}
	}

	function saveobsd()
	{
		$namakain = $this->input->post('nm_kain');
		$nmwarna = $this->input->post('nm_warna');
		$gramasi = $this->input->post('gramasi');
		$lebar = $this->input->post('lebar');
		$rol = $this->input->post('rol');
		$harga = $this->input->post('harga');

		$data = array(
			'nm_kain' => $namakain,
			'nm_warna' => $nmwarna,
			'gramasi' => $gramasi,
			'lebar' => $lebar,
			'rol' => $rol,
			'harga' => $harga,

		);
		$where = array('obs_h_id' => $this->input->post('obs_h_id'));
		$this->modelrevisi->_insertobsd("obs_d", $data, $where);
	}
}
