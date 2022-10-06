<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_server_side extends CI_Model
{
    //set kolom order null, kolom pertama saya null untuk no++ .example = array(null,'nc_no', 'origator', 'tgl')
    var $column_order  = array(null,'nc_no', 'origator', 'tgl');

    private function _get_datatables_ncr()
    {
        $this->db->from('ncr');
        $post_search = $this->input->post('search')['value'];
        $post_order  = $this->input->post('order');
        $post_length = $this->input->post('length');

        if ($post_search){
            $this->db->like('LOWER(nc_no)', strtolower($post_search));
            $this->db->or_like('LOWER(origator)', strtolower($post_search));
        } elseif ($post_order) {
            $this->db->order_by($this->column_order[$post_order['0']['column']], $post_order['0']['dir']); // $post_order['0']['dir'] nilainya asc atau desc
        } elseif ($post_length != -1){
            $this->db->limit($post_length, $this->input->post('start')); // $this->input->post('start') nilainya adalah 0
        } 
    }

    public function get_datatables()
    {
        $this->_get_datatables_ncr();
        $this->db->order_by('id_ncr','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_ncr()
    {
        $this->db->from('ncr');
        return $this->db->count_all_results();
    }

    public function count_all_ncr()
    {
        $this->db->from('ncr');
        return $this->db->count_all_results();
    }
}