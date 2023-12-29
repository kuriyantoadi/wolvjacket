<?php

class M_admin extends CI_Model
{

  function password_up($data_edit, $id_siswa)
  {
    $this->db->where('id_guru', $id_siswa);
    $this->db->update('tb_guru', $data_edit);
  }

   function password($ses_id)
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('id_user', $ses_id);
    $query = $this->db->get()->result();
    return $query;
  }

}
