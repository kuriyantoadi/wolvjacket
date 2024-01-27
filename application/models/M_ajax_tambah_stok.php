<?php

class M_ajax_tambah_stok extends CI_Model
{

  // awal ajax 

    var $column_order = array(null, 'no_faktur'); //set column field database for datatable orderable
    var $column_search = array('no_faktur'); //set column field database for datatable searchable
    var $order = array('no_faktur' => 'asc'); // default order 
 
    private function _get_datatables_query() {
       
        $this->db->select('no_faktur, tgl_tambah_stok, SUM(harga_pokok * jumlah) as total_harga_pokok, SUM(jumlah) as total_barang, keterangan, id_user');
        $this->db->from('tb_tambah_stok');
        $this->db->group_by('no_faktur');
        $this->db->order_by('no_faktur', 'ASC');

        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('tb_tambah_stok');
        return $this->db->count_all_results();
    }

  // akhir ajax 

}
