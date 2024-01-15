<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alasan_bap_m extends CI_Model
{
    public function TampilData()
    {
        $this->db->select('*');
        $this->db->from('alasan_bap');
        $query = $this->db->get();
        return $query;
    }

    public function addAlasan($post)
    {
        $this->db->set('alasan', htmlspecialchars($post['alasan'], true));
        $this->db->insert('alasan_bap');
    }

    public function HapusData($id)
    {
        $this->db->where('no_alasan_bap', $id);
        $this->db->delete('alasan_bap');
    }
}

/* End of file Alasan_bap_m.php */
