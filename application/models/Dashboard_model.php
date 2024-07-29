<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model', 'lomo');
	}

	public function checkLoginDashboard()
	{
		if (!$this->session->userdata('id_user')) 
		{
			redirect('auth');
		}
	}

	public function getDataUserDashboard()
	{
		$id_user = $this->session->userdata('id_user');
		return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
	}

	public function getDataUserDashboardByUsername($username)
	{
		return $this->db->get_where('user', ['username' => $username])->row_array();
	}

	public function getDataUserDashboardByEmail($email)
	{
		return $this->db->get_where('user', ['email' => $email])->row_array();
	}

	public function getUserTokenByToken($email, $token)
	{
		return $this->db->get_where('user_token', ['email' => $email, 'token' => $token])->row_array();
	}

	public function userPrivilege($redirect = 'dashboard', $isi2 = '')
	{
		$dataUser = $this->getDataUserDashboard();
		if ($dataUser['jabatan'] != 'Administrator') {
			$isi = 'Akses ditolak! Karena jabatan anda sebagai ' . $dataUser['jabatan'] . '! Hubungi Administrator untuk melakukan perubahan ';
			$isi .= ucfirst($isi2);

			$this->session->set_flashdata('message-failed', $isi);
			
			$id_user = $dataUser['id_user'];
			$this->lomo->addLog($isi, $id_user);
			redirect($redirect);
			exit();
		}
	}

	public function changePassword()
	{
		$dataUser 	= $this->getDataUserDashboard();
		$id_user 	= $dataUser['id_user'];

		// check old password
		$old_password = $this->input->post('old_password', true);

		if (password_verify($old_password, $dataUser['password'])) 
		{
			$new_password = password_hash($this->input->post('new_password', true), PASSWORD_DEFAULT);

			$data = [
				'password' => $new_password
			];

			$this->db->update('user', $data, ['id_user' => $id_user]);

			$isi_log = "Password berhasil diubah";
			$this->lomo->addLog($isi_log, $id_user);
			$this->session->set_flashdata('message-success', $isi_log);
			redirect('dashboard/profile');
		}
		else
		{
			$isi_log = "Password gagal diubah, password lama tidak sesuai";
			$this->lomo->addLog($isi_log, $id_user);
			$this->session->set_flashdata('message-failed', $isi_log);
			redirect('dashboard/changePassword');
		}
	}

	public function editProfile()
	{
		$dataUser 	= $this->getDataUserDashboard();
		$id_user 	= $dataUser['id_user'];
		
		$email = $dataUser['email'];
		$email_edit = htmlspecialchars($this->input->post('email', true));
		
		// email baru
		if ($email != $email_edit) {
			// cek email sudah digunakan atau belum
			$cek_email = $this->db->get_where('user', ['email' => $email_edit])->num_rows();
	        if ($cek_email > 0) {
	            $this->session->set_flashdata('message-failed', 'Email sudah digunakan');
	            echo "
	                <script>
	                    window.history.back();
	                </script>
	            ";
	            exit;
	        }
		}

		$data = [
			'nama' => htmlspecialchars($this->input->post('nama', true)),
			'no_telepon' => htmlspecialchars($this->input->post('no_telepon', true)),
			'email' => $email_edit,
			'alamat' => htmlspecialchars($this->input->post('alamat', true))
		];

		$this->db->update('user', $data, ['id_user' => $id_user]);

		$isi_log = "Profil berhasil diubah";
		$this->lomo->addLog($isi_log, $id_user);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('dashboard/profile');
	}
}