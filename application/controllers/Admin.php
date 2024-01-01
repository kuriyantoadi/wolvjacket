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

        if ($password_baru != $password_konfirmasi) {
            $this->session->set_flashdata('msg', '
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Edit Password Gagal
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>');
            redirect('Admin/password/');
        }

        $data_edit = array(
            'password' => sha1($password_baru),
        );

        $data_edit_status = $this->M_admin->password_up($data_edit, $id_user);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-info alert-dismissible fade show" role="alert">
                            Edit Password Berhasil
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>');
            redirect('Admin/password/');
    }


    // awal barang

    public function barang()
    {
        $header['title']='WolvJacket';

        $data['tampil_kategori'] = $this->M_admin->tampil_kategori_barang();
        $data['tampil_brand'] = $this->M_admin->tampil_brand();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/barang_tampil', $data);
        $this->load->view('template/footer-admin');
    }

    public function barang_tambah_up()
    {
        $nama_barang = $this->input->post('nama_barang');
        $id_kategori_barang = $this->input->post('id_kategori_barang');
        $id_brand = $this->input->post('id_brand');
        $harga_pokok = $this->input->post('harga_pokok');
        $harga_jual = $this->input->post('harga_jual');
        $stok = $this->input->post('stok');
        $status = $this->input->post('status');

        $data_tambah = array(
            'nama_barang' => $nama_barang,
            'id_kategori_barang' => $id_kategori_barang,
            'id_brand' => $id_brand,
            'harga_pokok' => $harga_pokok,
            'harga_jual' => $harga_jual,
            'stok' => $stok,
            'status' => $status
        );

        $this->M_admin->barang_tambah_up($data_tambah);

        $this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
                Tambah Data Barang Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Admin/barang/');
    }

    public function barang_hapus($id_barang){
        $id_barang = array('id_barang' => $id_barang);

        $success = $this->M_admin->barang_hapus($id_barang);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Barang Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/barang/');
    }

    public function barang_edit($id_barang)
    {
        $header['title']='WolvJacket';
        $data['tampil'] = $this->M_admin->barang_edit($id_barang);
        $data['tampil_kategori'] = $this->M_admin->tampil_kategori_barang();
        $data['tampil_brand'] = $this->M_admin->tampil_brand();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/barang_edit', $data);
        $this->load->view('template/footer-admin');
    }

    public function barang_edit_up()
    {
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $id_brand = $this->input->post('id_brand');
        $id_kategori_barang = $this->input->post('id_kategori_barang');
        $harga_pokok = $this->input->post('harga_pokok');
        $harga_jual = $this->input->post('harga_jual');
        $stok = $this->input->post('stok');
        $status = $this->input->post('status');
     
        $data_edit = array(
            'nama_barang' => $nama_barang,
            'id_brand' => $id_brand,
            'id_kategori_barang' => $id_kategori_barang,
            'harga_pokok' => $harga_pokok,
            'harga_jual' => $harga_jual,
            'stok' => $stok,
            'status' => $status,
        );

        $this->M_admin->barang_edit_up($data_edit, $id_barang);

        $this->session->set_flashdata('msg', '
		    <div class="alert alert-info alert-dismissible fade show" role="alert">
                Update Data Barang Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           ');
        redirect('Admin/barang');
    } 

    // akhir barang



    // awal kategori barang

    public function kategori_barang()
    {
        $header['title']='WolvJacket';

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/kategori_barang');
        $this->load->view('template/footer-admin');
    }

    public function kategori_barang_tambah_up()
    {
        $nama_kategori_barang = $this->input->post('nama_kategori_barang');
    
        $data_tambah = array(
            'nama_kategori_barang' => $nama_kategori_barang,
        );

        $this->M_admin->kategori_barang_tambah_up($data_tambah);

        $this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
                Tambah Data Kategori Barang Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Admin/kategori_barang/');
    }

    public function kategori_barang_edit($id_kategori_barang)
    {
        $header['title']='WolvJacket';
        $data['tampil'] = $this->M_admin->kategori_barang_detail($id_kategori_barang);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/kategori_barang_edit', $data);
        $this->load->view('template/footer-admin');
    }

    public function kategori_barang_edit_up()
    {
        $id_kategori_barang = $this->input->post('id_kategori_barang');
        $nama_kategori_barang = $this->input->post('nama_kategori_barang');
     
        $data_edit = array(
            'nama_kategori_barang' => $nama_kategori_barang,
        );

        $this->M_admin->kategori_barang_edit_up($data_edit, $id_kategori_barang);

        $this->session->set_flashdata('msg', '
		    <div class="alert alert-info alert-dismissible fade show" role="alert">
                Update Data Kategori Barang Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           ');
        redirect('Admin/kategori_barang');
    } 

    public function kategori_barang_hapus($id_kategori_barang){
        $id_kategori_barang = array('id_kategori_barang' => $id_kategori_barang);

        $success = $this->M_admin->kategori_barang_hapus($id_kategori_barang);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Kategori barang Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/kategori_barang/');
    }
    // akhir kategori barang

    // awal brand

    public function brand()
    {
        $header['title']='WolvJacket';

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/brand');
        $this->load->view('template/footer-admin');
    }

    public function brand_tambah_up()
    {
        $nama_brand = $this->input->post('nama_brand');
    
        $data_tambah = array(
            'nama_brand' => $nama_brand,
        );

        $this->M_admin->brand_tambah_up($data_tambah);

        $this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
                Tambah Data Brand Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Admin/brand/');
    }

    public function brand_edit($id_brand)
    {
        $header['title']='WolvJacket';
        $data['tampil'] = $this->M_admin->brand_detail($id_brand);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/brand_edit', $data);
        $this->load->view('template/footer-admin');
    }

    public function brand_edit_up()
    {
        $id_brand = $this->input->post('id_brand');
        $nama_brand = $this->input->post('nama_brand');
     
        $data_edit = array(
            'nama_brand' => $nama_brand,
        );

        $this->M_admin->brand_edit_up($data_edit, $id_brand);

        $this->session->set_flashdata('msg', '
		    <div class="alert alert-info alert-dismissible fade show" role="alert">
                Update Data Brand Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           ');
        redirect('Admin/brand');
    } 

    public function brand_hapus($id_brand){
        $id_brand = array('id_brand' => $id_brand);

        $success = $this->M_admin->brand_hapus($id_brand);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Brand Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/brand/');
    }

    // akhir brand
}
