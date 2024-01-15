<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller
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
        $data['pemohon'] = $this->daftar_pemohon_m->showDataStatusTiga()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('daftar_pemohonan/pemeriksaan/index', $data);
        $this->load->view('templates/footer');
    }

    public function kirim($id)
    {
        $this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
        $this->daftar_pemohon_m->kirimBAP($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di kirim ke status BAP</div>');
        redirect('pemohon/pemeriksaan');
    }
}

/* End of file Pemeriksaan.php */
