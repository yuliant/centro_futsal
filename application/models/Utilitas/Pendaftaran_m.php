<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_m extends CI_Model
{
    public function TampilData()
    {
        $this->db->select('*');
        $this->db->from('kedatangan');
        $this->db->where('kuota !=', 0);
        $this->db->where('tgl_kedatangan >', date('Y-m-d'));
        $this->db->order_by('id_tgl_kedatangan', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function TampilDataById($id)
    {
        $this->db->select('*');
        $this->db->from('kedatangan');
        $this->db->where('id_tgl_kedatangan', $id);
        $query = $this->db->get();
        return $query;
    }

    public function AlasanBAP($id = null)
    {
        $this->db->select('*');
        $this->db->from('alasan_bap');
        if ($id != null) {
            $this->db->where('no_alasan_bap', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function addPemohondd($id, $post, $kode_pendaftaran, $file_ktp, $file_sk_polisi)
    {
        $this->db->set('id_tgl_kedatangan', $id);
        $this->db->set('alasan_bap', htmlspecialchars($post['alasan_bap'], true));
        $this->db->set('kode_pendaftaran', $kode_pendaftaran);
        $this->db->set('nik', htmlspecialchars($post['nik'], true));
        $this->db->set('nama_pemohon', htmlspecialchars($post['nama_pemohon'], true));
        $this->db->set('tempat_lahir', htmlspecialchars($post['tempat_lahir'], true));
        $this->db->set('tanggal_lahir', htmlspecialchars($post['tanggal_lahir'], true));
        $this->db->set('telpon', htmlspecialchars($post['telpon'], true));
        $this->db->set('email', htmlspecialchars($post['email'], true));
        $this->db->set('alamat', htmlspecialchars($post['alamat'], true));
        $this->db->set('no_paspor', htmlspecialchars($post['no_paspor'], true));
        $this->db->set('keluaran_kanim', htmlspecialchars($post['keluaran_kanim'], true));
        $this->db->set('metode_bap', htmlspecialchars($post['metode_bap'], true));
        $this->db->set('foto_ktp', $file_ktp);
        $this->db->set('foto_sk_polisi', $file_sk_polisi);
        $this->db->set('status_laporan', 1);
        $this->db->insert('pemohon_data_diri');
    }

    public function KurangiSatuKuota($id)
    {
        $this->db->select('kuota');
        $this->db->from('kedatangan');
        $this->db->where('id_tgl_kedatangan', $id);
        $query = $this->db->get()->row()->kuota;

        $this->db->set('kuota', $query - 1);
        $this->db->where('id_tgl_kedatangan', $id);
        $this->db->update('kedatangan');
    }
}

/* End of file Pendaftaran_m.php */
