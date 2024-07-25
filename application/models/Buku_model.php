<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getBuku()
	{
		$this->db->order_by('judul_buku', 'asc');
		return $this->db->get('buku')->result_array();	
	}

	public function getBukuById($id_buku)
	{
		return $this->db->get_where('buku', ['id_buku' => $id_buku])->row_array();	
	}

	public function addBuku()
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menambahkan buku';
		$this->damo->userPrivilege('buku', $isi_log_2);

		$data = [
			'judul_buku' => ucwords(htmlspecialchars($this->input->post('judul_buku', true))),
			'tahun_buku' => ucwords(htmlspecialchars($this->input->post('tahun_buku', true))),
			'penerbit_buku' => ucwords(htmlspecialchars($this->input->post('penerbit_buku', true))),
			'penulis_buku' => ucwords(htmlspecialchars($this->input->post('penulis_buku', true))),
			'stok_buku' => htmlspecialchars($this->input->post('stok_buku', true))
		];

		$this->db->insert('buku', $data);

		$isi_log = 'Buku ' . $data['judul_buku'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('buku');
	}

	public function editBuku($id_buku)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba mengubah buku dengan id ' . $id_buku;
		$this->damo->userPrivilege('buku', $isi_log_2);

		$data_buku = $this->getBukuById($id_buku);
		$judul_buku  = $data_buku['judul_buku'];
		$data = [
			'judul_buku' => ucwords(strtolower(htmlspecialchars($this->input->post('judul_buku', true)))),
			'tahun_buku' => ucwords(htmlspecialchars($this->input->post('tahun_buku', true))),
			'penerbit_buku' => ucwords(htmlspecialchars($this->input->post('penerbit_buku', true))),
			'penulis_buku' => ucwords(htmlspecialchars($this->input->post('penulis_buku', true))),
			'stok_buku' => htmlspecialchars($this->input->post('stok_buku', true))
		];

		$this->db->update('buku', $data, ['id_buku' => $id_buku]);

		$isi_log = 'Buku ' . $judul_buku . ' berhasil diubah menjadi ' . $data['judul_buku'];
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('buku');
	}

	public function removeBuku($id_buku)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus buku dengan id ' . $id_buku;
		$this->damo->userPrivilege('buku', $isi_log_2);

		$data_buku = $this->getBukuById($id_buku);
		$judul_buku = $data_buku['judul_buku'];

		if (!$this->db->delete('buku', ['id_buku' => $id_buku])) {
		    $isi_log = 'Buku ' . $judul_buku . ' gagal dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-failed', $isi_log);
		} else {
		    $isi_log = 'Buku ' . $judul_buku . ' berhasil dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-success', $isi_log);
		}

		redirect('buku'); 
	}
}