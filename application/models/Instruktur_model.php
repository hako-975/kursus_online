<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruktur_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getInstruktur()
	{
		$this->db->order_by('nama', 'asc');
		return $this->db->get_where('user', ['jabatan' => 'Instruktur'])->result_array();	
	}

	public function getInstrukturById($id_user)
	{
		return $this->db->get_where('user', ['id_user' => $id_user, 'jabatan' => 'Instruktur'])->row_array();	
	}

	public function addInstruktur()
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menambahkan instruktur';
		$this->damo->userPrivilege('instruktur', $isi_log_2);

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
            'jabatan' => 'Instruktur'
        ];

		$this->db->insert('user', $data);

		$isi_log = 'Instruktur ' . $data['nama'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('instruktur');
	}

	public function editInstruktur($id_user)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba mengubah instruktur dengan id ' . $id_user;
		$this->damo->userPrivilege('instruktur', $isi_log_2);
		
		$data_instruktur = $this->getInstrukturById($id_user);
		$nama  = $data_instruktur['nama'];

		$email = $data_instruktur['email'];
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

		$isi_log = 'Instruktur ' . $nama . ' berhasil diubah menjadi ' . $data['nama'];
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('instruktur');
	}

	public function removeInstruktur($id_user)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus instruktur dengan id ' . $id_user;
		$this->damo->userPrivilege('instruktur', $isi_log_2);

		$data_instruktur = $this->getInstrukturById($id_user);
		$nama = $data_instruktur['nama'];

		if (!$this->db->delete('user', ['id_user' => $id_user])) {
		    $isi_log = 'Instruktur ' . $nama . ' gagal dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-failed', $isi_log);
		} else {
		    $isi_log = 'Instruktur ' . $nama . ' berhasil dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-success', $isi_log);
		}

		redirect('instruktur'); 
	}
}