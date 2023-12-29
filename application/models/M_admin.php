<?php

class M_admin extends CI_Model
{

  function password_up($data_edit, $id_user)
  {
    $this->db->where('id_user', $id_user);
    $this->db->update('tb_user', $data_edit);
  }


  // function siswa_edit_up($data_edit, $id_siswa)
  // {
  //   $this->db->where('id_siswa', $id_siswa);
  //   $this->db->update('tb_siswa', $data_edit);
  // }

  function password($ses_id)
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('id_user', $ses_id);
    $query = $this->db->get()->result();
    return $query;
  }

}
