<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getUser()
	{
		return $this->db->get('user')->result_array();

	}

	public function getUserById($id_user)
	{
		return $this->db->get_where('user', ['id_user' => $id_user])->row_array();	
	}

	public function addUser()
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'Pengguna ' . $dataUser['username'] . ' mencoba menambahkan user';
		$this->damo->userPrivilege('user', $isi_log_2);
		
		$data = [
			'nama' 	=> ucwords($this->input->post('nama', true)),
			'username' 		=> htmlspecialchars($this->input->post('username', true)),
			'password'		=> password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
		];

		$this->db->insert('user', $data);

		$isi_log = 'Pengguna ' . $data['username'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('user');
	}

	public function editUser($id_user)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'Pengguna ' . $dataUser['username'] . ' mencoba mengubah user dengan id ' . $id_user;
		$this->damo->userPrivilege('user', $isi_log_2);

		$data_user = $this->getUserById($id_user);
		$username  = $data_user['username'];

		$data = [
			'nama' 	=> ucwords($this->input->post('nama', true)),
			'username' 		=> htmlspecialchars($this->input->post('username', true))
		];

		$this->db->update('user', $data, ['id_user' => $id_user]);

		$isi_log = 'Pengguna ' . $username . ' berhasil diubah';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('user');
	}

	public function removeUser($id_user)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'Pengguna ' . $dataUser['username'] . ' mencoba menghapus user dengan id ' . $id_user;
		$this->damo->userPrivilege('user', $isi_log_2);

		
		$data_user = $this->getUserById($id_user);
		$username  = $data_user['username'];

		if (!$this->db->delete('user', ['id_user' => $id_user])) {
		    $isi_log = 'Pengguna ' . $username . ' gagal dihapus';
			$this->lomo->addLog($isi_log, $dataUser['id_user']);
			$this->session->set_flashdata('message-failed', $isi_log);
		} else {
			$isi_log = 'Pengguna ' . $username . ' berhasil dihapus';
			$this->lomo->addLog($isi_log, $dataUser['id_user']);
			$this->session->set_flashdata('message-success', $isi_log);
		}

		redirect('user'); 
	}
}