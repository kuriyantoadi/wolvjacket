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
        $data['tampil'] = $this->M_retur->retur_detail();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/retur', $data);
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
            $no_faktur_retur = 'RT'.$tgl_skrg.'000001';
        }else{
            $akhir_faktur = $cek_seri_no_faktur+1;
            $no_faktur_retur = 'RT'.$tgl_skrg.sprintf("%06d", $akhir_faktur);
        }

        $keterangan = $this->input->post('keterangan');
        $tanggal = date('Y-m-d H:i:s'); // Tanggal dan waktu saat ini

        // Melakukan transfer dari tb_keranjang_masuk ke tb_stok untuk id_user tertentu
        $status = $this->M_retur->transfer_keranjang_ke_retur($id_user, $no_faktur_retur, $keterangan);

        // isi data tb_retur
        $data = array(
            'no_faktur_retur' => $no_faktur_retur,
            'keterangan' => $keterangan,
            'tanggal' => $tanggal,
            'id_user' => $id_user
        );

        $this->M_retur->retur_tambah_up($data);

        $cek_retur = $this->M_retur->get_data_retur($no_faktur_retur);

        $this->session->set_flashdata('msg', '
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Tambah Data Retur Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Retur/index/');

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


    public function tambah_ke_keranjang() {
        $id_user = $this->session->userdata('ses_id');
        $harga_pokok = $this->input->post('harga_pokok');
        $jumlah = $this->input->post('jumlah');
        $idBarang = $this->input->post('id_barang');

        // Dapatkan stok dari database untuk id_barang yang diberikan
        $stok = $this->M_retur->get_stok_barang($idBarang);

        // Pengecekan apakah jumlah stok lebih sedikit dari faktur retur
        if ($stok < $jumlah) {
            echo json_encode(['message' => 'Stok barang tidak mencukupi.']);
            return;
        }

        // Pengecekan apakah id_barang sudah ada dalam keranjang
        if ($this->M_retur->cek_id_barang($idBarang)) {
            echo json_encode(['message' => 'Barang sudah ada dalam keranjang.']);
            return;
        }
        
        $data = array(
            'harga_pokok' => $harga_pokok,
            'jumlah' => $jumlah,
            'id_barang' => $idBarang,
            'id_user' => $id_user
        );

        $result = $this->M_retur->retur_ke_keranjang($data);

        if ($result) {
            echo json_encode(['message' => 'Barang berhasil ditambahkan ke keranjang.']);
        } else {
            echo json_encode(['message' => 'Gagal menambahkan barang ke keranjang.']);
        }
    }


    public function tampil_keranjang() {
        // Mengambil data barang dari model
        $id_user = $this->session->userdata('ses_id');
        $data_keranjang= $this->M_retur->tampil_keranjang_pengguna($id_user);

        // Mengirim data sebagai respons JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data_keranjang));
    }

    public function retur_keranjang_hapus($id_retur_keranjang){
        // $id_proses_stok = $id_proses_stok);

        $success = $this->M_retur->retur_keranjang_hapus($id_retur_keranjang);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus data keranjang berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Retur/retur_tambah/');
    }

    

    public function retur_hapus($id_retur){
        $success = $this->M_retur->retur_hapus($id_retur);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Retur Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Retur/index/');
    }

    public function retur_edit($id_retur)
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $data['tampil'] = $this->M_retur->retur_edit($id_retur);
        $data['tampil_barang'] = $this->M_admin->tampil_barang();
        $data['tampil_barang_modal'] = $this->M_retur->tampil_barang_modal();

        // cari no_faktur dari id_faktur
        $cek_no_faktur = $this->M_retur->retur_edit($id_retur);
        foreach($cek_no_faktur as $row){
            $no_faktur_retur = $row->no_faktur_retur;
        }

        $data['faktur_barang'] = $this->M_retur->get_data_by_no_faktur($no_faktur_retur);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/retur_edit', $data);
        $this->load->view('template/footer-admin');
    }

    public function retur_edit_tambah()
    {
        $no_faktur_retur = $this->input->post('no_faktur_retur');
        $id_barang = $this->input->post('id_barang');
        $jumlah = $this->input->post('jumlah');
        $harga_pokok = $this->input->post('harga_pokok');
        $id_retur = $this->input->post('id_retur');

        $stok = $this->M_retur->get_stok_barang($id_barang);

        if ($stok < $jumlah) {
            $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Jumlah <strong> Stok Barang</strong> lebih sedikit dari jumlah <strong> Retur</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');

            // echo "error";
            redirect('Retur/retur_edit/'.$id_retur);

        }else{

            $data = array(
                'no_faktur_retur' => $no_faktur_retur,
                'id_barang' => $id_barang,
                'jumlah' => $jumlah,
                'harga_pokok' => $harga_pokok,
            );

            $this->M_retur->retur_edit_tambah($data);

            // update total retur di tb_retur
            $cek_retur = $this->M_retur->update_total_retur($no_faktur_retur);

            // update total stok di tb_barang
            $cek_total_barang = $this->M_retur->update_total_barang($jumlah, $id_barang);

            $this->session->set_flashdata('msg', '
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Tambah Barang Retur Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');

            // echo "error";
            redirect('Retur/retur_edit/'.$id_retur);
        }

    }

    public function retur_edit_hapus($id_retur_barang, $id_retur)
    {
        // cari no_faktur dari id_faktur
        $cek_no_faktur = $this->M_retur->retur_edit($id_retur);
        foreach($cek_no_faktur as $row){
            $no_faktur_retur = $row->no_faktur_retur;
        }

        $success = $this->M_retur->retur_edit_hapus($id_retur_barang);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Retur Barang Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');

        $cek_retur = $this->M_retur->update_total_retur($no_faktur_retur);

        redirect('Retur/retur_edit/'.$id_retur);
    }

    public function retur_edit_keterangan()
    {
        $id_retur = $this->input->post('id_retur');
        $keterangan = $this->input->post('keterangan');

        $data_edit = array(
            'id_retur' => $id_retur,
            'keterangan' => $keterangan,
        );

        $this->M_retur->retur_edit_keterangan($data_edit, $id_retur);

        $this->session->set_flashdata('msg', '
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Edit Keterangan Retur Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');

        // echo "error";
        redirect('Retur/retur_edit/'.$id_retur);
    }

    public function retur_edit_jumlah()
    {
        $id_retur_barang = $this->input->post('id_retur_barang');
        $id_retur = $this->input->post('id_retur');
        $id_barang = $this->input->post('id_barang');
        $no_faktur_retur = $this->input->post('no_faktur_retur');
        $jumlah_awal = $this->input->post('jumlah_awal');
        $jumlah = $this->input->post('jumlah');

        $jumlah_edit = $jumlah_awal - $jumlah;

        // cek jumlah stok
        $stok = $this->M_retur->get_stok_barang($id_barang);

        // jika jumlah stok lebih sedikit dari jumlah_edit
        if($stok > $jumlah_edit){
            // jika stok kurang dari retur
            $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Update tidak dapat dilakukan, <b>stok kurang dari retur yang di ajukan. </b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');

            // echo "error";
            redirect('Retur/retur_edit/'.$id_retur);

        }else{

            // jika stok cukup untuk retur

            $data_edit = array(
                // 'id_retur_barang' => $id_retur_barang,
                'jumlah' => $jumlah,
            );

            $this->M_retur->retur_edit_jumlah($data_edit, $id_retur_barang);

            // update total stok di tb_barang
            $cek_total_barang = $this->M_retur->update_plus_total_barang($jumlah_edit, $id_barang);

            $cek_retur = $this->M_retur->update_total_retur($no_faktur_retur);

            $this->session->set_flashdata('msg', '
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Edit Jumlah Barang Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');

            // echo "error";
            redirect('Retur/retur_edit/'.$id_retur);
        }

    }
    

}