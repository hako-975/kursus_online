<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Kursus_model', 'kumo');
		$this->load->model('Materi_model', 'mamo');
		$this->damo->checkLoginDashboard();
	}

	public function index($id_kursus = null)
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
		$data['kursus']		= $this->kumo->getKursusById($id_kursus);
		$data['title']  	= 'Materi Kursus - ' . $data['kursus']['judul_kursus'];
		$data['materi']	= $this->mamo->getMateriByIdKursus($id_kursus);
		$this->load->view('templates/header-dashboard', $data);
		$this->load->view('materi/index', $data);
		$this->load->view('templates/footer-dashboard', $data);
	}

	public function addMateri($id_kursus = null)
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
		$data['kursus']		= $this->kumo->getKursusById($id_kursus);
		$data['title'] 		= 'Tambah Materi Kursus - ' . $data['kursus']['judul_kursus'];

		$this->form_validation->set_rules('judul_materi', 'Judul Materi', 'required|trim');
		$this->form_validation->set_rules('deskripsi_materi', 'Deskripsi Materi', 'required|trim');
		$this->form_validation->set_rules('urutan_materi', 'Urutan Materi', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('materi/add_materi', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->mamo->addMateri($id_kursus);
		}
	}

	public function editMateri($id_materi = "")
	{
		if ($id_materi == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['materi']	= $this->mamo->getMateriById($id_materi);
		$data['title'] 		= 'Ubah Materi - ' . $data['materi']['judul_materi'];
		
		$this->form_validation->set_rules('judul_materi', 'Judul Materi', 'required|trim');
		$this->form_validation->set_rules('deskripsi_materi', 'Deskripsi Materi', 'required|trim');
		$this->form_validation->set_rules('urutan_materi', 'Urutan Materi', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('materi/edit_materi', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->mamo->editMateri($id_materi);
		}
	}


	public function removeMateri($id_materi = "")
	{
		if ($id_materi == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$this->mamo->removeMateri($id_materi);
	}
}
