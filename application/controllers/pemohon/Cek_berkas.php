<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_berkas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_without_check_access();
    }

    public function index()
    {
        $data['title'] = 'Daftar Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
        $data['pemohon'] = $this->daftar_pemohon_m->showDataStatusDua()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('daftar_pemohonan/cek_berkas/index', $data);
        $this->load->view('templates/footer');
    }

    public function kirim($id)
    {
        $this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
        $this->daftar_pemohon_m->kirimPemeriksaan($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di kirim ke status PEMERIKSAAN</div>');
        redirect('pemohon/cek_berkas');
    }

    public function setujui($id)
    {
        $data['title'] = 'Beri Alasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['id'] = $id;
        $data['putusan'] = "setujui";

        $this->form_validation->set_rules('putusan', 'Putusan', 'required|trim');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('daftar_pemohonan/cek_berkas/putusan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('status_laporan', 2);
            $this->db->set('status', 1);
            $this->db->set('putusan', $this->input->post('putusan'));
            $this->db->set('tgl_ubah_status', date("Y-m-d"));
            $this->db->where('id_pemohon_dd', $id);
            $this->db->update('pemohon_data_diri');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Permohonan berhasil di ubah</div>');
            redirect('pemohon/cek_berkas');
        }
    }

    public function tolak($id)
    {
        $data['title'] = 'Beri Alasan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['id'] = $id;
        $data['putusan'] = "tolak";

        $this->form_validation->set_rules('putusan', 'Putusan', 'required|trim');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('daftar_pemohonan/cek_berkas/putusan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->set('status_laporan', 2);
            $this->db->set('status', 2);
            $this->db->set('putusan', $this->input->post('putusan'));
            $this->db->where('id_pemohon_dd', $id);
            $this->db->update('pemohon_data_diri');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Permohonan berhasil di ubah</div>');
            redirect('pemohon/cek_berkas');
        }
    }
}

/* End of file Cek_berkas.php */
