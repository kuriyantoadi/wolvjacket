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

        $bulan_tahun = $this->input->post('bulan_tahun');

        $v_bulan = substr($bulan_tahun, 5,2);
        $v_tahun = substr($bulan_tahun, 0,4);
        $bulan = $v_bulan-1;

        if($bulan == 0){
            $tahun = $v_tahun-1;
            $bulan = 12;
        }else{
            $tahun = substr($bulan_tahun, 0,4);
        }

        $stok_bln_sblmnya = $tahun.'-'.sprintf("%02d", $bulan);
        

        $data['stok_bln_sblmnya'] = $this->M_laporan->stok_bln_sblmnya($stok_bln_sblmnya);
        $data['tampil'] = $this->M_laporan->kartu_stok_barang_datang_view();
		
        $this->load->view('admin/kartu_stok_barang_datang_view', $data);
    }

    public function kartu_stok_barang_datang_view()
	{
        $data['tampil'] = $this->M_laporan->kartu_stok_barang_datang_view();
		$this->load->view('admin/kartu_stok_barang_datang_view', $data);
        
	}
}
