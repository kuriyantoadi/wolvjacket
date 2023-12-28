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
        $header['title']='Teacher Award';

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/index');
        $this->load->view('template/footer-admin');
    }

    public function siswa_jur($kode_jurusan)
    {
        // var_dump($kode_jurusan);
        $header['title']='Teacher Award';
        $data['tampil'] = $this->M_admin->siswa_jur($kode_jurusan);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/siswa_jur', $data);
        $this->load->view('template/footer-admin');
    }

    public function kelas()
    {
        $header['title']='Teacher Award';
        $data['tampil'] = $this->M_admin->tampil_kelas();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/kelas', $data);
        $this->load->view('template/footer-admin');
    }

    public function kelas_tambah()
    {
        $header['title']='Teacher Award';
        // $data['tampil'] = $this->M_admin->tampil_kelas();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/kelas_tambah');
        $this->load->view('template/footer-admin');
    }

    public function kelas_tambah_up()
    {
       $tingkatan = $this->input->post('tingkatan');
        $nama_jurusan = $this->input->post('nama_jurusan');
        $kode_kelas = $this->input->post('kode_kelas');
        $kode_jurusan = $this->input->post('kode_jurusan');

        $data_tambah = array(
            'tingkatan' => $tingkatan,
            'nama_jurusan' => $nama_jurusan,
            'kode_kelas' => $kode_kelas,
            'kode_jurusan' => $kode_jurusan
        );

        $this->M_admin->kelas_tambah_up($data_tambah);

        $this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
                Tambah Data Kelas Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Admin/kelas');
    } 

    public function siswa_pass($id_siswa)
    {
        $header['title']='Teacher Award';
        $data['tampil'] = $this->M_admin->siswa_detail($id_siswa);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/siswa_pass', $data);
        $this->load->view('template/footer-admin');
    }

    public function siswa_pass_up()
    {
        $id_siswa = $this->input->post('id_siswa');
        $password = sha1($this->input->post('password'));
        
        $data_edit = array(
            'password' => $password
        );

        $this->M_admin->siswa_edit_up($data_edit, $id_siswa);

        $this->session->set_flashdata('msg', '
		    <div class="alert alert-info alert-dismissible fade show" role="alert">
                Update Password
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           ');
        redirect('Admin/siswa');
    } 

    public function siswa_edit($id_siswa)
    {
        $header['title']='Teacher Award';
        $data['tampil'] = $this->M_admin->siswa_detail($id_siswa);
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/siswa_edit', $data);
        $this->load->view('template/footer-admin');
    }

    public function siswa_edit_up()
    {
        $id_siswa = $this->input->post('id_siswa');
        $nisn_siswa = $this->input->post('nisn_siswa');
        $nama_siswa = $this->input->post('nama_siswa');
        $id_kelas = $this->input->post('id_kelas');

        
        $data_edit = array(
            'nisn_siswa' => $nisn_siswa,
            'nama_siswa' => $nama_siswa,
            'id_kelas' => $id_kelas
        );

        $this->M_admin->siswa_edit_up($data_edit, $id_siswa);

        $this->session->set_flashdata('msg', '
		    <div class="alert alert-info alert-dismissible fade show" role="alert">
                Update Data Siswa
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           ');
        redirect('Admin/siswa');
    } 

    public function siswa_tambah()
    {
        $header['title']='Teacher Award';
        $data['tampil'] = $this->M_admin->tampil_kelas();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/siswa_tambah', $data);
        $this->load->view('template/footer-admin');
    }

    public function siswa_tambah_up()
    {
        $nisn_siswa = $this->input->post('nisn_siswa');
        $id_kelas = $this->input->post('id_kelas');
        $nama_siswa = $this->input->post('nama_siswa');
        $password = sha1($this->input->post('password'));

        $data_tambah = array(
            'nisn_siswa' => $nisn_siswa,
            'nama_siswa' => $nama_siswa,
            'id_kelas' => $id_kelas,
            'password' => $password,
            'status' => 'siswa'
        );

        $this->M_admin->siswa_tambah_up($data_tambah);

        $this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
                Tambah Data Siswa Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Admin/siswa_jur/akl/');
    }

    public function siswa_hapus($id_siswa){
        $id_siswa = array('id_siswa' => $id_siswa);

        $success = $this->M_admin->siswa_hapus($id_siswa);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Siswa Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/siswa_jur/');
    }

    public function kelas_hapus($id_kelas){
        $id_kelas = array('id_kelas' => $id_kelas);

        $success = $this->M_admin->kelas_hapus($id_kelas);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                    Hapus Kelas Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/Kelas/');
    }

    
    // awal guru

    public function guru()
    {
        $header['title']='Teacher Award';
        $data['tampil'] = $this->M_admin->guru();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/guru', $data);
        $this->load->view('template/footer-admin');
    }

    public function guru_tambah()
    {
        $header['title']='Teacher Award';
        $data['tampil_mapel'] = $this->M_admin->mapel();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/guru_tambah', $data);
        $this->load->view('template/footer-admin');
    }

    public function guru_tambah_up()
    {
        $nama_guru = $this->input->post('nama_guru');
        $id_mapel = $this->input->post('id_mapel');

        $data_tambah = array(
            'nama_guru' => $nama_guru,
            'id_mapel' => $id_mapel,
        );

        $this->M_admin->guru_tambah_up($data_tambah);

        $this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
                Tambah Guru Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Admin/guru');
    } 

    public function guru_hapus($id_guru){
        $id_guru = array('id_guru' => $id_guru);

        $success = $this->M_admin->guru_hapus($id_guru);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Guru Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/guru/');
    }

    public function guru_edit($id_guru)
    {
        $header['title']='Teacher Award';
        $data['tampil'] = $this->M_admin->guru_detail($id_guru);
        $data['tampil_mapel'] = $this->M_admin->mapel();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/guru_edit', $data);
        $this->load->view('template/footer-admin');
    }

    public function guru_edit_up()
    {
        $id_guru = $this->input->post('id_guru');
        $nama_guru = $this->input->post('nama_guru');
        $id_mapel = $this->input->post('id_mapel');
        
        $data_edit = array(
            'nama_guru' => $nama_guru,
            'id_mapel' => $id_mapel,
        );

        $this->M_admin->guru_edit_up($data_edit, $id_guru);

        $this->session->set_flashdata('msg', '
		    <div class="alert alert-info alert-dismissible fade show" role="alert">
                Update Data Guru Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           ');
        redirect('Admin/guru');
    } 

    public function guru_edit_photo($id_guru)
    {
        $header['title']='Teacher Award';
        $data['tampil'] = $this->M_admin->guru_detail($id_guru);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/guru_edit_photo', $data);
        $this->load->view('template/footer-admin');
    }

    function guru_edit_photo_up(){
		$config['upload_path'] = './assets/photo_upload/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|heif|heic|raw'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $config['max_size']         = 5000;


	    $this->upload->initialize($config);
	    if(!empty($_FILES['photo_guru']['name'])){

	        if ($this->upload->do_upload('photo_guru')){
	            $gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/photo_upload/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= True;
	            $config['quality']= '70%';
	            $config['width']= 600;
	            // $config['height']= 400;
	            $config['new_image']= './assets/photo_upload/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();
                // $gambar=$gbr['file_name'];

                $id_guru = $this->input->post('id_guru');
                // $id_siswa = $this->input->post('id_siswa');
                // $id_point = $this->input->post('id_point');

                $data_edit = array(
                    'photo_guru' => $gbr['file_name'],
                );

                $this->M_admin->guru_edit_photo_up($data_edit, $id_guru);

                $this->session->set_flashdata('msg', '
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        Update photo guru berhasil
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>            
                ');
                redirect('Admin/guru/');
			}
	                 
	    }else{
			echo "Image yang diupload kosong";
		}
				
	}

    // akhir guru



    // awal mapel

    public function mapel()
    {
        $header['title']='Teacher Award';
        $data['tampil'] = $this->M_admin->mapel();

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/mapel', $data);
        $this->load->view('template/footer-admin');
    }

    public function mapel_tambah()
    {
        $header['title']='Teacher Award';

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/mapel_tambah');
        $this->load->view('template/footer-admin');
    }

    public function mapel_tambah_up()
    {
        $nama_mapel = $this->input->post('nama_mapel');

        $data_tambah = array(
            'nama_mapel' => $nama_mapel,
        );

        $this->M_admin->mapel_tambah_up($data_tambah);

        $this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
                Tambah Mapel Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Admin/mapel');
    } 

    public function mapel_hapus($id_mapel){
        $id_mapel = array('id_mapel' => $id_mapel);

        $success = $this->M_admin->mapel_hapus($id_mapel);
        $this->session->set_flashdata('msg', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Hapus Mapel Berhasil
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
        redirect('Admin/mapel/');
    }

    public function mapel_edit($id_mapel)
    {
        $header['title']='Teacher Award';
        $data['tampil'] = $this->M_admin->mapel_detail($id_mapel);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/mapel_edit', $data);
        $this->load->view('template/footer-admin');
    }

    public function mapel_edit_up()
    {
        $nama_mapel = $this->input->post('nama_mapel');
        $id_mapel = $this->input->post('id_mapel');
        
        $data_edit = array(
            'nama_mapel' => $nama_mapel,
        );

        $this->M_admin->mapel_edit_up($data_edit, $id_mapel);

        $this->session->set_flashdata('msg', '
		    <div class="alert alert-info alert-dismissible fade show" role="alert">
                Update Data Mapel Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           ');
        redirect('Admin/mapel');
    } 

    // akhir mapel

    public function nominasi($kode_mapel)
    {
        // var_dump($kode_jurusan);
        $header['title']='Teacher Award';
        // $data['tampil'] = $this->M_admin->nominasi($kode_mapel);
        $data['tampil'] = $this->M_admin->nominasi($kode_mapel);
        // $this->M_admin->jml_nominasi($kode_mapel);

        // $data_tampil = $this->M_admin->nominasi();

        // var_dump($data_tampil);

        $this->load->view('template/header-admin', $header);
        $this->load->view('admin/nominasi', $data);
        $this->load->view('template/footer-admin');
    }
    

}
