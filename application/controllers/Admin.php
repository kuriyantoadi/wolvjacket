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
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/index');
        $this->load->view('template/footer-admin');
    }


    // awal pengguna 
    public function profil()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $ses_id = $this->session->userdata('ses_id');

        $data['tampil'] = $this->M_admin->user_detail($ses_id);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/profil', $data);
        $this->load->view('template/footer-admin');
    }

    public function profil_up()
    {
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $nama_pengguna = $this->input->post('nama_pengguna');

        $cek_username = $this->M_admin->cek_username($username);

        if(empty($cek_username)){
            // echo "username tidak ada";
            $data_edit = array(
                'username' => $username,
                'nama_pengguna' => $nama_pengguna,
            );

            $data_edit_status = $this->M_admin->user_edit_up($data_edit, $id_user);

            $this->session->set_flashdata('msg', '
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    Edit Username atau Nama Pengguna Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('Admin/profil/');

        }else{
            // echo "username ada";

            $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Edit Username atau Nama Pengguna Gagal, username sudah digunakan
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('Admin/profil/');
            
        }   
        
    }


    public function password()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $ses_id = $this->session->userdata('ses_id');

        $data['tampil'] = $this->M_admin->user_detail($ses_id);

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

        $data_edit_status = $this->M_admin->user_edit_up($data_edit, $id_user);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-info alert-dismissible fade show" role="alert">
                            Edit Password Berhasil
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>');
            redirect('Admin/password/');
    }


    public function pengguna()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $data['tampil'] = $this->M_admin->pengguna_detail();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/pengguna',$data);
        $this->load->view('template/footer-admin');
    }

    public function pengguna_tambah_up()
    {
        $nama_pengguna = htmlspecialchars($this->input->post('nama_pengguna'));
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));
        $status = htmlspecialchars($this->input->post('status'));
        $status_user = htmlspecialchars($this->input->post('status_user'));

        $cek_pengguna = $this->M_admin->cek_username($username);

        foreach ($cek_pengguna as $row)
        {
            $cek_pengguna = $row->username;
        }

        if($username == $cek_pengguna){

            // Jika username sama dengan database
            $this->session->set_flashdata('msg', '
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Tambah Pengguna Gagal, Username Sudah Terpakai
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('Admin/pengguna/');

        }else{

            // Jika username tidak sama dengan database
            $data_tambah = array(
                'nama_pengguna' => $nama_pengguna,
                'username' => $username,
                'password' => sha1($password),
                'status' => $status,
                'status_user' => $status_user,
            );

            $this->M_admin->pengguna_tambah_up($data_tambah);

            $this->session->set_flashdata('msg', '
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    Tambah Pengguna Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('Admin/pengguna/');
        }
    
        
    }

    public function pengguna_edit($id_user)
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $data['tampil'] = $this->M_admin->pengguna_detail($id_user);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/pengguna_edit', $data);
        $this->load->view('template/footer-admin');
    }

    public function pengguna_edit_up()
    {
        $id_user = htmlspecialchars($this->input->post('id_user'));
        $nama_pengguna = htmlspecialchars($this->input->post('nama_pengguna'));
        $username = htmlspecialchars($this->input->post('nama_pengguna'));
        $status = htmlspecialchars($this->input->post('status'));
        $status_user = htmlspecialchars($this->input->post('status_user'));
     
        $data_edit = array(
            'nama_pengguna' => $nama_pengguna,
            'username' => $username,
            'status' => $status,
            'status_user' => $status_user,
        );

        $this->M_admin->pengguna_edit_up($data_edit, $id_user);

        $this->session->set_flashdata('msg', '
		    <div class="alert alert-info alert-dismissible fade show" role="alert">
                Update Data Pengguna Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           ');
        redirect('Admin/pengguna');
    } 

    public function pengguna_password_up()
    {
        $id_user = htmlspecialchars($this->input->post('id_user'));
        $password = htmlspecialchars($this->input->post('password'));
        $password_konfirmasi = htmlspecialchars($this->input->post('password_konfirmasi'));
     
        if($password === $password_konfirmasi){
            $data_edit = array(
                'password' => sha1($password),
            );

            $this->M_admin->pengguna_edit_up($data_edit, $id_user);

            $this->session->set_flashdata('msg', '
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    Reset Password Pengguna Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('Admin/pengguna');

        }else{

             $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Reset Password Pengguna Gagal, Password Baru dan Password Konfirmasi Tidak Sama
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('Admin/pengguna');

        }

        
    } 

    public function pengguna_hapus($id_user){
        $id_user = array('id_user' => $id_user);

        $success = $this->M_admin->pengguna_hapus($id_user);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Pengguna Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/pengguna/');
    }
   
    // akhir pengguna 


    // awal barang

    public function barang()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');

        $data['tampil_kategori'] = $this->M_admin->tampil_kategori_barang();
        $data['tampil_brand'] = $this->M_admin->tampil_brand();
        $data['tampil'] = $this->M_admin->barang_edit();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/barang', $data);
        $this->load->view('template/footer-admin');
    }


    public function barang_tambah_up()
    {
        $nama_barang = $this->input->post('nama_barang');
        $id_kategori_barang = $this->input->post('id_kategori_barang');
        $id_brand = $this->input->post('id_brand');
        $harga_pokok = str_replace(",", "", $this->input->post('harga_pokok'));
        $harga_jual = str_replace(",", "", $this->input->post('harga_jual'));
        $status = $this->input->post('status');


        if($harga_jual >= $harga_pokok){

            $data_tambah = array(
                'nama_barang' => $nama_barang,
                'id_kategori_barang' => $id_kategori_barang,
                'id_brand' => $id_brand,
                'harga_pokok' => $harga_pokok,
                'harga_jual' => $harga_jual,
                'status' => $status
            );

            $this->M_admin->barang_tambah_up($data_tambah);

            $this->session->set_flashdata('msg', '
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    Tambah Data Barang Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('Admin/barang/');

        }else{
            // echo "tidak di ijinkan";

            $this->session->set_flashdata('msg', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Tambah Data Barang Gagal, Harga jual harus lebih mahal dari harga pokok
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('Admin/barang/');

        }

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

    public function barang_edit_up()
    {
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $id_brand = $this->input->post('id_brand');
        $id_kategori_barang = $this->input->post('id_kategori_barang');
        $harga_pokok = str_replace(",", "", $this->input->post('harga_pokok'));
        $harga_jual = str_replace(",", "", $this->input->post('harga_jual'));
        $status = $this->input->post('status');

        // if($harga_jual >= $harga_pokok){
            $data_edit = array(
                'nama_barang' => $nama_barang,
                'id_brand' => $id_brand,
                'id_kategori_barang' => $id_kategori_barang,
                'harga_pokok' => $harga_pokok,
                'harga_jual' => $harga_jual,
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

        // }else{

        //     $this->session->set_flashdata('msg', '
        //         <div class="alert alert-danger alert-dismissible fade show" role="alert">
        //             Tambah Data Barang Gagal, Harga jual harus lebih mahal dari harga pokok
        //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //         </div>');
        //     redirect('Admin/barang/');
        // }
     
    } 

    // akhir barang



    // awal kategori barang

    public function kategori_barang()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $data['tampil'] = $this->M_admin->kategori_barang_detail();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/kategori_barang',$data);
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
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $data['tampil'] = $this->M_admin->brand_detail();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/brand',$data);
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
$header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
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



    // awal data pelanggan

    public function pelanggan()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $data['tampil'] = $this->M_admin->pelanggan_detail();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/pelanggan',$data);
        $this->load->view('template/footer-admin');
    }

    public function pelanggan_tambah_up()
    {
        $nama_pelanggan = htmlspecialchars($this->input->post('nama_pelanggan'));
        $no_hp_pelanggan = htmlspecialchars($this->input->post('no_hp_pelanggan'));
        $alamat_pelanggan = htmlspecialchars($this->input->post('alamat_pelanggan'));
        $kota_pelanggan = htmlspecialchars($this->input->post('kota_pelanggan'));
        $level = htmlspecialchars($this->input->post('level'));

        $data_tambah = array(
            'nama_pelanggan' => $nama_pelanggan,
            'no_hp_pelanggan' => $no_hp_pelanggan,
            'alamat_pelanggan' => $alamat_pelanggan,
            'kota_pelanggan' => $kota_pelanggan,
            'level' => $level,
        );

        $this->M_admin->pelanggan_tambah_up($data_tambah);

        $this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
                Tambah Data Pelanggan Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Admin/pelanggan/');
    }

    public function pelanggan_edit_up()
    {
        $id_pelanggan = htmlspecialchars($this->input->post('id_pelanggan'));
        $nama_pelanggan = htmlspecialchars($this->input->post('nama_pelanggan'));
        $no_hp_pelanggan = htmlspecialchars($this->input->post('no_hp_pelanggan'));
        $alamat_pelanggan = htmlspecialchars($this->input->post('alamat_pelanggan'));
        $kota_pelanggan = htmlspecialchars($this->input->post('kota_pelanggan'));
        $level = htmlspecialchars($this->input->post('level'));
     
        $data_edit = array(
            'nama_pelanggan' => $nama_pelanggan,
            'no_hp_pelanggan' => $no_hp_pelanggan,
            'alamat_pelanggan' => $alamat_pelanggan,
            'kota_pelanggan' => $kota_pelanggan,
            'level' => $level,
        );

        $this->M_admin->pelanggan_edit_up($data_edit, $id_pelanggan);

        // $this->session->set_flashdata('msg', '
		//     <div class="alert alert-info alert-dismissible fade show" role="alert">
        //         Update Data Brand Berhasil
        //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //     </div>
        //    ');
        redirect('Admin/pelanggan');
    } 

    public function pelanggan_hapus($id_pelanggan){
        $id_pelanggan = array('id_pelanggan' => $id_pelanggan);

        $success = $this->M_admin->pelanggan_hapus($id_pelanggan);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Pelanggan Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/pelanggan/');
    }
    // akhir data pelanggan


    // awal tambah stok

    public function tambah_stok()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        $id_user = $this->session->userdata('ses_id');

        $data['tampil'] = $this->M_admin->tampil_barang();
        $data['tampil_keranjang'] = $this->M_admin->tampil_keranjang_pengguna($id_user);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/tambah_stok', $data);
        $this->load->view('template/footer-admin');
    }

    public function tampil_keranjang() {
        // Mengambil data barang dari model
        $id_user = $this->session->userdata('ses_id');
        $data_keranjang= $this->M_admin->tampil_keranjang_pengguna($id_user);

        // Mengirim data sebagai respons JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data_keranjang));
    }

    public function tambah_ke_keranjang() {
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

        $result = $this->M_admin->tambah_ke_keranjang($data);

        if ($result) {
            echo json_encode(['message' => 'Barang berhasil ditambahkan ke keranjang.']);
        } else {
            echo json_encode(['message' => 'Gagal menambahkan barang ke keranjang.']);
        }
    }

    public function keranjang_hapus($id_barang)
    {
        $test = $this->M_admin->keranjang_hapus($id_barang);
        redirect('Admin/tambah_stok');
    }


   public function tambah_stok_up()
    {
        $id_user = $this->session->userdata('ses_id');
        $cek_keranjang_masuk = $this->M_admin->cek_keranjang_masuk($id_user);

        var_dump($cek_keranjang_masuk);

        if($cek_keranjang_masuk == NULL){
            $this->session->set_flashdata('msg', '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Proses Gagal, Keranjang Kosong.    
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');
            redirect('Admin/tambah_stok/');
        }

        $no_faktur_awal = $this->M_admin->get_last_no_faktur();
        $cek_seri_no_faktur = $this->M_admin->cek_seri_no_faktur();
        $tgl_skrg = date('dmy');

        if($no_faktur_awal == NULL){
            $no_faktur = $tgl_skrg.'000001';
        }else{

            $akhir_faktur = $cek_seri_no_faktur+1;
            $no_faktur = $tgl_skrg.sprintf("%06d", $akhir_faktur);
        }

        $keterangan = $this->input->post('keterangan');
        $tgl_tambah_stok = date('Y-m-d H:i:s'); // Tanggal dan waktu saat ini

        // Melakukan transfer dari tb_keranjang_masuk ke tb_stok untuk id_user tertentu
        $status = $this->M_admin->transfer_keranjang_ke_stok($id_user, $no_faktur, $keterangan, $tgl_tambah_stok);


        $this->session->set_flashdata('msg', '
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Tambah Stok Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/tambah_stok/');

    }

    public function daftar_tambah_stok()
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');
        // $data['tambah_stok_detail'] = $this->M_admin->tambah_stok_detail();
        $data['tampil'] = $this->M_admin->tambah_stok_detail();


        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/tambah_stok_daftar', $data);
        $this->load->view('template/footer-admin');
    }

    public function tambah_stok_hapus($no_faktur){
        // $no_faktur = array('no_faktur' => $no_faktur);

        $success = $this->M_admin->tambah_stok_hapus($no_faktur);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Daftar Tambah Stok Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/daftar_tambah_stok/');
    }

    public function tambah_stok_edit($no_faktur)
    {
        $header['title']='WolvJacket';
        $header['ses_nama_pengguna'] = $this->session->userdata('ses_nama_pengguna');

        $data['row_faktur'] = $this->M_admin->tambah_stok_tgl($no_faktur);
        $data['tampil'] = $this->M_admin->tambah_stok_edit($no_faktur);


        $data['no_faktur'] = $no_faktur;
        $data['tgl_faktur'] = $this->M_admin->tambah_stok_tgl($no_faktur);

        // var_dump($data['tgl_faktur']);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/tambah_stok_edit',$data);
        $this->load->view('template/footer-admin');
    }

    public function tambah_stok_edit_up()
    {
        $id_stok = $this->input->post('id_stok');
        $jumlah = $this->input->post('jumlah');
        $no_faktur = $this->input->post('no_faktur');
        
        $data_edit = array(
            'jumlah' => $jumlah,
        );

        $tambah_stok_edit_up = $this->M_admin->tambah_stok_edit_up($data_edit, $id_stok);

        $this->session->set_flashdata('msg', '
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                Update Qty Barang Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Admin/tambah_stok_edit/'.$no_faktur);  
    }

    public function tambah_stok_edit_hapus($id_stok, $no_faktur){
        // $id_stok = array('id_stok' => $id_stok);

        $success = $this->M_admin->tambah_stok_edit_hapus($id_stok);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Stok Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/tambah_stok_edit/'.$no_faktur);
    }

    

    // akhir tambah stok


}
