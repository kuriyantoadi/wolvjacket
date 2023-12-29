<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        // $this->load->library('upload');

        // session login
        if ($this->session->userdata('admin') != true) {
            $url = base_url('Login/admin');
            redirect($url);
        }
    }

    public function index()
    {
        $header['title']='WolvJacket';

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/index');
        $this->load->view('template/footer-admin');
    }

    public function password()
    {
        $header['title']='WolvJacket';
        $ses_id = $this->session->userdata('ses_id');

        // var_dump($ses_id);

        $data['tampil'] = $this->M_admin->password($ses_id);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/password', $data);
        $this->load->view('template/footer-admin');
    }

    public function password_up()
    {
        $id_user = $this->input->post('id_user');
        $password_baru = $this->input->post('password_baru');
        $password_konfirmasi = $this->input->post('password_konfirmasi');

        if($password_baru == $password_konfirmasi){

            $data_edit = array(
                'password' => sha1($password_baru)
            );

            $this->M_admin->password_up($data_edit, $id_user);

            $this->session->set_flashdata('msg', '
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    Update Password Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('Admin/password');

        }else{

            $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password Baru dan Password Konfirmasi tidak sesuai
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('Admin/password');
        }
        
    } 

}
