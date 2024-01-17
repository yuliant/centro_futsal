<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelola/Lapangan_m', 'lapangan');
    }

    public function lapangan()
    {
        $data['title'] = 'Info Lapangan';
        $status = 1;
        $this->load->model('Kelola/Lapangan_m', 'lapangan');
        $data['lapangan'] = $this->lapangan->get($status)->result();

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar_main', $data);
        $this->load->view('main/info/lapangan', $data);
        $this->load->view('templates/auth_footer');
    }

    public function jadwal($id_lapangan)
    {
        if (!decrypt_url($id_lapangan)) {
            redirect('home');
        }
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!$user) {
            redirect('auth');
        }
        $data['id_lapangan'] = decrypt_url($id_lapangan);
        $data['title'] = 'Info Jadwal Lapangan';

        $this->db->from('tb_jadwal');
        $this->db->join('tb_lapangan', 'tb_lapangan.id_lapangan = tb_jadwal.id_lapangan', 'left');
        $this->db->order_by('tb_jadwal.id_jadwal', 'DESC');
        $this->db->where('tb_jadwal.id_lapangan', $data['id_lapangan']);
        $data['jadwal'] = $this->db->get()->result();

        $this->db->from('tb_lapangan');
        $this->db->where('id_lapangan', $data['id_lapangan']);
        $data['b'] = $this->db->get()->row();

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar_main', $data);
        $this->load->view('main/info/lapangan_jadwal', $data);
        $this->load->view('templates/auth_footer');
    }

    public function booking($id_lapangan, $id_jadwal)
    {
        if (!decrypt_url($id_lapangan) && !decrypt_url($id_jadwal)) {
            redirect('home');
        }
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!$user) {
            redirect('auth');
        }
        $data['id_lapangan'] = decrypt_url($id_lapangan);
        $data['id_jadwal'] = decrypt_url($id_jadwal);

        $this->db->from('tb_lapangan');
        $this->db->where('id_lapangan', $data['id_lapangan']);
        $data['lapangan'] = $this->db->get()->row();

        $this->db->set('id_jadwal', $data['id_jadwal']);
        $this->db->set('id_user', $user['id']);
        $this->db->set('id_lapangan', $data['id_lapangan']);
        $this->db->set('no_telp', $user['no_telp']);
        $this->db->set('harga', $data['lapangan']->harga);
        $this->db->insert('tb_penyewaan');

        $this->db->set('status_jadwal', 1);
        $this->db->where('id_jadwal', $data['id_jadwal']);
        $this->db->update('tb_jadwal');

        redirect('info/jadwal/' . encrypt_url($data['id_lapangan']));
    }

    public function daftar_booking()
    {
        is_logged_in_without_check_access();
        $data['title'] = 'Daftar Booking';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->from('tb_penyewaan');
        $this->db->join('tb_lapangan', 'tb_lapangan.id_lapangan = tb_penyewaan.id_lapangan', 'left');
        $this->db->join('tb_jadwal', 'tb_jadwal.id_jadwal = tb_penyewaan.id_jadwal', 'left');
        $this->db->where('tb_penyewaan.id_user', $user['id']);
        $data['booking'] = $this->db->get()->result();

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar_main', $data);
        $this->load->view('main/info/booking', $data);
        $this->load->view('templates/auth_footer');
    }
}

/* End of file Info.php */
