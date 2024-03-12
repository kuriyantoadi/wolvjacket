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

    public function transfer_keranjang_ke_retur($id_user, $no_faktur_retur, $keterangan, $tgl_tambah_stok)
    {
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
        $this->db->delete('tb_keranjang_masuk');

        $this->db->trans_complete(); // Menyelesaikan transaksi

        return $this->db->trans_status(); // Mengembalikan status transaksi
    
    }


}

 ?>
