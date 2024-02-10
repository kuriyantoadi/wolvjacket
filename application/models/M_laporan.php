<?php

class M_laporan extends CI_Model{

    function kartu_stok_barang_datang_view()
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        // $this->db->join('tb_kategori_barang', 'tb_barang.id_kategori_barang = tb_kategori_barang.id_kategori_barang');
        // $this->db->where('id_barang', $id_barang);
        $query = $this->db->get()->result();
        return $query;
    }


}

 ?>
