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

  function tampil_barang()
  {
    $tampil = $this->db->get('tb_barang')->result();
    return $tampil;
  }


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

  // awal keranjang

  function tampil_keranjang()
  {
    // $this->db->order_by('tb_keranjang_masuk.nama_barang', 'ASC');
    $tampil = $this->db->get('tb_keranjang_masuk')->result();
    return $tampil;
  }

  // function tampil_keranjang_pengguna($id_user)
  // {
  //   $this->db->where('id_user', $id_user);
  //   $tampil = $this->db->get('tb_keranjang_masuk')->result();
  //   return $tampil;
  // }

  function tampil_keranjang_pengguna($id_user)
  {
    $this->db->select('*');
    $this->db->from('tb_keranjang_masuk');
    $this->db->join('tb_barang', 'tb_keranjang_masuk.id_barang = tb_barang.id_barang');
    $this->db->where('tb_keranjang_masuk.id_user', $id_user);
    $query = $this->db->get()->result();
    return $query;
  }

  public function cek_id_barang($id_barang) {
      $this->db->where('id_barang', $id_barang);
      $query = $this->db->get('tb_keranjang_masuk');

      return $query->num_rows() > 0;
  }

  public function tambah_ke_keranjang($data) {
        return $this->db->insert('tb_keranjang_masuk', $data);
    }

    public function get_keranjang() {
        return $this->db->get('tb_keranjang_masuk')->result_array();
    }

    public function keranjang_hapus($id_barang)
    {
        $this->db->where('id_barang',$id_barang);
        $this->db->delete('tb_keranjang_masuk');
    }

    public function get_barang() {
        return $this->db->get('tb_keranjang_masuk')->result_array();
    }

  // akhir keranjang

  // awal tambah stok

  public function transfer_keranjang_ke_stok($id_user, $no_faktur, $keterangan, $tgl_tambah_stok, $nama_barang)
  {
    // Memindahkan data dari tb_keranjang_masuk ke tb_stok untuk id_user tertentu
    $this->db->trans_start(); // Memulai transaksi

    // Memasukkan data ke tb_stok
    $this->db->select('id_barang, jumlah, harga_pokok');
    $this->db->where('id_user', $id_user);
    $query = $this->db->get('tb_keranjang_masuk');
    $data_keranjang = $query->result_array();

    foreach ($data_keranjang as $row) {
        // Tambahkan kolom lain
        $row['keterangan'] = $keterangan;
        $row['tgl_tambah_stok'] = $tgl_tambah_stok;
        $row['nama_barang'] = $nama_barang;
        $row['no_faktur'] = $no_faktur;
        $row['keterangan'] = $keterangan;
        $row['id_user'] = $id_user;

        $this->db->insert('tb_tambah_stok', $row);
    }

    // menghapus keranjang masuk
    $this->db->where('id_user', $id_user);
    $this->db->delete('tb_keranjang_masuk');

    $this->db->trans_complete(); // Menyelesaikan transaksi

    return $this->db->trans_status(); // Mengembalikan status transaksi
  
  }

  public function get_last_no_faktur()
  {
    // Menentukan kolom yang ingin ditampilkan
    $this->db->select("LEFT(no_faktur, 6) as no_faktur_awal", false); // Menggunakan LEFT() untuk mengambil 6 karakter pertama
    
    // Mengurutkan data berdasarkan id_stok secara descending (dari yang terbaru)
    $this->db->order_by('id_stok', 'DESC');
    
    // Mengambil hanya satu baris data teratas
    $this->db->limit(1);
    
    // Melakukan kueri untuk mendapatkan data terakhir
    $query = $this->db->get('tb_tambah_stok');
    
    // Mengembalikan hasil kueri
    return $query->row()->no_faktur_awal;
  }

  public function cek_seri_no_faktur()
  {
    // Menentukan kolom yang ingin ditampilkan
    $this->db->select("RIGHT(no_faktur, 6) as no_faktur_akhir", false); // Menggunakan RIGHT() untuk mengambil 7 karakter terakhir
    
    // Mengurutkan data berdasarkan id_stok secara descending (dari yang terbaru)
    $this->db->order_by('id_stok', 'DESC');
    
    // Mengambil hanya satu baris data teratas
    $this->db->limit(1);
    
    // Melakukan kueri untuk mendapatkan data terakhir
    $query = $this->db->get('tb_tambah_stok');
    
    // Mengembalikan hasil kueri
    return $query->row()->no_faktur_akhir;
  }

  function cek_keranjang_masuk($id_user)
  {
    $this->db->select('*');
    $this->db->from('tb_keranjang_masuk');
    $this->db->where('id_user', $id_user);
    $query = $this->db->get()->result();
    return $query;
  }

  // akhir keranjang

  // awal daftar tambah stok

  public function daftar_tambah_stok()
  {
    $this->db->select('no_faktur, tgl_tambah_stok, SUM(harga_pokok * jumlah) as total_harga_pokok, SUM(jumlah) as total_barang, keterangan, id_user');
    $this->db->from('tb_tambah_stok');
    $this->db->group_by('no_faktur');
    $query = $this->db->get();

    return $query->result();
  }

  public function detail_daftar_stok()
  {
    $this->db->select('tb_tambah_stok.no_faktur, tb_tambah_stok.tgl_tambah_stok, SUM(tb_tambah_stok.harga_pokok * tb_tambah_stok.jumlah) as total_harga_pokok, SUM(tb_tambah_stok.jumlah) as total_barang, tb_tambah_stok.keterangan, tb_tambah_stok.id_user');
    $this->db->from('tb_tambah_stok');
    $this->db->join('tb_barang', 'tb_barang.id_barang = tb_tambah_stok.id_barang', 'left');
    $this->db->group_by('tb_tambah_stok.no_faktur');

    // Tambahkan kondisi where untuk filter no_faktur
    $this->db->where('tb_tambah_stok.no_faktur', $no_faktur);

    $query = $this->db->get();

    return $query->result();


  }

  function tambah_stok_hapus($no_faktur)
  {
    $this->db->where('no_faktur', $no_faktur);
    $this->db->delete('tb_tambah_stok');
  }


  // akhir daftar tambah stok

}
