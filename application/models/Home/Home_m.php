<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{
    public function TampilData()
    {
        $this->db->select('*');
        $this->db->from('kedatangan');
        $this->db->where('tgl_kedatangan >=', date('Y-m-d'));
        $this->db->where('jam_selesai >', date('H:i:s'));
        $this->db->where('kuota !=', 0);
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

    public function AmbilKuota($id)
    {
        $this->db->select('kuota');
        $this->db->from('kedatangan');
        $this->db->where('id_tgl_kedatangan', $id);
        $query = $this->db->get();
        return $query;
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

    public function DataPemohonByKode($kode)
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
        $this->db->order_by('pemohon_data_diri.id_pemohon_dd ', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function addPemohondd($id, $post, $kode_pendaftaran, $file_ktp, $file_sk_polisi, $foto_kk, $foto_lain, $file_akte_lahir)
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
        $this->db->set('foto_kk', $foto_kk);
        $this->db->set('foto_lain', $foto_lain);
        $this->db->set('foto_akte_lahir', $file_akte_lahir);
        $this->db->set('status_laporan', 2);
        $this->db->set('tgl_dibuat', date("Y-m-d"));
        $this->db->set('tgl_ubah_status', date("Y-m-d"));
        $this->db->insert('pemohon_data_diri');
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function editPemohondd($id_p, $id, $post, $kode_pendaftaran, $file_ktp = null, $file_sk_polisi = null, $foto_kk = null, $foto_lain = null, $file_akte_lahir = null)
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
        if ($file_ktp) {
            $this->db->set('foto_ktp', $file_ktp);
        }
        if ($file_sk_polisi) {
            $this->db->set('foto_sk_polisi', $file_sk_polisi);
        }
        if ($foto_kk) {
            $this->db->set('foto_kk', $foto_kk);
        }
        if ($foto_lain) {
            $this->db->set('foto_lain', $foto_lain);
        }
        if ($file_akte_lahir) {
            $this->db->set('foto_akte_lahir', $file_akte_lahir);
        }
        $this->db->set('status_laporan', 2);
        $this->db->set('status', 0);
        $this->db->where('id_pemohon_dd', $id_p);
        $this->db->update('pemohon_data_diri');
    }
}

/* End of file Home_m.php */
