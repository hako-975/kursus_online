<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Buku_model', 'bumo');
		$this->damo->checkLoginDashboard();
	}

	public function index()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title']  	= 'Buku';
		$data['buku']	= $this->bumo->getBuku();
		$this->load->view('templates/header-admin', $data);
		$this->load->view('buku/index', $data);
		$this->load->view('templates/footer-admin', $data);
	}

	public function addBuku()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title'] 		= 'Tambah Buku';

		$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|trim');
		$this->form_validation->set_rules('tahun_buku', 'Tahun Buku', 'required|trim');
		$this->form_validation->set_rules('penerbit_buku', 'Penerbit Buku', 'required|trim');
		$this->form_validation->set_rules('penulis_buku', 'Penulis Buku', 'required|trim');
		$this->form_validation->set_rules('stok_buku', 'Stok Buku', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('buku/add_buku', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->bumo->addBuku();
		}
	}

	public function editBuku($id_buku = "")
	{
		if ($id_buku == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['buku']	= $this->bumo->getBukuById($id_buku);
		$data['title'] 		= 'Ubah Buku - ' . $data['buku']['judul_buku'];
		
		$this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|trim');
		$this->form_validation->set_rules('tahun_buku', 'Tahun Buku', 'required|trim');
		$this->form_validation->set_rules('penerbit_buku', 'Penerbit Buku', 'required|trim');
		$this->form_validation->set_rules('penulis_buku', 'Penulis Buku', 'required|trim');
		$this->form_validation->set_rules('stok_buku', 'Stok Buku', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('buku/edit_buku', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->bumo->editBuku($id_buku);
		}
	}


	public function removeBuku($id_buku = "")
	{
		if ($id_buku == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$this->bumo->removeBuku($id_buku);
	}
}
