<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
	}

	public function index()
	{
		$this->damo->checkLoginDashboard();

		$data['dataUser']		= $this->damo->getDataUserDashboard();
		$data['title'] 			= 'Dashboard';

		$this->load->view('templates/header-dashboard', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer-dashboard', $data);
	}

	public function profile()
	{
		$this->damo->checkLoginDashboard();

		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title'] 		= 'Profil - ' . $data['dataUser']['username'];
		$this->load->view('templates/header-dashboard', $data);
		$this->load->view('dashboard/profile', $data);
		$this->load->view('templates/footer-dashboard', $data);
	}

	public function changePassword()
	{
		$this->damo->checkLoginDashboard();

		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title'] 		= 'Ganti Password - ' . $data['dataUser']['username'];
		$this->form_validation->set_rules('old_password', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim|min_length[3]|matches[verify_new_password]');
		$this->form_validation->set_rules('verify_new_password', 'Verifikasi Password Baru', 'required|trim|min_length[3]|matches[new_password]');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
			$this->load->view('dashboard/change_password', $data);
			$this->load->view('templates/footer-dashboard', $data);
		} else {
		    $this->damo->changePassword();
		}
	}

	public function editProfile()
	{
		$this->damo->checkLoginDashboard();

		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title'] 		= 'Ubah Profil - ' . $data['dataUser']['username'];
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
	    $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
	    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
			$this->load->view('dashboard/edit_profile', $data);
			$this->load->view('templates/footer-dashboard', $data);
		} else {
		    $this->damo->editProfile();
		}
	}
}
