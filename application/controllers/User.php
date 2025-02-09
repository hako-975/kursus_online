<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('User_model', 'usmo');

		$this->damo->checkLoginDashboard();
	}

	public function index()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title']  	= 'User';
		$data['user']	= $this->usmo->getUser();
	
		$this->load->view('templates/header-dashboard', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer-dashboard', $data);
	}

	public function addUser()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title'] 		= 'Tambah User';
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password_verify]');
		$this->form_validation->set_rules('password_verify', 'Verifikasi Password', 'required|trim|min_length[3]|matches[password]');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('user/add_user', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->usmo->addUser();
		}
	}

	public function editUser($id_user = "")
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
		$data['user']  		= $this->usmo->getUserById($id_user);
		$data['title'] 		= 'Ubah User - ' . $data['user']['username'];
		
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('user/edit_user', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->usmo->editUser($id_user);
		}
	}

	public function removeUser($id_user = "")
	{
		if ($id_user == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$this->usmo->removeUser($id_user);
	}
}
