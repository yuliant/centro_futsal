<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notif extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Notifikasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Notif_model', 'notif');
        $data['notif'] = $this->notif->all()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('daftar_pemohonan/notif/index', $data);
        $this->load->view('templates/footer');
    }

    function baca($id)
    {
        $this->load->model('Notif_model', 'notif');
        $notif = $this->notif->all($id)->row();

        $this->db->set('baca', 1);
        $this->db->where('id_notif', $id);
        $this->db->update('notif');
        redirect($notif->url);
    }

    function readall()
    {
        $this->db->set('baca', 1);
        $this->db->update('notif');
        redirect('pemohon/notif');
    }

    function deleteall()
    {
        $this->db->empty_table('notif');
        redirect('pemohon/notif');
    }
}

/* End of file Notif.php */
