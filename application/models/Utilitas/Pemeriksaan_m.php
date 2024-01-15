<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan_m extends CI_Model
{
    public function SearchByKode($kode)
    {
        $this->db->select('pemohon_data_diri.*, kedatangan.*');
        $this->db->from('pemohon_data_diri');
        $this->db->join('kedatangan', 'pemohon_data_diri.id_tgl_kedatangan = kedatangan.id_tgl_kedatangan', 'left');
        $this->db->where('pemohon_data_diri.kode_pendaftaran', $kode);
        $query = $this->db->get();
        return $query;
    }

    public function SearchByNIK($nik)
    {
        $this->db->select('pemohon_data_diri.*, kedatangan.*');
        $this->db->from('pemohon_data_diri');
        $this->db->join('kedatangan', 'pemohon_data_diri.id_tgl_kedatangan = kedatangan.id_tgl_kedatangan', 'left');
        $this->db->where('pemohon_data_diri.nik', $nik);
        $query = $this->db->get();
        return $query;
    }
}

/* End of file Pemeriksaan_m.php */
