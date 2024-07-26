<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Transaksi_model', 'tramo');
		$this->load->model('Anggota_model', 'anmo');
		$this->load->model('Buku_model', 'bumo');
		$this->damo->checkLoginDashboard();
	}

	public function index()
	{
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title']  	= 'Transaksi';
		$data['transaksi']	= $this->tramo->getTransaksi();
		$this->load->view('templates/header-dashboard', $data);
		$this->load->view('transaksi/index', $data);
		$this->load->view('templates/footer-dashboard', $data);
	}

	public function search()
	{
		$search = $this->input->get('search');

		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['search'] 	= $search;
		$data['transaksi']	= $this->tramo->getTransaksi();
		$data['transaksi']	= $this->tramo->getTransaksiByKeyword($search);
		$data['title']  	= 'Transaksi - ' . $search;
		
		$this->load->view('templates/header-dashboard', $data);
		$this->load->view('transaksi/index', $data);
		$this->load->view('templates/footer-dashboard', $data);
	}

	public function addTransaksi()
	{
		$data['anggota']	= $this->anmo->getAnggota();
		$data['buku']		= $this->bumo->getBuku();
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['title'] 		= 'Tambah Transaksi';

		$this->form_validation->set_rules('id_anggota', 'Nama Anggota', 'required|trim');
		$this->form_validation->set_rules('id_buku', 'Judul Buku', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('transaksi/add_transaksi', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->tramo->addTransaksi();
		}
	}

	public function editTransaksi($id_transaksi = "")
	{
		if ($id_transaksi == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$data['anggota']	= $this->anmo->getAnggota();
		$data['buku']		= $this->bumo->getBuku();
		$data['dataUser']	= $this->damo->getDataUserDashboard();
		$data['transaksi']	= $this->tramo->getTransaksiById($id_transaksi);
		$data['title'] 		= 'Ubah Transaksi - ' . $data['transaksi']['nama_anggota'];
		
		$this->form_validation->set_rules('denda', 'Denda', 'required|trim');
		if ($this->form_validation->run() == false) {
		    $this->load->view('templates/header-dashboard', $data);
		    $this->load->view('transaksi/edit_transaksi', $data);
		    $this->load->view('templates/footer-dashboard', $data);  
		} else {
		    $this->tramo->editTransaksi($id_transaksi);
		}
	}


	public function removeTransaksi($id_transaksi = "")
	{
		if ($id_transaksi == null) {
	        echo "
				<script>
					window.history.back();
				</script>
			";
			exit;
		}

		$this->tramo->removeTransaksi($id_transaksi);
	}
}
