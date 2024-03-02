<?php

class M_laporan extends CI_Model{

    function kartu_stok_barang_datang_view($tahun_bulan)
    {
         $this->db->select('*');
        $this->db->from('tb_stok_akhir');
        $this->db->join('tb_barang', 'tb_stok_akhir.id_barang = tb_barang.id_barang');
        $this->db->order_by('nama_barang', 'ASC'); // Urutkan nama_barang secara ascending

        $this->db->where('tahun_bulan', $tahun_bulan);
        $query = $this->db->get()->result();
        return $query;
    }

    public function tb_stok_akhir_detail()
    {
        $this->db->select('*');
        $this->db->from('tb_stok_akhir');
        $this->db->join('tb_barang', 'tb_stok_akhir.id_barang = tb_barang.id_barang');
        $this->db->order_by('nama_barang', 'ASC'); // Urutkan nama_barang secara ascending

        $this->db->where('bulan_tahun', $no_faktur);
        $query = $this->db->get()->result();
        return $query;
    }

    function stok_bln_sblmnya($stok_bln_sblmnya)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $query = $this->db->get()->result();
        return $query;
    }


}

 ?>
