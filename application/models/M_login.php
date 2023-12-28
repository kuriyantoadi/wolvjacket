<?php

class M_login extends CI_Model{

  //tampil buku
  function login_siswa($nisn_siswa, $password){
    $login = $this->db->query("SELECT * from tb_siswa where nisn_siswa='$nisn_siswa' AND password='$password' ");
    return $login;
  }

  function login_bismen($nisn_siswa, $password){
    $login = $this->db->query("SELECT * from tb_siswa_bismen where nisn_siswa='$nisn_siswa' AND password='$password' ");
    return $login;
  }

  function admin_login($username, $password){
    $login = $this->db->query("SELECT * from tb_user where username='$username' AND password='$password' ");
    return $login;
  }

  function siswa_login($nisn_siswa, $password){
    $login = $this->db->query("SELECT * from tb_siswa_diterima where nisn_siswa='$nisn_siswa' AND password='$password' ");
    return $login;
  }


}

 ?>
