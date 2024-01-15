<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notif_model extends CI_Model
{
    public function all($id = null)
    {
        $this->db->select('*');
        $this->db->from('notif');
        if ($id != null) {
            $this->db->where('id_notif', $id);
        }
        $this->db->order_by('id_notif', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function hitung()
    {
        $this->db->from('notif');
        $this->db->where('baca', 0);
        $query = $this->db->get()->num_rows();
        return $query;
    }
    public function add($judul, $url)
    {
        $this->db->set('judul', $judul);
        $this->db->set('url', $url);
        $this->db->insert('notif');
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
}

/* End of file Notif_model.php */
