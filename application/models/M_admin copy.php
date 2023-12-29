<?php

class M_admin extends CI_Model
{

  function siswa_jur($kode_jurusan)
  {
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
    // $this->db->join('tb_vote_status', 'tb_siswa.id_siswa = tb_vote_status.id_siswa','left');
    // $this->db->join('tb_vote_status', 'tb_siswa.id_siswa = tb_vote_status.id_siswa');
    $this->db->where('kode_jurusan', $kode_jurusan);
    $query = $this->db->get()->result();
    return $query;
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

  function siswa_edit_up($data_edit, $id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $this->db->update('tb_siswa', $data_edit);
  }

  function tampil_kelas()
  {
    $this->db->order_by('tb_kelas.tingkatan', 'ASC');
    $this->db->order_by('tb_kelas.nama_jurusan', 'ASC');
    $this->db->order_by('tb_kelas.kode_kelas', 'ASC');
    $tampil = $this->db->get('tb_kelas')->result();
    return $tampil;
  }

  public function kelas_tambah_up($data_tambah)
  {
    $this->db->insert('tb_kelas', $data_tambah);
  }

  public function kelas_hapus($id_kelas)
  {
    $this->db->where($id_kelas);
    $this->db->delete('tb_kelas');
  }

  public function siswa_hapus($id_siswa)
  {
    $this->db->where($id_siswa);
    $this->db->delete('tb_siswa');
  }
 
  public function siswa_tambah_up($data_tambah)
  {
    $this->db->insert('tb_siswa', $data_tambah);
  }
  

  // guru awal

  function guru()
  {
    $this->db->select('*');
    $this->db->from('tb_guru');
    $this->db->join('tb_mapel', 'tb_guru.id_mapel = tb_mapel.id_mapel');
    $query = $this->db->get()->result();
    return $query;
  }

  public function guru_tambah_up($data_tambah)
  {
    $this->db->insert('tb_guru', $data_tambah);
  }

  public function guru_hapus($id_guru)
  {
    $this->db->where($id_guru);
    $this->db->delete('tb_guru');
  }

  function guru_edit_up($data_edit, $id_siswa)
  {
    $this->db->where('id_guru', $id_siswa);
    $this->db->update('tb_guru', $data_edit);
  }

  function guru_detail($id_guru)
  {
    $this->db->select('*');
    $this->db->from('tb_guru');
    $this->db->join('tb_mapel', 'tb_guru.id_mapel = tb_mapel.id_mapel');
    $this->db->where('id_guru', $id_guru);
    $query = $this->db->get()->result();
    return $query;
  }

  // guru akhir


  // awal mapel
  function mapel()
  {
    $this->db->select('*');
    $this->db->from('tb_mapel');
    $query = $this->db->get()->result();
    return $query;
  }

  public function vote_up($data_tambah)
  {
    $this->db->insert('tb_vote', $data_tambah);
  }

  public function mapel_hapus($id_mapel)
  {
    $this->db->where($id_mapel);
    $this->db->delete('tb_mapel');
  }

  function mapel_edit_up($data_edit, $id_mapel)
  {
    $this->db->where('id_mapel', $id_mapel);
    $this->db->update('tb_mapel', $data_edit);
  }

  function mapel_detail($id_mapel)
  {
    $this->db->select('*');
    $this->db->from('tb_mapel');
    $this->db->where('id_mapel', $id_mapel);
    $query = $this->db->get()->result();
    return $query;
  }

  function guru_edit_photo_up($data_edit, $id_guru)
  {
    $this->db->where('id_guru', $id_guru);
    $this->db->update('tb_guru', $data_edit);
  }

  // akhir mapel


  // function nominasi()
  // {
  //   $this->db->select('*');
  //   $this->db->from('tb_guru');
  //   $this->db->join('tb_mapel', 'tb_guru.id_mapel = tb_mapel.id_mapel');
  //   // $this->db->where('kode_mapel', $kode_mapel);
  //   $query = $this->db->get()->result();
  //   return $query;
  // }

  function jml_nominasi($id_guru)
  {
    $this->db->select('*');
    $this->db->from('tb_vote');
    $this->db->where('id_guru', $id_guru);
    $query = $this->db->count_all_results();
    return $query;
  }

  function nominasi($kode_mapel){
    $this->db->select('tb_guru.id_guru, tb_mapel.id_mapel, tb_mapel.nama_mapel, tb_guru.nama_guru, SUM(tb_vote.nilai_vote) AS hasil_vote');
    $this->db->from('tb_vote');
    $this->db->join('tb_guru', 'tb_vote.id_guru = tb_guru.id_guru');
    $this->db->join('tb_mapel', 'tb_vote.id_mapel = tb_mapel.id_mapel');
    $this->db->where('tb_mapel.kode_mapel', $kode_mapel); // Replace 'your_kode_mapel' with the actual kode_mapel value
    $this->db->group_by('tb_guru.id_guru, tb_mapel.id_mapel');

    $query = $this->db->get()->result();
    return $query;
  } 

}
