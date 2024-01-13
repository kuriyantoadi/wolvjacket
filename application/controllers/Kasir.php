<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        // $this->load->library('upload');

        // session login
        if ($this->session->userdata('kasir') != true) {
            $url = base_url('Login/admin');
            redirect($url);
        }
    }

    public function index()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');

        $this->load->view('template/header-kasir', $header);
        $this->load->view('kasir/index');
        $this->load->view('template/footer-kasir');
    }


      public function profil()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $ses_id = $this->session->userdata('ses_id');

        $data['tampil'] = $this->M_admin->user_detail($ses_id);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/profil', $data);
        $this->load->view('template/footer-admin');
    }

    public function profil_up()
    {
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $nama_pengguna = $this->input->post('nama_pengguna');

        $cek_username = $this->M_admin->cek_username($username);

        if(empty($cek_username)){
            // echo "username tidak ada";
            $data_edit = array(
                'username' => $username,
                'nama_pengguna' => $nama_pengguna,
            );

            $data_edit_status = $this->M_admin->user_edit_up($data_edit, $id_user);

            $this->session->set_flashdata('msg', '
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    Edit Username atau Nama Pengguna Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('Kasir/profil/');

        }else{
            // echo "username ada";

            $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Edit Username atau Nama Pengguna Gagal, username sudah digunakan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('Kasir/profil/');
            
        }   
        
    }


    public function password()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $ses_id = $this->session->userdata('ses_id');

        $data['tampil'] = $this->M_admin->user_detail($ses_id);

        $this->load->view('template/header-kasir', $header);
        $this->load->view('kasir/password', $data);
        $this->load->view('template/footer-kasir');
    }

    public function password_up()
    {
        $id_user = $this->input->post('id_user');
        $password_baru = $this->input->post('password_baru');
        $password_konfirmasi = $this->input->post('password_konfirmasi');

        if ($password_baru != $password_konfirmasi) {
            $this->session->set_flashdata('msg', '
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Edit Password Gagal
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>');
            redirect('Kasir/password/');
        }

        $data_edit = array(
            'password' => sha1($password_baru),
        );

        $data_edit_status = $this->M_admin->user_edit_up($data_edit, $id_user);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-info alert-dismissible fade show" role="alert">
                            Edit Password Berhasil
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>');
            redirect('Kasir/password/');
    }
	
}
