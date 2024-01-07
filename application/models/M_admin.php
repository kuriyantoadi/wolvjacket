<?php

class M_admin extends CI_Model
{

  function user_edit_up($data_edit, $id_user)
  {
    $this->db->where('id_user', $id_user);
    $this->db->update('tb_user', $data_edit);
  }

  function user_detail($ses_id)
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

  // function barang_edit($id_barang)
  // {
  //   $this->db->select('*');
  //   $this->db->from('tb_barang');
  //   $this->db->join('tb_kategori_barang', 'tb_barang.id_kategori_barang = tb_kategori_barang.id_kategori_barang');
  //   $this->db->join('tb_brand', 'tb_barang.id_brand = tb_brand.id_brand');
  //   $this->db->where('tb_barang.id_barang', $id_barang);
  //   $query = $this->db->get()->result();
  //   return $query;
  // }

  function barang_edit()
  {
    $this->db->select('*');
    $this->db->from('tb_barang');
    $this->db->join('tb_kategori_barang', 'tb_barang.id_kategori_barang = tb_kategori_barang.id_kategori_barang');
    $this->db->join('tb_brand', 'tb_barang.id_brand = tb_brand.id_brand');
    // $this->db->where('tb_barang.id_barang', $id_barang);
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

  function kategori_barang_detail()
  {
    $this->db->select('*');
    $this->db->from('tb_kategori_barang');
    // $this->db->where('id_kategori_barang', $id_kategori_barang);
    $query = $this->db->get()->result();
    return $query;
  }

  function kategori_barang_edit_up($data_edit, $id_kategori_barang)
  {
    $this->db->where('id_kategori_barang', $id_kategori_barang);
    $this->db->update('tb_kategori_barang', $data_edit);
  }

  function kategori_barang_hapus($id_kategori_barang)
  {
    $this->db->where($id_kategori_barang);
    $this->db->delete('tb_kategori_barang');
  }

  // akhir kategori barang


  // awal brand

  function tampil_brand()
  {
    $this->db->order_by('tb_brand.nama_brand', 'ASC');
    $tampil = $this->db->get('tb_brand')->result();
    return $tampil;
  }

  function brand_tambah_up($data_tambah)
  {
    $this->db->insert('tb_brand', $data_tambah);
  }

  function brand_hapus($id_brand)
  {
    $this->db->where($id_brand);
    $this->db->delete('tb_brand');
  }

  function brand_detail()
  {
    $this->db->select('*');
    $this->db->from('tb_brand');
    // $this->db->where('id_brand', $id_brand);
    $query = $this->db->get()->result();
    return $query;
  }

   function brand_edit_up($data_edit, $id_brand)
  {
    $this->db->where('id_brand', $id_brand);
    $this->db->update('tb_brand', $data_edit);
  }

  // akhir brand


  // awal pengguna
  function tampil_pengguna()
  {
    $this->db->order_by('tb_user.nama_pengguna', 'ASC');
    $tampil = $this->db->get('tb_user')->result();
    return $tampil;
  }

  function pengguna_tambah_up($data_tambah)
  {
    $this->db->insert('tb_user', $data_tambah);
  }

  function pengguna_hapus($id_user)
  {
    $this->db->where($id_user);
    $this->db->delete('tb_user');
  }

  function pengguna_detail()
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $query = $this->db->get()->result();
    return $query;
  }

  function pengguna_edit_up($data_edit, $id_user)
  {
    $this->db->where('id_user', $id_user);
    $this->db->update('tb_user', $data_edit);
  }

  public function cek_username($username)
  {
    $this->db->where('username', $username);
    $hasil = $this->db->get('tb_user')->result();
    return $hasil;
  }
  // akhir pengguna



  // awal pelanggan

  function tampil_pelanggan()
  {
    $this->db->order_by('tb_pelanggan.nama_pelanggan', 'ASC');
    $tampil = $this->db->get('tb_pelanggan')->result();
    return $tampil;
  }

  function pelanggan_tambah_up($data_tambah)
  {
    $this->db->insert('tb_pelanggan', $data_tambah);
  }

  function pelanggan_hapus($id_pelanggan)
  {
    $this->db->where($id_pelanggan);
    $this->db->delete('tb_pelanggan');
  }

  function pelanggan_detail()
  {
    $this->db->select('*');
    $this->db->from('tb_pelanggan');
    // $this->db->where('id_pelanggan', $id_pelanggan);
    $query = $this->db->get()->result();
    return $query;
  }

  function pelanggan_edit_up($data_edit, $id_pelanggan)
  {
    $this->db->where('id_pelanggan', $id_pelanggan);
    $this->db->update('tb_pelanggan', $data_edit);
  }

  // akhir pelanggan

}
