<?php

class M_refund extends CI_Model{

    public function refund_ke_keranjang($data) {
        return $this->db->insert('tb_refund_keranjang', $data);
    }

    function cek_keranjang_masuk($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_refund_keranjang');
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


    public function refund_keranjang_hapus($id_refund_keranjang)
    {
        $this->db->where('id_refund_keranjang',$id_refund_keranjang);
        $this->db->delete('tb_refund_keranjang');
    }

    public function cek_id_barang($id_barang) {
      $this->db->where('id_barang', $id_barang);
      $query = $this->db->get('tb_refund_keranjang');

      return $query->num_rows() > 0;
    }

    public function get_last_no_faktur()
    {
        $this->db->select("LEFT(no_faktur_refund, 6) as no_faktur_awal", false); // Menggunakan LEFT() untuk mengambil 6 karakter pertama
        $this->db->order_by('id_refund', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_refund');
        return $query->row()->no_faktur_awal;
    }

    public function cek_seri_no_faktur()
    {
        $this->db->select("RIGHT(no_faktur_refund, 6) as no_faktur_akhir", false); // Menggunakan RIGHT() untuk mengambil 7 karakter terakhir
        $this->db->order_by('id_refund', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_refund');
        return $query->row()->no_faktur_akhir;
    }

    function tampil_keranjang_pengguna($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_refund_keranjang');
        $this->db->join('tb_barang as barang_keranjang', 'tb_refund_keranjang.id_barang = barang_keranjang.id_barang');
        $this->db->join('tb_brand', 'barang_keranjang.id_brand = tb_brand.id_brand');
        $this->db->where('tb_refund_keranjang.id_user', $id_user);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result(); // Mengembalikan hasil query sebagai objek
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada hasil
        }

    }

    public function transfer_keranjang_ke_refund($id_user, $no_faktur_refund, $keterangan, $tgl_tambah_stok)
    {
        // update data stok barang
        $query = "UPDATE tb_barang 
        INNER JOIN tb_refund_keranjang ON tb_barang.id_barang = tb_refund_keranjang.id_barang 
        SET tb_barang.stok = tb_barang.stok + tb_refund_keranjang.jumlah";
        $this->db->query($query);

        // Memindahkan data dari tb_keranjang_masuk ke tb_stok untuk id_user tertentu
        $this->db->trans_start(); // Memulai transaksi

        // Memasukkan data ke tb_refund_barang
        $this->db->select('id_barang, jumlah, harga_pokok','id_user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('tb_refund_keranjang');
        $data_keranjang = $query->result_array();

        foreach ($data_keranjang as $row) {
            // Tambahkan kolom lain
            $row['no_faktur_refund'] = $no_faktur_refund;
            $this->db->insert('tb_refund_barang', $row);
        }

        // menghapus keranjang masuk
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_refund_keranjang');

        $this->db->trans_complete(); // Menyelesaikan transaksi

        return $this->db->trans_status(); // Mengembalikan status transaksi
    }

    public function refund_tambah_up($data){
        return $this->db->insert('tb_refund', $data);
    }

    public function get_data_refund($no_faktur_refund) 
    {
        $this->db->select('SUM(tb_refund_barang.jumlah) AS jumlah_total, SUM(tb_refund_barang.harga_pokok) AS total_harga');
        $this->db->from('tb_refund');
        $this->db->join('tb_refund_barang', 'tb_refund.no_faktur_refund = tb_refund_barang.no_faktur_refund', 'left');
        $this->db->where('tb_refund_barang.no_faktur_refund', $no_faktur_refund);
        $query = $this->db->get();

        $result = $query->row();

        // Update kolom total_jumlah dan total_harga pada tabel tb_refund
        $data = array(
            'total_jumlah' => $result->jumlah_total,
            'total_harga' => $result->total_harga
        );

        $this->db->where('no_faktur_refund', $no_faktur_refund);
        $this->db->update('tb_refund', $data);

        return $result;
    }

    public function refund_hapus($id_refund)
    {
        $this->db->where('id_refund',$id_refund);
        $this->db->delete('tb_refund');
    }

    public function refund_detail()
    {
        $this->db->select('*');
        $this->db->from('tb_refund_barang');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_data_by_no_faktur($no_faktur_refund) {
        $this->db->select('*');
        $this->db->from('tb_refund_barang');
        $this->db->join('tb_barang', 'tb_refund_barang.id_barang = tb_barang.id_barang');
        $this->db->join('tb_brand', 'tb_barang.id_brand = tb_brand.id_brand');
        $this->db->where('tb_refund_barang.no_faktur_refund', $no_faktur_refund);
        $this->db->order_by('tb_barang.nama_barang', 'ASC'); // Urutkan secara ascending

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result(); // Mengembalikan hasil query sebagai objek
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada hasil
        }
        
    }

    public function refund_edit($id_refund)
    {
        $this->db->select('*');
        $this->db->from('tb_refund');
        $this->db->where('id_refund',$id_refund);
        $query = $this->db->get()->result();
        return $query;
    }

    
    public function refund_edit_tambah($data) {
        return $this->db->insert('tb_refund_barang', $data);
    }

    public function refund_edit_hapus($id_refund_barang){
        $this->db->where('id_refund_barang',$id_refund_barang);
        $this->db->delete('tb_refund_barang');
    }


    public function update_total_refund($no_faktur_refund) 
    {
        $this->db->select('SUM(jumlah) AS jumlah_total, SUM(harga_pokok * jumlah) AS total_harga');
        $this->db->from('tb_refund_barang');
        $this->db->where('no_faktur_refund', $no_faktur_refund);
        $query = $this->db->get();

        $result = $query->row();

        // Update kolom total_jumlah dan total_harga pada tabel tb_refund
        $data = array(
            'total_jumlah' => $result->jumlah_total,
            'total_harga' => $result->total_harga
        );
        
        $this->db->where('no_faktur_refund', $no_faktur_refund);
        $this->db->update('tb_refund', $data);

        return $result;
    }

    public function update_total_barang($jumlah, $id_barang)
    {
        // Update data stok barang
        $query = "UPDATE tb_barang 
                SET stok = stok - $jumlah
                WHERE id_barang = $id_barang";
        $this->db->query($query);
    }

    public function update_plus_total_barang($jumlah_edit, $id_barang)
    {
        // Update data stok barang
        $query = "UPDATE tb_barang 
                SET stok = stok - $jumlah_edit
                WHERE id_barang = $id_barang";
        $this->db->query($query);
    }


    function refund_edit_keterangan($data_edit, $id_refund)
    {
        $this->db->where('id_refund', $id_refund);
        $this->db->update('tb_refund', $data_edit);
    }

    function tampil_barang_modal()
    {
        $this->db->select('*');
        $this->db->from('tb_refund_barang');
        $this->db->join('tb_barang', 'tb_refund_barang.id_barang = tb_barang.id_barang');
        // $this->db->where('tb_refund_barang.id_refund_barang', $id_refund_barang);
        $query = $this->db->get()->result();
        return $query;
    }

    function refund_edit_jumlah($data_edit, $id_refund_barang)
    {
        $this->db->where('id_refund_barang', $id_refund_barang);
        $this->db->update('tb_refund_barang', $data_edit);
    }

}

 ?>
