<?php

class M_walas extends CI_Model
{

  function siswa_jur($id_kelas)
  {
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
    $this->db->join('tb_vote_status', 'tb_siswa.id_siswa = tb_vote_status.id_siswa','left');
    $this->db->where('tb_kelas.id_kelas', $id_kelas);
    $query = $this->db->get()->result();
    return $query;
  }

  function kelas()
  {
    $this->db->select('*');
    $this->db->from('tb_kelas');
    $query = $this->db->get()->result();
    return $query;
  }

  

}
