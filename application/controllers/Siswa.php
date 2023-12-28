<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_login');
        $this->load->model('M_siswa');
        $this->load->model('M_admin');

        // session login
        if ($this->session->userdata('siswa') != true) {
            $url = base_url('Login');
            // redirect($url);
        }

        //session id_siswa
    }

    //Login User


    public function index()
    {
        $header['title']='Teacher Award';
        $header['ses_nama'] = $_SESSION['ses_nama'];

        $this->load->view('template/header-siswa', $header);
        $this->load->view('siswa/index');
        $this->load->view('template/footer-siswa');
    }


    public function nominasi()
    {
        $id_siswa = $_SESSION['ses_id'];

        // var_dump($id_siswa);
        $header['title']='Teacher Award';
        $header['ses_nama'] = $_SESSION['ses_nama'];
        $cek_vote_status = $this->M_siswa->cek_vote_status($id_siswa);

        if(!empty($cek_vote_status)){
            $this->load->view('template/header-siswa', $header);
            $this->load->view('siswa/nominasi_selesai');
            $this->load->view('template/footer-siswa');
        }else{
            $id_siswa = $_SESSION['ses_id'];

            // ambil kode jurusan awal
            $row = $this->M_siswa->siswa_detail($id_siswa);
            foreach ($row as $row_jurusan){
                $kode_jurusan = $row_jurusan->kode_jurusan;
            }
            // ambil kode jurusan awal


            // awal menghitung baris id_siswa
            // $test = $this->M_siswa->jml_vote($id_siswa);

            // var_dump($test);

            // awal menghitung baris id_siswa
            $data['jml_vote'] = $this->M_siswa->jml_vote($id_siswa);
            $data_jml_nominasi = $this->M_siswa->jml_nominasi();
            $data['jml_nominasi'] = $data_jml_nominasi+1;

            $data['id_siswa'] = $id_siswa;


            // var_dump($jml_nominasi);

            $header['title']='Teacher Award';
            $header['ses_nama'] = $_SESSION['ses_nama'];
            $data['tampil'] = $this->M_siswa->mapel_umum();
            $data['tampil_produktif'] = $this->M_siswa->mapel_produktif($kode_jurusan);

            // $data['tampil_produktif'] = $this->M_siswa->mapel_produktif();

            $this->load->view('template/header-siswa', $header);
            $this->load->view('siswa/nominasi', $data);
            $this->load->view('template/footer-siswa');
        }
    }

    public function vote($id_mapel)
    {
        $header['title']='Teacher Award';
        $header['ses_nama'] = $_SESSION['ses_nama'];


        $id_siswa = $_SESSION['ses_id'];
        $data['tampil'] = $this->M_siswa->vote_guru($id_mapel);
        $data['cek_vote'] = $this->M_siswa->cek_Vote($id_mapel, $id_siswa);

        $this->load->view('template/header-siswa', $header);
        $this->load->view('siswa/vote',$data);
        // $this->load->view('template/footer-siswa');
    }

    public function vote_up()
    {

        $id_siswa = $_SESSION['ses_id'];
        $id_guru = $this->input->post('id_guru');
        $id_mapel = $this->input->post('id_mapel');
        $nilai_vote = '1';
        $tgl_vote =  date("h:i:s").' '.date('d-m-Y');

        $data_tambah = array(
            'id_siswa' => $id_siswa,
            'id_guru' => $id_guru,
            'id_mapel' => $id_mapel,
            'nilai_vote' => $nilai_vote,
            'tgl_vote' => $tgl_vote,
        );

        $this->M_siswa->vote_up($data_tambah);

        $this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
                Vote Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Siswa/nominasi');
    }  

    public function vote_status()
    {
        $id_siswa = $this->input->post('id_siswa');
        $vote_status = $this->input->post('vote_status');
        $tgl_lapor_vote =  date("h:i:s").' '.date('d-m-Y');

        $data_tambah = array(
            'id_siswa' => $id_siswa,
            'vote_status' => $vote_status,
            'tgl_lapor_vote' => $tgl_lapor_vote,
        );

        $this->M_siswa->vote_status($data_tambah);

        $this->session->set_flashdata('msg', '
			<div class="alert alert-info alert-dismissible fade show" role="alert">
                Lapor Vote Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('Siswa/nominasi');
    }  

    

}
