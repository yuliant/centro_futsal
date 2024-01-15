<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_pemohon_m extends CI_Model
{
    public function showData($id = null)
    {
        $this->db->select('pemohon_data_diri.*, kedatangan.*, alasan_bap.*');
        $this->db->from('pemohon_data_diri');
        $this->db->join('kedatangan', 'pemohon_data_diri.id_tgl_kedatangan = kedatangan.id_tgl_kedatangan', 'left');
        $this->db->join('alasan_bap', 'pemohon_data_diri.alasan_bap = alasan_bap.no_alasan_bap ', 'left');
        if ($id != null) {
            $this->db->where('pemohon_data_diri.id_pemohon_dd', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function showDataStatusSatu($id = null)
    {
        $this->db->select('pemohon_data_diri.*, kedatangan.*, alasan_bap.*');
        $this->db->from('pemohon_data_diri');
        $this->db->join('kedatangan', 'pemohon_data_diri.id_tgl_kedatangan = kedatangan.id_tgl_kedatangan', 'left');
        $this->db->join('alasan_bap', 'pemohon_data_diri.alasan_bap = alasan_bap.no_alasan_bap ', 'left');
        if ($id != null) {
            $this->db->where('pemohon_data_diri.id_pemohon_dd', $id);
        }
        // $this->db->where('pemohon_data_diri.status_laporan', 1);
        $this->db->order_by('pemohon_data_diri.id_pemohon_dd ', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function deleteByID($id)
    {
        $this->db->where('id_pemohon_dd ', $id);
        $this->db->delete('pemohon_data_diri');
    }

    public function edit($id, $post, $file_ktp = null, $file_sk_polisi = null)
    {
        $this->db->set('alasan_bap', htmlspecialchars($post['alasan_bap'], true));
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
        if ($file_ktp != null) {
            $this->db->set('foto_ktp', $file_ktp);
        }
        if ($file_sk_polisi != null) {
            $this->db->set('foto_sk_polisi', $file_sk_polisi);
        }
        $this->db->where('id_pemohon_dd ', $id);
        $this->db->update('pemohon_data_diri');
    }

    public function showDataStatusDua($id = null)
    {
        $this->db->select('pemohon_data_diri.*, kedatangan.*, alasan_bap.*');
        $this->db->from('pemohon_data_diri');
        $this->db->join('kedatangan', 'pemohon_data_diri.id_tgl_kedatangan = kedatangan.id_tgl_kedatangan', 'left');
        $this->db->join('alasan_bap', 'pemohon_data_diri.alasan_bap = alasan_bap.no_alasan_bap ', 'left');
        if ($id != null) {
            $this->db->where('pemohon_data_diri.id_pemohon_dd', $id);
        }
        $this->db->where('pemohon_data_diri.status_laporan', 2);
        $this->db->order_by('pemohon_data_diri.id_pemohon_dd ', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function showDataStatusTiga($id = null)
    {
        $this->db->select('pemohon_data_diri.*, kedatangan.*, alasan_bap.*');
        $this->db->from('pemohon_data_diri');
        $this->db->join('kedatangan', 'pemohon_data_diri.id_tgl_kedatangan = kedatangan.id_tgl_kedatangan', 'left');
        $this->db->join('alasan_bap', 'pemohon_data_diri.alasan_bap = alasan_bap.no_alasan_bap ', 'left');
        if ($id != null) {
            $this->db->where('pemohon_data_diri.id_pemohon_dd', $id);
        }
        $this->db->where('pemohon_data_diri.status_laporan', 3);
        $this->db->order_by('pemohon_data_diri.id_pemohon_dd ', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function showDataStatusEmpat($id = null)
    {
        $this->db->select('pemohon_data_diri.*, kedatangan.*, alasan_bap.*');
        $this->db->from('pemohon_data_diri');
        $this->db->join('kedatangan', 'pemohon_data_diri.id_tgl_kedatangan = kedatangan.id_tgl_kedatangan', 'left');
        $this->db->join('alasan_bap', 'pemohon_data_diri.alasan_bap = alasan_bap.no_alasan_bap ', 'left');
        if ($id != null) {
            $this->db->where('pemohon_data_diri.id_pemohon_dd', $id);
        }
        $this->db->where('pemohon_data_diri.status_laporan', 4);
        $this->db->order_by('pemohon_data_diri.id_pemohon_dd ', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function showDataStatusLima($id = null)
    {
        $this->db->select('pemohon_data_diri.*, kedatangan.*, alasan_bap.*');
        $this->db->from('pemohon_data_diri');
        $this->db->join('kedatangan', 'pemohon_data_diri.id_tgl_kedatangan = kedatangan.id_tgl_kedatangan', 'left');
        $this->db->join('alasan_bap', 'pemohon_data_diri.alasan_bap = alasan_bap.no_alasan_bap ', 'left');
        if ($id != null) {
            $this->db->where('pemohon_data_diri.id_pemohon_dd', $id);
        }
        $this->db->where('pemohon_data_diri.status_laporan', 5);
        $this->db->order_by('pemohon_data_diri.id_pemohon_dd ', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function showDataStatusEnam($id = null)
    {
        $this->db->select('pemohon_data_diri.*, kedatangan.*, alasan_bap.*');
        $this->db->from('pemohon_data_diri');
        $this->db->join('kedatangan', 'pemohon_data_diri.id_tgl_kedatangan = kedatangan.id_tgl_kedatangan', 'left');
        $this->db->join('alasan_bap', 'pemohon_data_diri.alasan_bap = alasan_bap.no_alasan_bap ', 'left');
        if ($id != null) {
            $this->db->where('pemohon_data_diri.id_pemohon_dd', $id);
        }
        $this->db->where('pemohon_data_diri.metode_bap', "Walk in");
        $this->db->order_by('pemohon_data_diri.id_pemohon_dd ', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function showDataStatusTujuh($id = null)
    {
        $this->db->select('pemohon_data_diri.*, kedatangan.*, alasan_bap.*');
        $this->db->from('pemohon_data_diri');
        $this->db->join('kedatangan', 'pemohon_data_diri.id_tgl_kedatangan = kedatangan.id_tgl_kedatangan', 'left');
        $this->db->join('alasan_bap', 'pemohon_data_diri.alasan_bap = alasan_bap.no_alasan_bap ', 'left');
        if ($id != null) {
            $this->db->where('pemohon_data_diri.id_pemohon_dd', $id);
        }
        $this->db->where('pemohon_data_diri.metode_bap', "On the spot");
        $this->db->order_by('pemohon_data_diri.id_pemohon_dd ', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function showDataStatusDelapan($id = null)
    {
        $this->db->select('pemohon_data_diri.*, kedatangan.*, alasan_bap.*');
        $this->db->from('pemohon_data_diri');
        $this->db->join('kedatangan', 'pemohon_data_diri.id_tgl_kedatangan = kedatangan.id_tgl_kedatangan', 'left');
        $this->db->join('alasan_bap', 'pemohon_data_diri.alasan_bap = alasan_bap.no_alasan_bap ', 'left');
        if ($id != null) {
            $this->db->where('pemohon_data_diri.id_pemohon_dd', $id);
        }
        $this->db->where('pemohon_data_diri.metode_bap', "Zoom");
        $this->db->order_by('pemohon_data_diri.id_pemohon_dd ', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function kirimCekBerkas($id)
    {
        $this->db->set('status_laporan', 2);
        $this->db->where('id_pemohon_dd', $id);
        $this->db->update('pemohon_data_diri');
    }

    public function kirimPemeriksaan($id)
    {
        $this->db->set('status_laporan', 3);
        $this->db->where('id_pemohon_dd', $id);
        $this->db->update('pemohon_data_diri');
    }

    public function kirimBAP($id)
    {
        $this->db->set('status_laporan', 4);
        $this->db->set('tgl_ubah_status', date('Y-m-d'));
        $this->db->where('id_pemohon_dd', $id);
        $this->db->update('pemohon_data_diri');
    }

    public function kirimPutusan($id)
    {
        $this->db->set('status_laporan', 5);
        $this->db->set('tgl_ubah_status', date('Y-m-d'));
        $this->db->where('id_pemohon_dd', $id);
        $this->db->update('pemohon_data_diri');
    }

    public function addPutusan($id, $post)
    {
        $this->db->set('tgl_ubah_status', date('Y-m-d'));
        $this->db->set('putusan', htmlspecialchars($post['putusan'], true));
        $this->db->where('id_pemohon_dd', $id);
        $this->db->update('pemohon_data_diri');
    }
}

/* End of file Daftar_pemohon_m.php */
