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
            $row[] = $item->harga_pokok;
            $row[] = $item->harga_jual;
            $row[] = $item->stok;
            $row[] = $item->status;

            // add html for action
            $row[] = '
        
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal'.$item->id_barang.'"><i class="bx bxs-pencil"></i>Edit</button>
                    <a href="'.site_url('Admin/barang_hapus/'.$item->id_barang).'" onclick="return confirm(\'Yakin hapus data barang'. $item->nama_barang .' ?\')"  class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i> Hapus</a>';            
            
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
            $row[] = '<a href="'.site_url('Admin/pelanggan_edit/'.$item->id_pelanggan).'" class="btn btn-primary btn-sm"><i class="bx bxs-pencil"></i> Edit</a>
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
    

}
