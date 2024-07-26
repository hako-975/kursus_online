<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kursus extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Kursus_model', 'kumo');
		$this->damo->checkLoginDashboard();
	}

	public function index()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title']  	= 'Kursus';
		$data['kursus']	= $this->kumo->getKursus();
		$this->load->view('templates/header-dashboard', $data);
		$this->load->view('kursus/index', $data);
		$this->load->view('templates/footer-dashboard', $data);
	}

	public function addKursus()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title'] 		= 'Tambah Kursus';

		$this->form_validation->set_rules('judul_kursus', 'Judul Kursus', 'required|trim');
		$this->form_validation->set_rules('deskripsi_kursus', 'Deskripsi Kursus', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('kursus/add_kursus', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->kumo->addKursus();
		}
	}

	public function editKursus($id_kursus = "")
	{
		if ($id_kursus == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['kursus']	= $this->kumo->getKursusById($id_kursus);
		$data['title'] 		= 'Ubah Kursus - ' . $data['kursus']['judul_kursus'];
		
		$this->form_validation->set_rules('judul_kursus', 'Judul Kursus', 'required|trim');
		$this->form_validation->set_rules('deskripsi_kursus', 'Deskripsi Kursus', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('kursus/edit_kursus', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->kumo->editKursus($id_kursus);
		}
	}


	public function removeKursus($id_kursus = "")
	{
		if ($id_kursus == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$this->kumo->removeKursus($id_kursus);
	}
}
