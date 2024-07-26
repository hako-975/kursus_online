<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getPeserta()
	{
		$this->db->order_by('nama', 'asc');
		return $this->db->get_where('user', ['jabatan' => 'Peserta'])->result_array();	
	}

	public function getPesertaById($id_user)
	{
		return $this->db->get_where('user', ['id_user' => $id_user, 'jabatan' => 'Peserta'])->row_array();	
	}

	public function addPeserta()
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menambahkan peserta';
		$this->damo->userPrivilege('peserta', $isi_log_2);

		$username = htmlspecialchars($this->input->post('username', true));
        $cek_username = $this->db->get_where('user', ['username' => $username])->num_rows();
        if ($cek_username > 0) {
            $this->session->set_flashdata('message-failed', 'Username sudah digunakan');
            echo "
                <script>
                    window.history.back();
                </script>
            ";
            exit;
        }

        $email = htmlspecialchars($this->input->post('email', true));
        $cek_email = $this->db->get_where('user', ['email' => $email])->num_rows();
        if ($cek_email > 0) {
            $this->session->set_flashdata('message-failed', 'Email sudah digunakan');
            echo "
                <script>
                    window.history.back();
                </script>
            ";
            exit;
        }


        $password = htmlspecialchars($this->input->post('password', true));
        $verifikasi_password = htmlspecialchars($this->input->post('verifikasi_password', true));
        if ($password != $verifikasi_password) {
            $this->session->set_flashdata('message-failed', 'Password harus sama dengan ulangi password');
            echo "
                <script>
                    window.history.back();
                </script>
            ";
            exit;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'username' => $username,
            'password' => $password,
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'no_telepon' => htmlspecialchars($this->input->post('no_telepon', true)),
            'email' => $email,
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'jabatan' => 'Peserta'
        ];

		$this->db->insert('user', $data);

		$isi_log = 'Peserta ' . $data['nama'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('peserta');
	}

	public function editPeserta($id_user)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba mengubah peserta dengan id ' . $id_user;
		$this->damo->userPrivilege('peserta', $isi_log_2);
		
		$data_peserta = $this->getPesertaById($id_user);
		$nama  = $data_peserta['nama'];

		$email = $data_peserta['email'];
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

		$isi_log = 'Peserta ' . $nama . ' berhasil diubah menjadi ' . $data['nama'];
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('peserta');
	}

	public function removePeserta($id_user)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus peserta dengan id ' . $id_user;
		$this->damo->userPrivilege('peserta', $isi_log_2);

		$data_peserta = $this->getPesertaById($id_user);
		$nama = $data_peserta['nama'];

		if (!$this->db->delete('user', ['id_user' => $id_user])) {
		    $isi_log = 'Peserta ' . $nama . ' gagal dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-failed', $isi_log);
		} else {
		    $isi_log = 'Peserta ' . $nama . ' berhasil dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-success', $isi_log);
		}

		redirect('peserta'); 
	}
}