<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ajax');
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
            $row[] = $item->harga_produk;
            $row[] = $item->harga_jual;
            $row[] = $item->stok;
            $row[] = $item->nama_kategori_barang;
            $row[] = $item->status;

            // add html for action
            $row[] = '<a href="'.site_url('Admin/barang_edit/'.$item->id_barang).'" class="btn btn-primary btn-sm"><i class="bx bxs-pencil"></i> Edit</a>
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
    

}
