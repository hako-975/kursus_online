<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getMateriByIdKursus($id_kursus)
	{
		$this->db->order_by('urutan_materi', 'asc');
		return $this->db->get_where('materi', ['materi.id_kursus' => $id_kursus])->result_array();	
	}

	public function getMateriById($id_materi)
	{
		return $this->db->get_where('materi', ['materi.id_materi' => $id_materi])->row_array();	
	}

	public function addMateri($id_kursus)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menambahkan materi';
		$this->damo->userPrivilege('materi', $isi_log_2);

		$video_materi = $_FILES['video_materi']['name'];
		if ($video_materi) {
		    $config['upload_path'] = './assets/video/video_materi/';
		    $config['allowed_types'] = 'mp4|m4v|mov|asf|avi|wmv|m2ts|3g2|mkv|webm';

		    $this->load->library('upload', $config);

		    if ($this->upload->do_upload('video_materi')) {
		        $new_video_materi = $this->upload->data('file_name');
		        $this->db->set('video_materi', $new_video_materi);
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
		    $this->db->set('video_materi', 'default.png');
		}
		$data = [
			'judul_materi' => htmlspecialchars($this->input->post('judul_materi', true)),
			'deskripsi_materi' => htmlspecialchars($this->input->post('deskripsi_materi', true)),
			'urutan_materi' => htmlspecialchars($this->input->post('urutan_materi', true)),
			'id_kursus' => $id_kursus
		];

		$this->db->insert('materi', $data);

		$isi_log = 'Materi ' . $data['judul_materi'] . ' berhasil ditambahkan';
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);
		redirect('materi/index/' . $id_kursus);
	}

	public function editMateri($id_materi)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba mengubah materi dengan id ' . $id_materi;
		$this->damo->userPrivilege('materi', $isi_log_2);

		$data_materi = $this->getMateriById($id_materi);
		$judul_materi  = $data_materi['judul_materi'];

		$video_materi = $_FILES['video_materi']['name'];
		if ($video_materi) 
		{
			$config['upload_path'] = './assets/video/video_materi/';
			$config['allowed_types'] = 'mp4|m4v|mov|asf|avi|wmv|m2ts|3g2|mkv|webm';
		
			$this->load->library('upload', $config);
		
			if ($this->upload->do_upload('video_materi')) 
			{
				$old_video_materi = $data_materi['video_materi'];
				if ($old_video_materi != 'default.png') 
				{
					$file_path = FCPATH . 'assets/video/video_materi/' . $data_materi['video_materi'];
					if (file_exists($file_path)) {
						unlink($file_path);
					}
				}
				$new_video_materi = $this->upload->data('file_name');
				$this->db->set('video_materi', $new_video_materi);
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
			'judul_materi' => htmlspecialchars($this->input->post('judul_materi', true)),
			'deskripsi_materi' => htmlspecialchars($this->input->post('deskripsi_materi', true)),
			'urutan_materi' => htmlspecialchars($this->input->post('urutan_materi', true))
		];

		$this->db->update('materi', $data, ['id_materi' => $id_materi]);

		$isi_log = 'Materi ' . $judul_materi . ' berhasil diubah menjadi ' . $data['judul_materi'];
		$this->lomo->addLog($isi_log, $dataUser['id_user']);
		$this->session->set_flashdata('message-success', $isi_log);

		$id_kursus = $data_materi['id_kursus'];
		redirect('materi/index/' . $id_kursus);
	}

	public function removeMateri($id_materi)
	{
		$dataUser = $this->damo->getDataUserDashboard();
		$isi_log_2 = 'User ' . $dataUser['username'] . ' mencoba menghapus materi dengan id ' . $id_materi;
		$this->damo->userPrivilege('materi', $isi_log_2);

		$data_materi = $this->getMateriById($id_materi);
		$judul_materi = $data_materi['judul_materi'];
		
		if ($data_materi['video_materi'] != 'default.png') {
			$file_path = FCPATH . 'assets/video/video_materi/' . $data_materi['video_materi'];
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}

		if (!$this->db->delete('materi', ['id_materi' => $id_materi])) {
		    $isi_log = 'Materi ' . $judul_materi . ' gagal dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-failed', $isi_log);
		} else {
		    $isi_log = 'Materi ' . $judul_materi . ' berhasil dihapus';
		    $this->lomo->addLog($isi_log, $dataUser['id_user']);
		    $this->session->set_flashdata('message-success', $isi_log);
		}

		$id_kursus = $data_materi['id_kursus'];
		redirect('materi/index/' . $id_kursus);
	}
}