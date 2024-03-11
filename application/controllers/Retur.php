<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retur extends CI_Controller
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
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/retur');
        $this->load->view('template/footer-admin');
    }

}