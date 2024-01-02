<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {
        // $header['title']='Teacher Award';
        // $this->load->view('siswa/login', $header);

        echo "Halaman Tidak Bisa di Akses";
    }

    public function Admin()
    {
        $header['title']='Login WolvJacket';
        $this->load->view('admin/login', $header);
    }

    // Login Admin
    public function admin_login()
    {
        $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
        $password = sha1(htmlspecialchars($this->input->post('password', true), ENT_QUOTES));

        $cek_login = $this->M_login->admin_login($username, $password);

        if ($cek_login->num_rows() > 0) {
            $data = $cek_login->row_array();

            if ($data['status'] == 'admin' && $data['status_user'] == 'aktif') {
                $this->session->set_userdata('admin', true);
                $this->session->set_userdata('ses_id', $data['id_user']);
                $this->session->set_userdata('ses_username', $data['username']);
                redirect('Admin/index');
            // } elseif ($data['status'] == 'walas') {
            //     $this->session->set_userdata('walas', true);
            //     $this->session->set_userdata('ses_id', $data['id_admin']);
            //     $this->session->set_userdata('ses_user', $data['username']);
            //     redirect('Walas/index');
            } else {
                $url = base_url('Admin/index');
                echo $this->session->set_flashdata('msg', '

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password Salah<br> Silahkan Login Kembali
                </div>
                ');
                redirect($url);
            }
        }

        $this->session->set_flashdata('msg', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Username atau Password Salah<br> Silahkan Login Kembali
    </div>
    ');
        $url = base_url('Admin/index');
        redirect($url);
    }

    public function admin_logout()
    {
        $this->session->sess_destroy();
        redirect('Login/admin');
    }
}
