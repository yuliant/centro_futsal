<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyewaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_without_check_access();
    }

    public function index()
    {
        $data['title'] = 'Daftar Penyewaan / Booking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->from('tb_penyewaan');
        $this->db->join('tb_lapangan', 'tb_lapangan.id_lapangan = tb_penyewaan.id_lapangan', 'left');
        $this->db->join('tb_jadwal', 'tb_jadwal.id_jadwal = tb_penyewaan.id_jadwal', 'left');
        $this->db->join('user', 'user.id = tb_penyewaan.id_user', 'left');
        $data['booking'] = $this->db->get()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/penyewaan/index', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Penyewaan.php */
