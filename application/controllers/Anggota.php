<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Anggota_model', 'anmo');
		$this->damo->checkLoginDashboard();
	}

	public function index()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title']  	= 'Anggota';
		$data['anggota']	= $this->anmo->getAnggota();
		$this->load->view('templates/header-admin', $data);
		$this->load->view('anggota/index', $data);
		$this->load->view('templates/footer-admin', $data);
	}

	public function addAnggota()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title'] 		= 'Tambah Anggota';

		$this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required|trim');
		$this->form_validation->set_rules('alamat_anggota', 'Alamat Anggota', 'required|trim');
		$this->form_validation->set_rules('no_telepon_anggota', 'No. Telepon Anggota', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('anggota/add_anggota', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->anmo->addAnggota();
		}
	}

	public function editAnggota($id_anggota = "")
	{
		if ($id_anggota == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['anggota']	= $this->anmo->getAnggotaById($id_anggota);
		$data['title'] 		= 'Ubah Anggota - ' . $data['anggota']['nama_anggota'];
		
		$this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required|trim');
		$this->form_validation->set_rules('alamat_anggota', 'Alamat Anggota', 'required|trim');
		$this->form_validation->set_rules('no_telepon_anggota', 'No. Telepon Anggota', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-admin', $data);
		    $this->load->view('anggota/edit_anggota', $data);
		    $this->load->view('templates/footer-admin', $data);  
		} else {
		    $this->anmo->editAnggota($id_anggota);
		}
	}


	public function removeAnggota($id_anggota = "")
	{
		if ($id_anggota == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$this->anmo->removeAnggota($id_anggota);
	}
}
