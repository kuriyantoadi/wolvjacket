<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Refund extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_refund');
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
        $data['tampil'] = $this->M_refund->refund_detail();

        $this->load->view('template/header-admin', $header);
        $this->load->view('refund/index', $data);
        $this->load->view('template/footer-admin');
    }

    public function refund_tambah()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $id_user = $this->session->userdata('ses_id');

        $data['tampil'] = $this->M_admin->tampil_barang_stok();
        $data['tampil_kategori'] = $this->M_admin->tampil_kategori_barang();
        $data['tampil_keranjang'] = $this->M_admin->tampil_keranjang_pengguna($id_user);

        $this->load->view('template/header-admin', $header);
        $this->load->view('refund/refund_tambah', $data);
        $this->load->view('template/footer-admin');
    }

    public function refund_tambah_up()
    {
        $id_user = $this->session->userdata('ses_id');
        $cek_keranjang_masuk = $this->M_refund->cek_keranjang_masuk($id_user);

        // var_dump($cek_keranjang_masuk);

        if($cek_keranjang_masuk == NULL){
            $this->session->set_flashdata('msg', '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Proses Gagal, Keranjang Kosong.    
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('Refund/refund_tambah/');
        }

        $no_faktur_awal = $this->M_refund->get_last_no_faktur();
        $cek_seri_no_faktur = $this->M_refund->cek_seri_no_faktur();
        $tgl_skrg = date('dmy');

        if($no_faktur_awal == NULL){
            $no_faktur_refund = 'RF'.$tgl_skrg.'000001';
        }else{
            $akhir_faktur = $cek_seri_no_faktur+1;
            $no_faktur_refund = 'RF'.$tgl_skrg.sprintf("%06d", $akhir_faktur);
        }

        $keterangan = $this->input->post('keterangan');
        $tanggal = date('Y-m-d H:i:s'); // Tanggal dan waktu saat ini

        // Melakukan transfer dari tb_keranjang_masuk ke tb_stok untuk id_user tertentu
        $status = $this->M_refund->transfer_keranjang_ke_refund($id_user, $no_faktur_refund, $keterangan);

        // isi data tb_refund
        $data = array(
            'no_faktur_refund' => $no_faktur_refund,
            'keterangan' => $keterangan,
            'tanggal' => $tanggal,
            'id_user' => $id_user
        );

        $this->M_refund->refund_tambah_up($data);

        $cek_refund = $this->M_refund->get_data_refund($no_faktur_refund);

        $this->session->set_flashdata('msg', '
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Tambah Data Refund Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Refund/index/');

    }

    public function refund_kategori($id_kategori_barang)
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $id_user = $this->session->userdata('ses_id');

        $data['tampil'] = $this->M_admin->tampil_barang_kategori($id_kategori_barang);
        $data['tampil_kategori'] = $this->M_admin->tampil_kategori_barang();
        $data['tampil_keranjang'] = $this->M_admin->tampil_keranjang_pengguna($id_user);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/refund_tambah', $data);
        $this->load->view('template/footer-admin');
    }


    public function tambah_ke_keranjang() {
        $id_user = $this->session->userdata('ses_id');
        $harga_pokok = $this->input->post('harga_pokok');
        $jumlah = $this->input->post('jumlah');
        $idBarang = $this->input->post('id_barang');

        // Dapatkan stok dari database untuk id_barang yang diberikan
        $stok = $this->M_refund->get_stok_barang($idBarang);

        // Pengecekan apakah jumlah stok lebih sedikit dari faktur refund
        if ($stok < $jumlah) {
            echo json_encode(['message' => 'Stok barang tidak mencukupi.']);
            return;
        }

        // Pengecekan apakah id_barang sudah ada dalam keranjang
        if ($this->M_refund->cek_id_barang($idBarang)) {
            echo json_encode(['message' => 'Barang sudah ada dalam keranjang.']);
            return;
        }
        
        $data = array(
            'harga_pokok' => $harga_pokok,
            'jumlah' => $jumlah,
            'id_barang' => $idBarang,
            'id_user' => $id_user
        );

        $result = $this->M_refund->refund_ke_keranjang($data);

        if ($result) {
            echo json_encode(['message' => 'Barang berhasil ditambahkan ke keranjang.']);
        } else {
            echo json_encode(['message' => 'Gagal menambahkan barang ke keranjang.']);
        }
    }


    public function tampil_keranjang() {
        // Mengambil data barang dari model
        $id_user = $this->session->userdata('ses_id');
        $data_keranjang= $this->M_refund->tampil_keranjang_pengguna($id_user);

        // Mengirim data sebagai respons JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data_keranjang));
    }

    public function refund_keranjang_hapus($id_refund_keranjang){
        // $id_proses_stok = $id_proses_stok);

        $success = $this->M_refund->refund_keranjang_hapus($id_refund_keranjang);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus data keranjang berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Refund/refund_tambah/');
    }

    

    public function refund_hapus($id_refund){
        $success = $this->M_refund->refund_hapus($id_refund);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Refund Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Refund/index/');
    }

    public function refund_edit($id_refund)
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $data['tampil'] = $this->M_refund->refund_edit($id_refund);
        $data['tampil_barang'] = $this->M_admin->tampil_barang();
        $data['tampil_barang_modal'] = $this->M_refund->tampil_barang_modal();

        // cari no_faktur dari id_faktur
        $cek_no_faktur = $this->M_refund->refund_edit($id_refund);
        foreach($cek_no_faktur as $row){
            $no_faktur_refund = $row->no_faktur_refund;
        }

        $data['faktur_barang'] = $this->M_refund->get_data_by_no_faktur($no_faktur_refund);

        $this->load->view('template/header-admin', $header);
        $this->load->view('refund/refund_edit', $data);
        $this->load->view('template/footer-admin');
    }

    public function refund_edit_tambah()
    {
        $no_faktur_refund = $this->input->post('no_faktur_refund');
        $id_barang = $this->input->post('id_barang');
        $jumlah = $this->input->post('jumlah');
        $harga_pokok = $this->input->post('harga_pokok');
        $id_refund = $this->input->post('id_refund');

        $stok = $this->M_refund->get_stok_barang($id_barang);

        if ($stok < $jumlah) {
            $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Jumlah <strong> Stok Barang</strong> lebih sedikit dari jumlah <strong> Refund</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');

            // echo "error";
            redirect('Refund/refund_edit/'.$id_refund);

        }else{

            $data = array(
                'no_faktur_refund' => $no_faktur_refund,
                'id_barang' => $id_barang,
                'jumlah' => $jumlah,
                'harga_pokok' => $harga_pokok,
            );

            $this->M_refund->refund_edit_tambah($data);

            // update total refund di tb_refund
            $cek_refund = $this->M_refund->update_total_refund($no_faktur_refund);

            // update total stok di tb_barang
            $cek_total_barang = $this->M_refund->update_total_barang($jumlah, $id_barang);

            $this->session->set_flashdata('msg', '
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Tambah Barang Refund Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');

            // echo "error";
            redirect('Refund/refund_edit/'.$id_refund);
        }

    }

    public function refund_edit_hapus($id_refund_barang, $id_refund)
    {
        // cari no_faktur dari id_faktur
        $cek_no_faktur = $this->M_refund->refund_edit($id_refund);
        foreach($cek_no_faktur as $row){
            $no_faktur_refund = $row->no_faktur_refund;
        }

        $success = $this->M_refund->refund_edit_hapus($id_refund_barang);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Refund Barang Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');

        $cek_refund = $this->M_refund->update_total_refund($no_faktur_refund);

        redirect('Refund/refund_edit/'.$id_refund);
    }

    public function refund_edit_keterangan()
    {
        $id_refund = $this->input->post('id_refund');
        $keterangan = $this->input->post('keterangan');

        $data_edit = array(
            'id_refund' => $id_refund,
            'keterangan' => $keterangan,
        );

        $this->M_refund->refund_edit_keterangan($data_edit, $id_refund);

        $this->session->set_flashdata('msg', '
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Edit Keterangan Refund Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');

        // echo "error";
        redirect('Refund/refund_edit/'.$id_refund);
    }

    public function refund_edit_jumlah()
    {
        $id_refund_barang = $this->input->post('id_refund_barang');
        $id_refund = $this->input->post('id_refund');
        $id_barang = $this->input->post('id_barang');
        $no_faktur_refund = $this->input->post('no_faktur_refund');
        $jumlah_awal = $this->input->post('jumlah_awal');
        $jumlah = $this->input->post('jumlah');

        $jumlah_edit = $jumlah_awal - $jumlah;

        // cek jumlah stok
        $stok = $this->M_refund->get_stok_barang($id_barang);

        // jika jumlah stok lebih sedikit dari jumlah_edit
        if($stok < $jumlah_edit){
            // jika stok kurang dari refund
            $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Update tidak dapat dilakukan, <b>stok kurang dari refund yang di ajukan. </b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');

            // echo "error";
            redirect('Refund/refund_edit/'.$id_refund);

        }else{

            // jika stok cukup untuk refund

            $data_edit = array(
                // 'id_refund_barang' => $id_refund_barang,
                'jumlah' => $jumlah,
            );

            $this->M_refund->refund_edit_jumlah($data_edit, $id_refund_barang);

            // update total stok di tb_barang
            $cek_total_barang = $this->M_refund->update_plus_total_barang($jumlah_edit, $id_barang);

            $cek_refund = $this->M_refund->update_total_refund($no_faktur_refund);

            $this->session->set_flashdata('msg', '
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Edit Jumlah Barang Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');

            // echo "error";
            redirect('Refund/refund_edit/'.$id_refund);
        }

    }
    

}