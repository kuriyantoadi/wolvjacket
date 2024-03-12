<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ajax');
        $this->load->model('M_ajax_kategori_barang');
        $this->load->model('M_ajax_brand');
        $this->load->model('M_ajax_pengguna');
        $this->load->model('M_ajax_pelanggan');
        $this->load->model('M_ajax_tambah_stok');
        $this->load->model('M_ajax_atur_stok');
        $this->load->model('M_ajax_retur');


        // $this->load->library('upload');

        // session login
        if ($this->session->userdata('admin') != true) {
            $url = base_url('Login/admin');
            redirect($url);
        }
    }

    function ajax_barang() {
        $list = $this->M_ajax->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nama_barang;
            $row[] = $item->nama_brand;
            $row[] = $item->nama_kategori_barang;
            $row[] = 'Rp '. number_format($item->harga_pokok);
            $row[] = 'Rp '. number_format($item->harga_jual);;
            $row[] = 'perbaikan';
            $row[] = $item->status;

            // add html for action
            $row[] = '
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal'.$item->id_barang.'"><i class="bx bxs-pencil"></i></button>
                    <a href="'.site_url('Admin/barang_hapus/'.$item->id_barang).'" onclick="return confirm(\'Yakin hapus data barang'. $item->nama_barang .' ?\')"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></a>';            
            
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_ajax->count_all(),
                    "recordsFiltered" => $this->M_ajax->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    function ajax_kategori_barang() {
        $list = $this->M_ajax_kategori_barang->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nama_kategori_barang;

            // add html for action
            $row[] = '
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal'.$item->id_kategori_barang.'"><i class="bx bxs-pencil"></i>Edit</button>
                    <a href="'.site_url('Admin/kategori_barang_hapus/'.$item->id_kategori_barang).'" onclick="return confirm(\'Yakin hapus data kategori barang '. $item->nama_kategori_barang .' ?\')"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_ajax_kategori_barang->count_all(),
                    "recordsFiltered" => $this->M_ajax_kategori_barang->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    function ajax_brand() {
        $list = $this->M_ajax_brand->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nama_brand;

            // add html for action
            $row[] = '
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal'.$item->id_brand.'"><i class="bx bxs-pencil"></i>Edit</button>
                    <a href="'.site_url('Admin/brand_hapus/'.$item->id_brand).'" onclick="return confirm(\'Yakin hapus data kategori barang '. $item->nama_brand .' ?\')"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_ajax_brand->count_all(),
                    "recordsFiltered" => $this->M_ajax_brand->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    function ajax_pengguna() {
        $list = $this->M_ajax_pengguna->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nama_pengguna;
            $row[] = $item->username;
            $row[] = $item->status;
            $row[] = $item->status_user;
            
            // add html for action
            $row[] = '
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal'.$item->id_user.'"><i class="bx bxs-pencil"></i>Edit</button>
                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#resetPasswordModal'.$item->id_user.'"><i class="bx bxs-key"></i>Password</button>
                    <a href="'.site_url('Admin/pengguna_hapus/'.$item->id_user).'" onclick="return confirm(\'Yakin hapus data Pengguna '. $item->nama_pengguna .' ?\')"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_ajax_pengguna->count_all(),
                    "recordsFiltered" => $this->M_ajax_pengguna->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    function ajax_pelanggan() {
        $list = $this->M_ajax_pelanggan->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nama_pelanggan;
            $row[] = $item->no_hp_pelanggan;
            $row[] = $item->alamat_pelanggan;
            $row[] = $item->kota_pelanggan;
            $row[] = $item->level;
            
            // add html for action
            $row[] = '
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal'.$item->id_pelanggan.'"><i class="bx bxs-pencil"></i>Edit</button>
                    <a href="'.site_url('Admin/pelanggan_hapus/'.$item->id_pelanggan).'" onclick="return confirm(\'Yakin hapus data Pelanggan '. $item->nama_pelanggan .' ?\')"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_ajax_pelanggan->count_all(),
                    "recordsFiltered" => $this->M_ajax_pelanggan->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    function ajax_tambah_stok_daftar() {
        $list = $this->M_ajax_tambah_stok->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $item->no_faktur;
            $row[] = $item->tgl_tambah_stok;
            $row[] = 'Rp '. number_format($item->total_harga_pokok);
            $row[] = $item->total_barang;
            $row[] = $item->id_user;
            $row[] = $item->keterangan;

            // Add HTML for action (detail button)
            $row[] = '
                <a href="'.site_url('Admin/tambah_stok_hapus/'.$item->no_faktur).'" onclick="return confirm(\'Yakin hapus data tambah stok dengan faktur '. $item->no_faktur .' ?\')"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>
                <a href="'.site_url('Admin/tambah_stok_edit/'.$item->no_faktur).'"   class="btn btn-info btn-sm"><i class="bx bxs-edit"></i> Edit</a>
                <a class="btn btn-success btn-sm" href="' . site_url('Admin/tambah_stok_print/' . $item->no_faktur) . '"><i class="bx bxs-printer"></i>Print</a>                        
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal'.$item->no_faktur.'"><i class="bx bxs-detail"></i>Detail</button>
            ';            

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->M_ajax_tambah_stok->count_all(), // Fixed model name
            "recordsFiltered" => $this->M_ajax_tambah_stok->count_filtered(), // Fixed model name
            "data" => $data,
        );
        // Output to JSON format
        echo json_encode($output);
    }

    function ajax_atur_stok() {
        $list = $this->M_ajax_atur_stok->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->id_proses_stok;
            $row[] = $item->tahun_bulan;
            $row[] = $item->total_stok_masuk;
            $row[] = 'Rp '. number_format($item->total_stok_masuk * $item->harga_pokok);

            // Add HTML for action (detail button)
            $row[] = '
                <a href="'.site_url('Admin/atur_stok_hapus/'.$item->id_proses_stok).'" onclick="return confirm(\'Yakin hapus data stok akhir '. $item->id_proses_stok .' ?\')"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal'.$item->id_proses_stok.'"><i class="bx bxs-detail"></i>Detail</button>
            ';            

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->M_ajax_atur_stok->count_all(), // Fixed model name
            "recordsFiltered" => $this->M_ajax_atur_stok->count_filtered(), // Fixed model name
            "data" => $data,
        );
        // Output to JSON format
        echo json_encode($output);
    }

    function ajax_retur() {
        $list = $this->M_ajax_retur->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->no_faktur_retur;
            $row[] = $item->tanggal;
            // $row[] = 'Rp '. number_format($item->total_stok_masuk * $item->harga_pokok);
            $row[] = 'Rp '. number_format($item->total_harga);
            $row[] = $item->total_jumlah;
            $row[] = $item->id_user;
            $row[] = $item->keterangan;

            // add html for action
            $row[] = '
                    <a class="btn btn-warning btn-sm" ><i class="bx bxs-printer"></i></a>
                    <a class="btn btn-primary btn-sm" ><i class="bx bxs-pencil"></i></a>
                    <a href="'.site_url('Retur/retur_hapus/'.$item->id_retur).'" onclick="return confirm(\'Yakin hapus data barang'. $item->no_faktur_retur .' ?\')"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></a>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal'.$item->id_retur.'"><i class="bx bxs-detail"></i></button>
                ';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_ajax_retur->count_all(),
                    "recordsFiltered" => $this->M_ajax_retur->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    

}
