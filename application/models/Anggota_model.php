<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getAnggota()
	{
		$this->db->order_by('nama_anggota', 'asc');
		return $this->db->get('anggota')->result_array();	
	}

	public function getAnggotaById($id_anggota)
	{
		return $this->db->get_where('anggota', ['id_anggota' => $id_anggota])->row_array();	
	}

	public function addAnggota()
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menambahkan anggota';
		$this->damo->userPrivilege('anggota', $isi_log_2);

		$data = [
			'nama_anggota' => ucwords(htmlspecialchars($this->input->post('nama_anggota', true))),
			'alamat_anggota' => ucwords(htmlspecialchars($this->input->post('alamat_anggota', true))),
			'no_telepon_anggota' => ucwords(htmlspecialchars($this->input->post('no_telepon_anggota', true)))
		];

		$this->db->insert('anggota', $data);

		$isi_log = 'Anggota ' . $data['nama_anggota'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('anggota');
	}

	public function editAnggota($id_anggota)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba mengubah anggota dengan id ' . $id_anggota;
		$this->damo->userPrivilege('anggota', $isi_log_2);

		$data_anggota = $this->getAnggotaById($id_anggota);
		$nama_anggota  = $data_anggota['nama_anggota'];
		$data = [
			'nama_anggota' => ucwords(strtolower(htmlspecialchars($this->input->post('nama_anggota', true)))),
			'alamat_anggota' => ucwords(htmlspecialchars($this->input->post('alamat_anggota', true))),
			'no_telepon_anggota' => ucwords(htmlspecialchars($this->input->post('no_telepon_anggota', true)))
		];

		$this->db->update('anggota', $data, ['id_anggota' => $id_anggota]);

		$isi_log = 'Anggota ' . $nama_anggota . ' berhasil diubah menjadi ' . $data['nama_anggota'];
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('anggota');
	}

	public function removeAnggota($id_anggota)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus anggota dengan id ' . $id_anggota;
		$this->damo->userPrivilege('anggota', $isi_log_2);

		$data_anggota = $this->getAnggotaById($id_anggota);
		$nama_anggota = $data_anggota['nama_anggota'];

		if (!$this->db->delete('anggota', ['id_anggota' => $id_anggota])) {
		    $isi_log = 'Anggota ' . $nama_anggota . ' gagal dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-failed', $isi_log);
		} else {
		    $isi_log = 'Anggota ' . $nama_anggota . ' berhasil dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-success', $isi_log);
		}

		redirect('anggota'); 
	}
}