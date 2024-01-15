<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan_m extends CI_Model
{
    public function get()
    {
        $this->db->select('*');
        $this->db->from('tb_lapangan');
        $this->db->order_by('id_lapangan ', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}

/* End of file Lapangan_m.php */
