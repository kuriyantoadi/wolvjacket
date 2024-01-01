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


  function barang_tambah_up($data_tambah)
  {
    $this->db->insert('tb_barang', $data_tambah);
  }

  function barang_hapus($id_barang)
  {
    $this->db->where($id_barang);
    $this->db->delete('tb_barang');
  }

  function barang_detail($id_barang)
  {
    $this->db->select('*');
    $this->db->from('tb_barang');
    $this->db->join('tb_kategori_barang', 'tb_barang.id_kategori_barang = tb_kategori_barang.id_kategori_barang');
    $this->db->where('id_barang', $id_barang);
    $query = $this->db->get()->result();
    return $query;
  }

  function barang_edit($id_barang)
  {
    $this->db->select('*');
    $this->db->from('tb_barang');
    $this->db->join('tb_kategori_barang', 'tb_barang.id_kategori_barang = tb_kategori_barang.id_kategori_barang');
    $this->db->join('tb_brand', 'tb_barang.id_brand = tb_brand.id_brand');
    $this->db->where('tb_barang.id_barang', $id_barang);
    $query = $this->db->get()->result();
    return $query;
  }

  function barang_edit_up($data_edit, $id_barang)
  {
    $this->db->where('id_barang', $id_barang);
    $this->db->update('tb_barang', $data_edit);
  }

  // akhir kategori barang


  // awal kategori barang

  function tampil_kategori_barang()
  {
    $this->db->order_by('tb_kategori_barang.nama_kategori_barang', 'ASC');
    $tampil = $this->db->get('tb_kategori_barang')->result();
    return $tampil;
  }

  function kategori_barang_tambah_up($data_tambah)
  {
    $this->db->insert('tb_kategori_barang', $data_tambah);
  }

  function kategori_barang_detail($id_kategori_barang)
  {
    $this->db->select('*');
    $this->db->from('tb_kategori_barang');
    $this->db->where('id_kategori_barang', $id_kategori_barang);
    $query = $this->db->get()->result();
    return $query;
  }

  function kategori_barang_edit_up($data_edit, $id_kategori_barang)
  {
    $this->db->where('id_kategori_barang', $id_kategori_barang);
    $this->db->update('tb_kategori_barang', $data_edit);
  }

  // akhir kategori barang


  // awal brand

  function tampil_brand()
  {
    $this->db->order_by('tb_brand.nama_brand', 'ASC');
    $tampil = $this->db->get('tb_brand')->result();
    return $tampil;
  }

  // akhir brand

}
