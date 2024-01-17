<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_m extends CI_Model
{
    public function get()
    {
        $this->db->select('*');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_lapangan', 'tb_lapangan.id_lapangan = tb_jadwal.id_lapangan', 'left');
        $this->db->order_by('tb_jadwal.id_jadwal', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}

/* End of file Jadwal_m.php */
