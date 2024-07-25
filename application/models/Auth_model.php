<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model', 'damo');
    }

    public function loginDashboard()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        if ($dataUser = $this->damo->getDataUserDashboardByUsername($username)) 
        {
            if (password_verify($password, $dataUser['password'])) 
            {
                $dataSession = [
                    'id_user' => $dataUser['id_user']
                ];

                $this->session->set_userdata($dataSession);
                redirect('dashboard');
                exit;
            }
            else
            {
                $this->session->set_flashdata('message-failed', 'Gagal masuk, password yang anda masukkan salah');
                echo "
                    <script>
                        window.history.back();
                    </script>
                ";
                exit;
            }
        }
        else
        {
            $this->session->set_flashdata('message-failed', 'Gagal masuk, username yang anda masukkan salah');
            echo "
                <script>
                    window.history.back();
                </script>
            ";
            exit;
        }
    }

    public function registrasi()
    {
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

        $this->session->set_flashdata('message-success', 'Registrasi berhasil, silahkan login');
        redirect('auth');
    }
}
