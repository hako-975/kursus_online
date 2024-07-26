<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruktur extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Instruktur_model', 'inmo');
		$this->damo->checkLoginDashboard();
	}

	public function index()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title']  	= 'Instruktur';
		$data['instruktur']	= $this->inmo->getInstruktur();
		$this->load->view('templates/header-dashboard', $data);
		$this->load->view('instruktur/index', $data);
		$this->load->view('templates/footer-dashboard', $data);
	}

	public function addInstruktur()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title'] 		= 'Tambah Instruktur';

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
	    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
	    $this->form_validation->set_rules('verifikasi_password', 'Ulangi Password', 'required|trim|min_length[3]');
	    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
	    $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
	    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('instruktur/add_instruktur', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->inmo->addInstruktur();
		}
	}

	public function editInstruktur($id_user = "")
	{
		if ($id_user == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['instruktur']	= $this->inmo->getInstrukturById($id_user);
		$data['title'] 		= 'Ubah Instruktur - ' . $data['instruktur']['nama'];
		
	    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
	    $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
	    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('instruktur/edit_instruktur', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->inmo->editInstruktur($id_user);
		}
	}


	public function removeInstruktur($id_user = "")
	{
		if ($id_user == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$this->inmo->removeInstruktur($id_user);
	}
}
