<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_without_check_access();
    }

    public function index()
    {
        $data['title'] = 'Daftar Lapangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Kelola/Lapangan_m', 'lapangan');
        $data['pemohon'] = $this->lapangan->get()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/lapangan/index', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Lapangan.php */
