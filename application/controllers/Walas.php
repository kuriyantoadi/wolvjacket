<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_walas');
        $this->load->library('upload');

        // session login
        if ($this->session->userdata('walas') != true) {
            $url = base_url('Login/admin');
            redirect($url);
        }
    }

    public function index()
    {
        $header['title']='Teacher Award';

        $this->load->view('template/header-walas', $header);
        $this->load->view('walas/index');
        $this->load->view('template/footer-walas');
    }

    public function siswa_jur($id_kelas)
    {
        // var_dump($kode_jurusan);
        $header['title']='Teacher Award';
        $data['tampil'] = $this->M_walas->siswa_jur($id_kelas);
        $data['kelas'] = $this->M_walas->kelas();


        // var_dump($data['tampil_kelas']);
        $this->load->view('template/header-walas', $header);
        $this->load->view('walas/siswa_jur', $data);
        $this->load->view('template/footer-walas');
    }

}
