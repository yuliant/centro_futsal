<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_without_check_access();
    }
    public function index($id)
    {
        $data['title'] = 'Daftar Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
        $data['pemohon'] = $this->daftar_pemohon_m->showData($id)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('daftar_pemohonan/detail_pemohon', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Detail.php */
