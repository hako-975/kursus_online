<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Peserta_model', 'inmo');
		$this->damo->checkLoginDashboard();
	}

	public function index()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title']  	= 'Peserta';
		$data['peserta']	= $this->inmo->getPeserta();
		$this->load->view('templates/header-dashboard', $data);
		$this->load->view('peserta/index', $data);
		$this->load->view('templates/footer-dashboard', $data);
	}

	public function addPeserta()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title'] 		= 'Tambah Peserta';

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
	    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
	    $this->form_validation->set_rules('verifikasi_password', 'Ulangi Password', 'required|trim|min_length[3]');
	    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
	    $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
	    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('peserta/add_peserta', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->inmo->addPeserta();
		}
	}

	public function editPeserta($id_user = "")
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
		$data['peserta']	= $this->inmo->getPesertaById($id_user);
		$data['title'] 		= 'Ubah Peserta - ' . $data['peserta']['nama'];
		
	    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
	    $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
	    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('peserta/edit_peserta', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->inmo->editPeserta($id_user);
		}
	}


	public function removePeserta($id_user = "")
	{
		if ($id_user == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$this->inmo->removePeserta($id_user);
	}
}
