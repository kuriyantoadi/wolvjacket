<?php

class M_retur extends CI_Model{

    public function retur_ke_keranjang($data) {
        return $this->db->insert('tb_retur_keranjang', $data);
    }

    function cek_keranjang_masuk($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_retur_keranjang');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_stok_barang($idBarang) {
        $this->db->select('stok');
        $this->db->from('tb_barang');
        $this->db->where('id_barang', $idBarang);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->stok;
        } else {
            // Jika tidak ada data dengan id_barang yang diberikan, kembalikan null atau nilai default yang sesuai
            return null;
        }
    }


    public function retur_keranjang_hapus($id_retur_keranjang)
    {
        $this->db->where('id_retur_keranjang',$id_retur_keranjang);
        $this->db->delete('tb_retur_keranjang');
    }

    public function cek_id_barang($id_barang) {
      $this->db->where('id_barang', $id_barang);
      $query = $this->db->get('tb_retur_keranjang');

      return $query->num_rows() > 0;
    }

    

    public function get_last_no_faktur()
    {
        $this->db->select("LEFT(no_faktur_retur, 6) as no_faktur_awal", false); // Menggunakan LEFT() untuk mengambil 6 karakter pertama
        $this->db->order_by('id_retur', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_retur');
        return $query->row()->no_faktur_awal;
    }

    public function cek_seri_no_faktur()
    {
        $this->db->select("RIGHT(no_faktur_retur, 6) as no_faktur_akhir", false); // Menggunakan RIGHT() untuk mengambil 7 karakter terakhir
        $this->db->order_by('id_retur', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_retur');
        return $query->row()->no_faktur_akhir;
    }

    function tampil_keranjang_pengguna($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_retur_keranjang');
        $this->db->join('tb_barang as barang_keranjang', 'tb_retur_keranjang.id_barang = barang_keranjang.id_barang');
        $this->db->join('tb_brand', 'barang_keranjang.id_brand = tb_brand.id_brand');
        $this->db->where('tb_retur_keranjang.id_user', $id_user);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result(); // Mengembalikan hasil query sebagai objek
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada hasil
        }

    }

    public function transfer_keranjang_ke_retur($id_user, $no_faktur_retur, $keterangan, $tgl_tambah_stok)
    {
        // update data stok barang
        $query = "UPDATE tb_barang 
        INNER JOIN tb_retur_keranjang ON tb_barang.id_barang = tb_retur_keranjang.id_barang 
        SET tb_barang.stok = tb_barang.stok - tb_retur_keranjang.jumlah";
        $this->db->query($query);

        // Memindahkan data dari tb_keranjang_masuk ke tb_stok untuk id_user tertentu
        $this->db->trans_start(); // Memulai transaksi

        // Memasukkan data ke tb_retur_barang
        $this->db->select('id_barang, jumlah, harga_pokok','id_user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('tb_retur_keranjang');
        $data_keranjang = $query->result_array();

        foreach ($data_keranjang as $row) {
            // Tambahkan kolom lain
            $row['no_faktur_retur'] = $no_faktur_retur;
            $this->db->insert('tb_retur_barang', $row);
        }

        // menghapus keranjang masuk
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_retur_keranjang');

        $this->db->trans_complete(); // Menyelesaikan transaksi

        return $this->db->trans_status(); // Mengembalikan status transaksi
    }

    public function retur_tambah_up($data){
        return $this->db->insert('tb_retur', $data);
    }

    public function get_data_retur($no_faktur_retur) 
    {
        $this->db->select('SUM(tb_retur_barang.jumlah) AS jumlah_total, SUM(tb_retur_barang.harga_pokok) AS total_harga');
        $this->db->from('tb_retur');
        $this->db->join('tb_retur_barang', 'tb_retur.no_faktur_retur = tb_retur_barang.no_faktur_retur', 'left');
        $this->db->where('tb_retur_barang.no_faktur_retur', $no_faktur_retur);
        $query = $this->db->get();

        $result = $query->row();

        // Update kolom total_jumlah dan total_harga pada tabel tb_retur
        $data = array(
            'total_jumlah' => $result->jumlah_total,
            'total_harga' => $result->total_harga
        );
        $this->db->where('no_faktur_retur', $no_faktur_retur);
        $this->db->update('tb_retur', $data);

        return $result;
    }

    public function retur_hapus($id_retur)
    {
        $this->db->where('id_retur',$id_retur);
        $this->db->delete('tb_retur');
    }

    public function retur_detail()
    {
        $this->db->select('*');
        $this->db->from('tb_retur_barang');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_data_by_no_faktur($no_faktur_retur) {
        $this->db->select('*');
        $this->db->from('tb_retur_barang');
        $this->db->join('tb_barang', 'tb_retur_barang.id_barang = tb_barang.id_barang');
        $this->db->join('tb_brand', 'tb_barang.id_brand = tb_brand.id_brand');
        $this->db->where('tb_retur_barang.no_faktur_retur', $no_faktur_retur);
        $this->db->order_by('tb_barang.nama_barang', 'ASC'); // Urutkan secara ascending

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result(); // Mengembalikan hasil query sebagai objek
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada hasil
        }
        
    }

    public function retur_edit($id_retur)
    {
        $this->db->select('*');
        $this->db->from('tb_retur');
        $this->db->where('id_retur',$id_retur);
        $query = $this->db->get()->result();
        return $query;
    }

    



}

 ?>
