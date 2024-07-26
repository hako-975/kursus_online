<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kursus_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getKursus()
	{
		$this->db->join('user', 'kursus.id_user=user.id_user', 'left');
		$this->db->order_by('judul_kursus', 'asc');
		return $this->db->get('kursus')->result_array();	
	}

	public function getKursusById($id_kursus)
	{
		return $this->db->get_where('kursus', ['id_kursus' => $id_kursus])->row_array();	
	}

	public function addKursus()
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menambahkan kursus';
		$this->damo->userPrivilege('kursus', $isi_log_2);

		$cover_kursus = $_FILES['cover_kursus']['name'];
		if ($cover_kursus) {
		    $config['upload_path'] = './assets/img/img_cover_kursus/';
		    $config['allowed_types'] = 'gif|jpg|png|jpeg';

		    $this->load->library('upload', $config);

		    if ($this->upload->do_upload('cover_kursus')) {
		        $new_cover_kursus = $this->upload->data('file_name');
		        $this->db->set('cover_kursus', $new_cover_kursus);
		    } else {
		        $this->session->set_flashdata('message-failed', $this->upload->display_errors());
		        echo "
		            <script>
		                window.history.back();
		            </script>
		        ";
		        exit;
		    }
		} else {
		    $this->db->set('cover_kursus', 'default.png');
		}

		$data = [
			'judul_kursus' => htmlspecialchars($this->input->post('judul_kursus', true)),
			'deskripsi_kursus' => htmlspecialchars($this->input->post('deskripsi_kursus', true)),
			'id_user' => $dataUser['id_user']
		];

		$this->db->insert('kursus', $data);

		$isi_log = 'Kursus ' . $data['judul_kursus'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('kursus');
	}

	public function editKursus($id_kursus)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba mengubah kursus dengan id ' . $id_kursus;
		$this->damo->userPrivilege('kursus', $isi_log_2);

		$data_kursus = $this->getKursusById($id_kursus);
		$judul_kursus  = $data_kursus['judul_kursus'];

		$cover_kursus = $_FILES['cover_kursus']['name'];
		if ($cover_kursus) 
		{
			$config['upload_path'] = './assets/img/img_cover_kursus/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('cover_kursus')) 
			{
				$old_cover_kursus = $data_kursus['cover_kursus'];
				if ($old_cover_kursus != 'default.png') 
				{
					$file_path = FCPATH . 'assets/img/img_cover_kursus/' . $data_kursus['cover_kursus'];
					if (file_exists($file_path)) {
						unlink($file_path);
					}
				}
				$new_cover_kursus = $this->upload->data('file_name');
				$this->db->set('cover_kursus', $new_cover_kursus);
			}
			else 
			{
				$this->session->set_flashdata('message-failed', $this->upload->display_errors());
		        echo "
		            <script>
		                window.history.back();
		            </script>
		        ";
		        exit;
			}
		}
		
		$data = [
			'judul_kursus' => htmlspecialchars($this->input->post('judul_kursus', true)),
			'deskripsi_kursus' => htmlspecialchars($this->input->post('deskripsi_kursus', true)),
			'id_user' => $dataUser['id_user']
		];

		$this->db->update('kursus', $data, ['id_kursus' => $id_kursus]);

		$isi_log = 'Kursus ' . $judul_kursus . ' berhasil diubah menjadi ' . $data['judul_kursus'];
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('kursus');
	}

	public function removeKursus($id_kursus)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus kursus dengan id ' . $id_kursus;
		$this->damo->userPrivilege('kursus', $isi_log_2);

		$data_kursus = $this->getKursusById($id_kursus);
		$judul_kursus = $data_kursus['judul_kursus'];
		
		if ($data_kursus['cover_kursus'] != 'default.png') {
			$file_path = FCPATH . 'assets/img/img_cover_kursus/' . $data_kursus['cover_kursus'];
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}

		if (!$this->db->delete('kursus', ['id_kursus' => $id_kursus])) {
		    $isi_log = 'Kursus ' . $judul_kursus . ' gagal dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-failed', $isi_log);
		} else {
		    $isi_log = 'Kursus ' . $judul_kursus . ' berhasil dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-success', $isi_log);
		}

		redirect('kursus'); 
	}
}