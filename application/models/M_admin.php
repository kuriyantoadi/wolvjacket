<?php

class M_admin extends CI_Model
{

  function password_up($data_edit, $id_user)
  {
    $this->db->where('id_user', $id_user);
    $this->db->update('tb_user', $data_edit);
  }

  function password($ses_id)
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('id_user', $ses_id);
    $query = $this->db->get()->result();
    return $query;
  }

  // awal kategori barang

  function tampil_kategori_barang()
  {
    $this->db->order_by('tb_kategori_barang.nama_kategori_barang', 'ASC');
    $tampil = $this->db->get('tb_kategori_barang')->result();
    return $tampil;
  }

  function barang_tambah_up($data_tambah)
  {
    $this->db->insert('tb_barang', $data_tambah);
  }

  public function barang_hapus($id_barang)
  {
    $this->db->where($id_barang);
    $this->db->delete('tb_barang');
  }

  // akhir kategori barang

}
