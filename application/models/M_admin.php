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

  function tampil_barang_stok()
  {
    $this->db->from('tb_barang');
    $this->db->join('tb_brand', 'tb_barang.id_brand = tb_brand.id_brand');
    $query = $this->db->get()->result();
    return $query;
  }

  function tampil_barang_kategori($id_kategori_barang)
  {
    $this->db->select('*');
    $this->db->from('tb_barang');
    $this->db->join('tb_brand', 'tb_barang.id_brand = tb_brand.id_brand');
    $this->db->where('id_kategori_barang', $id_kategori_barang);
    $query = $this->db->get()->result();
    return $query;
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
    $this->db->join('tb_barang as barang_keranjang', 'tb_keranjang_masuk.id_barang = barang_keranjang.id_barang');
    $this->db->join('tb_brand', 'barang_keranjang.id_brand = tb_brand.id_brand');
    $this->db->where('tb_keranjang_masuk.id_user', $id_user);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result(); // Mengembalikan hasil query sebagai objek
    } else {
        return array(); // Mengembalikan array kosong jika tidak ada hasil
    }

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

  public function transfer_keranjang_ke_stok($id_user, $no_faktur, $keterangan, $tgl_tambah_stok)
  {
    // Memindahkan data dari tb_keranjang_masuk ke tb_stok untuk id_user tertentu
    $this->db->trans_start(); // Memulai transaksi

    // Memasukkan data ke tb_stok
    $this->db->select('id_barang, jumlah, harga_pokok','nama_barang');
    $this->db->where('id_user', $id_user);
    $query = $this->db->get('tb_keranjang_masuk');
    $data_keranjang = $query->result_array();

    foreach ($data_keranjang as $row) {
        // Tambahkan kolom lain
        $row['keterangan'] = $keterangan;
        $row['tgl_tambah_stok'] = $tgl_tambah_stok;
        // $row['nama_barang'] = $nama_barang;
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
    $this->db->select('*');
    $this->db->from('tb_tambah_stok');
    $this->db->join('tb_barang', 'tb_tambah_stok.id_barang = tb_barang.id_barang');
    // $this->db->where('no_faktur', $no_faktur);
    $query = $this->db->get()->result();
    return $query;
  }

  public function tambah_stok_daftar($no_faktur)
  {
    $this->db->select('*');
    $this->db->from('tb_tambah_stok');
    $this->db->join('tb_barang', 'tb_tambah_stok.id_barang = tb_barang.id_barang');
    $this->db->where('no_faktur', $no_faktur);
    $query = $this->db->get()->result();
    return $query;
  }

  public function tambah_stok_detail()
  {
    $this->db->select('*');
    $this->db->from('tb_tambah_stok');
    $this->db->join('tb_barang', 'tb_tambah_stok.id_barang = tb_barang.id_barang');
    // $this->db->where('no_faktur', $no_faktur);
    $query = $this->db->get()->result();
    return $query;
  }

  public function tambah_stok_edit($no_faktur)
  {
    $this->db->select('*');
    $this->db->from('tb_tambah_stok');
    $this->db->join('tb_barang', 'tb_tambah_stok.id_barang = tb_barang.id_barang');
    $this->db->join('tb_brand', 'tb_barang.id_brand = tb_brand.id_brand');
    $this->db->where('no_faktur', $no_faktur);
    $query = $this->db->get()->result();
    return $query;
  }

  public function tambah_stok_tgl($no_faktur)
  {
      $this->db->select('*');
      $this->db->from('tb_tambah_stok');
      $this->db->where('no_faktur', $no_faktur);
      $this->db->join('tb_user', 'tb_tambah_stok.id_user = tb_user.id_user');
      $this->db->limit(1); // Mengambil hanya satu baris

      // Menjalankan query dan mengembalikan hasilnya
      $query = $this->db->get();
      return $query->row(); // Mengembalikan baris terakhir sebagai objek tunggal
  }

  function tambah_stok_hapus($no_faktur)
  {
    $this->db->where('no_faktur', $no_faktur);
    $this->db->delete('tb_tambah_stok');
  }


  public function get_data_by_no_faktur($no_faktur) {
    $this->db->select('*');
    $this->db->from('tb_tambah_stok');
    $this->db->join('tb_barang', 'tb_tambah_stok.id_barang = tb_barang.id_barang');
    $this->db->join('tb_brand', 'tb_barang.id_brand = tb_brand.id_brand');
    $this->db->where('tb_tambah_stok.no_faktur', $no_faktur);
    $this->db->order_by('tb_barang.nama_barang', 'ASC'); // Urutkan secara ascending

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result(); // Mengembalikan hasil query sebagai objek
    } else {
        return array(); // Mengembalikan array kosong jika tidak ada hasil
    }
  }



    function tambah_stok_edit_up($data_edit, $id_stok)
    {
      $this->db->where('id_stok', $id_stok);
      $this->db->update('tb_tambah_stok', $data_edit);
    }

    function tambah_stok_edit_hapus($id_stok)
    {
      $this->db->where('id_stok', $id_stok);
      $this->db->delete('tb_tambah_stok');
    }

  public function row_faktur($no_faktur)
  {
    $this->db->select('id_stok, no_faktur, tgl_tambah_stok, SUM(harga_pokok * jumlah) as total_harga_pokok, SUM(jumlah) as total_barang, harga_pokok, jumlah, keterangan, nama_pengguna');
    $this->db->from('tb_tambah_stok');
    $this->db->join('tb_user', 'tb_tambah_stok.id_user = tb_user.id_user');
    $this->db->group_by('no_faktur');
    $this->db->order_by('no_faktur', 'ASC');

    // Menambahkan kondisi filter $no_faktur
    if ($no_faktur != '') {
        $this->db->where('no_faktur', $no_faktur);
    }

      // Menjalankan query dan mengembalikan hasilnya
      $query = $this->db->get();
      return $query->row(); // Mengembalikan baris terakhir sebagai objek tunggal
  }

  public function tambah_stok_keterangan_up($keterangan, $no_faktur) {
      // Query untuk mendapatkan no_faktur yang memiliki lebih dari satu record
      $this->db->select('no_faktur');
      $this->db->from('tb_tambah_stok');
      $this->db->where('no_faktur', $no_faktur);
      $this->db->group_by('no_faktur');
      $this->db->having('COUNT(*) > 1');
      $query = $this->db->get();

      // Jika ada no_faktur yang memiliki lebih dari satu record
      if ($query->num_rows() > 0) {
          $affected_rows = 0;

          // Lakukan update untuk setiap no_faktur yang memiliki lebih dari satu record
          foreach ($query->result() as $row) {
              $this->db->set('keterangan', $keterangan);
              $this->db->where('no_faktur', $row->no_faktur);
              $this->db->update('tb_tambah_stok');
              $affected_rows += $this->db->affected_rows();
          }

          return $affected_rows; // Mengembalikan jumlah baris yang terpengaruh oleh update
      } else {
          return 0; // Tidak ada no_faktur yang memiliki lebih dari satu record
      }
  }

  public function get_harga_pokok($id_barang) {
    // Query untuk mendapatkan harga pokok berdasarkan ID barang
    $this->db->select('harga_pokok');
    $this->db->where('id_barang', $id_barang);
    $query = $this->db->get('tb_barang');
    $row = $query->row();
    return $row->harga_pokok;
  }

  function tambah_stok_barang_up($data_tambah)
  {
    $this->db->insert('tb_tambah_stok', $data_tambah);
  }
    

  // akhir daftar tambah stok


  public function cari_stok($start_date, $end_date) {
    $this->db->select('id_barang, LEFT(tgl_tambah_stok, 7) AS tahun_bulan, harga_pokok, SUM(jumlah) AS total_stok_masuk');
    $this->db->from('tb_tambah_stok');
    $this->db->where('tgl_tambah_stok >=', $start_date);
    $this->db->where('tgl_tambah_stok <', $end_date);
    $this->db->group_by('id_barang, tahun_bulan');
    $query = $this->db->get();
    return $query->result_array();

  }


  public function get_total_stok_sebelumnya($previous_month, $id_barang) {
    $this->db->select('id_barang, total_stok_masuk');
    $this->db->from('tb_stok_akhir');
    $this->db->where('tahun_bulan', $previous_month);
    $this->db->where('id_barang', $id_barang);
    $query = $this->db->get();
    return $query->result_array();
  }



  public function cek_bulan_stok($tahun_bulan){
    $this->db->select('tahun_bulan');
    $this->db->from('tb_stok_akhir');
    $this->db->where('tahun_bulan', $tahun_bulan);
    $this->db->limit(1); // Mengambil hanya satu baris

    // Menjalankan query dan mengembalikan hasilnya
    $query = $this->db->get();
    return $query->row(); // Mengembalikan baris terakhir sebagai objek tunggal
  }

  public function cek_tambah_Stok(){

  }


  function atur_stok_hapus($id_proses_stok)
  {
    $this->db->where('id_proses_stok' ,$id_proses_stok);
    $this->db->delete('tb_stok_akhir');
  }


  public function get_data_by_proses_stok($id_proses_stok) {
    $this->db->select('*');
    $this->db->from('tb_stok_akhir');
    $this->db->join('tb_barang', 'tb_stok_akhir.id_barang = tb_barang.id_barang');
    $this->db->where('tb_stok_akhir.id_proses_stok', $id_proses_stok);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result(); // Mengembalikan hasil query sebagai objek
    } else {
        return array(); // Mengembalikan array kosong jika tidak ada hasil
    }
  }

  public function tb_stok_akhir_detail()
  {
    $this->db->select('*');
    $this->db->from('tb_stok_akhir');
    $this->db->join('tb_barang', 'tb_stok_akhir.id_barang = tb_barang.id_barang');
    $this->db->order_by('nama_barang', 'ASC'); // Urutkan nama_barang secara ascending

    // $this->db->where('no_faktur', $no_faktur);
    $query = $this->db->get()->result();
    return $query;
  }

  // akhir Atur Stok Akhir
 

}
