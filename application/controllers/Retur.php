<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_retur');
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

    public function retur_tambah()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $id_user = $this->session->userdata('ses_id');

        $data['tampil'] = $this->M_admin->tampil_barang_stok();
        $data['tampil_kategori'] = $this->M_admin->tampil_kategori_barang();
        $data['tampil_keranjang'] = $this->M_admin->tampil_keranjang_pengguna($id_user);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/retur_tambah', $data);
        $this->load->view('template/footer-admin');
    }

    public function retur_kategori($id_kategori_barang)
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $id_user = $this->session->userdata('ses_id');

        $data['tampil'] = $this->M_admin->tampil_barang_kategori($id_kategori_barang);
        $data['tampil_kategori'] = $this->M_admin->tampil_kategori_barang();
        $data['tampil_keranjang'] = $this->M_admin->tampil_keranjang_pengguna($id_user);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/retur_tambah', $data);
        $this->load->view('template/footer-admin');
    }

    public function retur_ke_keranjang() {
        $id_user = $this->session->userdata('ses_id');
        $harga_pokok = $this->input->post('harga_pokok');
        $jumlah = $this->input->post('jumlah');
        $idBarang = $this->input->post('id_barang');

        // Pengecekan apakah id_barang sudah ada dalam keranjang
        if ($this->M_admin->cek_id_barang($idBarang)) {
            echo json_encode(['message' => 'Barang sudah ada dalam keranjang.']);
            return;
        }

        $data = array(
            'harga_pokok' => $harga_pokok,
            'jumlah' => $jumlah,
            'id_barang' => $idBarang,
            'id_user' => $id_user
        );

        $result = $this->M_admin->retur_ke_keranjang($data);

        if ($result) {
            echo json_encode(['message' => 'Barang berhasil ditambahkan ke keranjang.']);
        } else {
            echo json_encode(['message' => 'Gagal menambahkan barang ke keranjang.']);
        }
    }

    public function retur_tambah_up()
    {
        $id_user = $this->session->userdata('ses_id');
        $cek_keranjang_masuk = $this->M_retur->cek_keranjang_masuk($id_user);

        // var_dump($cek_keranjang_masuk);

        if($cek_keranjang_masuk == NULL){
            $this->session->set_flashdata('msg', '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Proses Gagal, Keranjang Kosong.    
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('Retur/retur_tambah/');
        }

        $no_faktur_awal = $this->M_retur->get_last_no_faktur();
        $cek_seri_no_faktur = $this->M_retur->cek_seri_no_faktur();
        $tgl_skrg = date('dmy');

        if($no_faktur_awal == NULL){
            $no_faktur_retur = $tgl_skrg.'000001';
        }else{
            $akhir_faktur = $cek_seri_no_faktur+1;
            $no_faktur_retur = $tgl_skrg.sprintf("%06d", $akhir_faktur);
        }

        $keterangan = $this->input->post('keterangan');
        $tgl_tambah_stok = date('Y-m-d H:i:s'); // Tanggal dan waktu saat ini

        // Melakukan transfer dari tb_keranjang_masuk ke tb_stok untuk id_user tertentu
        $status = $this->M_retur->transfer_keranjang_ke_retur($id_user, $no_faktur_retur, $keterangan, $tgl_tambah_stok);


        // $this->session->set_flashdata('msg', '
        //     <div class="alert alert-primary alert-dismissible fade show" role="alert">
        //             Tambah Stok Berhasil
        //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //     </div>
        // ');
        // redirect('Admin/tambah_stok/');

    }

}