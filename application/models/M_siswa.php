<?php

class M_siswa extends CI_Model
{

  function mapel_umum()
  {
    $this->db->select('*');
    $this->db->from('tb_mapel');
    $this->db->where('mapel_jurusan','umum');
    $query = $this->db->get()->result();
    return $query;
  }

   function mapel_produktif($kode_jurusan)
  {
    $this->db->select('*');
    $this->db->from('tb_mapel');
    $this->db->where('mapel_jurusan',$kode_jurusan);
    $query = $this->db->get()->result();
    return $query;
  }

  function vote_guru($id_mapel)
  {
    $this->db->select('*');
    $this->db->from('tb_mapel');
    $this->db->join('tb_guru', 'tb_mapel.id_mapel = tb_guru.id_mapel');
    $this->db->where('tb_mapel.id_mapel', $id_mapel);
    $query = $this->db->get()->result();
    return $query;
  }

  function cek_vote($id_mapel, $id_siswa)
  {
    $this->db->select('*');
    $this->db->from('tb_vote');
    $where = "id_mapel=$id_mapel AND id_siswa='$id_siswa'";
    $this->db->where($where);
    // $this->db->where('id_mapel', $id_mapel);
    // $this->db->where('id_siswa', $id_siswa);
    $query = $this->db->get()->result();
    return $query;
  }

  public function vote_up($data_tambah)
  {
    $this->db->insert('tb_vote', $data_tambah);
  }
  

  function siswa_detail($id_siswa)
  {
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
    $this->db->where('id_siswa', $id_siswa);
    $query = $this->db->get()->result();
    return $query;
  }

  // function jml_vote($id_siswa)
  // {
  //   $this->db->like('id_siswa', $id_siswa);
  //   $this->db->from('tb_vote');
  //   $query = $this->db->count_all_results();
  //   return $query;
  // }

  function jml_vote($id_siswa)
  {
    $this->db->select('id_siswa, SUM(nilai_vote) AS hasil_vote');
    $this->db->from('tb_vote');
    $this->db->where('id_siswa', $id_siswa); // Ganti 4 dengan nilai id_siswa yang diinginkan
    $this->db->group_by('id_siswa');

    $query = $this->db->get()->result();
    return $query;
  }


  function jml_nominasi()
  {
    $this->db->like('mapel_jurusan', 'umum');
    $this->db->from('tb_mapel');
    $query = $this->db->count_all_results();
    return $query;
  }

  function vote_status($data_tambah)
  {
    $this->db->insert('tb_vote_status', $data_tambah);
  }

  function cek_vote_status($id_siswa)
  {
    $this->db->select('*');
    $this->db->from('tb_vote_status');
    $this->db->where('id_siswa', $id_siswa);
    $query = $this->db->get()->result();
    return $query;
  }

}
