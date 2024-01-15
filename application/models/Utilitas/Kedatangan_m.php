<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kedatangan_m extends CI_Model
{
    public function TampilData($id = null)
    {
        $this->db->select('*');
        $this->db->from('kedatangan');
        if ($id != null) {
            $this->db->where('id_tgl_kedatangan', $id);
        }
        $this->db->order_by('id_tgl_kedatangan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function hapusData($id)
    {
        $this->db->delete('kedatangan', ['id_tgl_kedatangan ' => $id]);
    }

    public function tambahData($post)
    {
        $this->db->select('tgl_kedatangan');
        $this->db->from('kedatangan');
        $this->db->where('tgl_kedatangan', htmlspecialchars($post['tgl_kedatangan'], true));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return false;
        } else {
            $this->db->set('tgl_kedatangan', htmlspecialchars($post['tgl_kedatangan'], true));
            $this->db->set('jam_mulai', htmlspecialchars($post['jam_mulai'], true));
            $this->db->set('jam_selesai', htmlspecialchars($post['jam_selesai'], true));
            $this->db->set('kuota', htmlspecialchars($post['kuota'], true));
            $this->db->insert('kedatangan');
            return true;
        }
    }
}

/* End of file Kedatangan_m.php */
