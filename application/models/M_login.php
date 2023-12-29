<?php

class M_login extends CI_Model{

  function admin_login($username, $password){
    $login = $this->db->query("SELECT * from tb_user where username='$username' AND password='$password' ");
    return $login;
  }


}

 ?>
