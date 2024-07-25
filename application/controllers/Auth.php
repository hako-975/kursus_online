<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model', 'aumo');
	}

	public function checkLogin()
	{
		if ($this->session->userdata('id_user')) 
		{
			redirect('dashboard');		
		}
	}

	public function index()
	{
		$this->checkLogin();

		$data['title'] = 'Login';
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header', $data);
		    $this->load->view('auth/index', $data);
		    $this->load->view('templates/footer', $data);  
		} else {
		    $this->aumo->loginDashboard();
		}
	}

	public function registrasi()
	{
	    $this->checkLogin();

	    $data['title'] = 'Registrasi';
	    $this->form_validation->set_rules('username', 'Username', 'required|trim');
	    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
	    $this->form_validation->set_rules('verifikasi_password', 'Ulangi Password', 'required|trim|min_length[3]');
	    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
	    $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'required|trim');
	    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
	    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
	    if ($this->form_validation->run() == false) {
	        $this->load->view('templates/header', $data);
	        $this->load->view('auth/registrasi', $data);
	        $this->load->view('templates/footer', $data);  
	    } else {
	        $this->aumo->registrasi();
	    }
	}


	public function lupaPassword()
	{
		$this->checkLogin();

		$data['title'] = 'Lupa Password';
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header', $data);
		    $this->load->view('auth/lupa_password', $data);
		    $this->load->view('templates/footer', $data);  
		} else {
		    $this->aumo->lupaPassword();
		}
	}

	public function resetPassword()
	{
		$this->checkLogin();
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		if ($this->admo->getDataUserAdminByEmail($email)) {
			if ($this->admo->getUserTokenByToken($email, $token)) {
				$this->session->set_userdata('email_reset_password', $email);
				$this->session->set_userdata('token_reset_password', $token);
				$this->changePassword();
			}
			else
			{
				$isi_log = "Token tidak valid";
				$this->session->set_flashdata('message-failed', $isi_log);
				redirect('auth/login');	
			}
		}
		else
		{
			$isi_log = "Email tidak terdaftar";
			$this->session->set_flashdata('message-failed', $isi_log);
			redirect('auth/login');	
		}
	}

	public function changePassword()
	{
		if ($email = $this->session->userdata('email_reset_password') && $token = $this->session->userdata('token_reset_password')) {
			$data['title'] = 'Reset Password';
			$data['laporan_terbuka'] = $this->lamo->getLaporanTerbuka();
			$this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim|min_length[3]|matches[verify_new_password]');
			$this->form_validation->set_rules('verify_new_password', 'Verifikasi Password Baru', 'required|trim|min_length[3]|matches[new_password]');
			if ($this->form_validation->run() == false) {
			    $this->load->view('templates/header', $data);
			    $this->load->view('auth/reset_password', $data);
			    $this->load->view('templates/footer', $data);  
			} else {
			    $this->aumo->changePassword();
			}
		} 
		else
		{
			redirect('auth/lupaPassword');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		session_destroy();
		redirect('auth');
	}
}