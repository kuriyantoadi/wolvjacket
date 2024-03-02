<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_laporan');
        // $this->load->library('upload');

        // session login
        if ($this->session->userdata('admin') != true) {
            $url = base_url('Login/admin');
            redirect($url);
        }
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function kartu_stok_barang_datang()
	{
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');

        $this->load->view('template/header-admin', $header);
		$this->load->view('admin/kartu_stok_barang_datang');
        $this->load->view('template/footer-admin');
	}

    public function kartu_stok_barang_datang_up(){

        $tahun_bulan = $this->input->post('tahun_bulan');

        // echo $tahun_bulan;

        // $data['stok_bln_sblmnya'] = $this->M_laporan->stok_bln_sblmnya($stok_bln_sblmnya);
        $data['tampil'] = $this->M_laporan->kartu_stok_barang_datang_view($tahun_bulan);
		
        $this->load->view('admin/kartu_stok_barang_datang_view', $data);
    }

    public function kartu_stok_barang_datang_view()
	{
        $data['tampil'] = $this->M_laporan->kartu_stok_barang_datang_view();
		$this->load->view('admin/kartu_stok_barang_datang_view', $data);
        
	}
}
