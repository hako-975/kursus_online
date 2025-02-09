<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Log_model', 'lomo');
	}

	public function index()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title'] 		= 'Riwayat';
		$data['log']   		= $this->lomo->getLog();
		$this->load->view('templates/header-dashboard', $data);
		$this->load->view('log/index', $data);
		$this->load->view('templates/footer-dashboard', $data);
	}
}
