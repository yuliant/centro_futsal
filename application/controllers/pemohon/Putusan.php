<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Putusan extends CI_Controller
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
        $data['pemohon'] = $this->daftar_pemohon_m->showDataStatusLima()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('daftar_pemohonan/putusan/index', $data);
        $this->load->view('templates/footer');
    }

    public function input_putusan($id)
    {
        $data['title'] = 'Daftar Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['id'] = $id;

        $this->form_validation->set_rules('putusan', 'Putusan', 'required|trim');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('daftar_pemohonan/putusan/input_putusan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
            $post = $this->input->post(null, TRUE);

            $this->daftar_pemohon_m->addPutusan($id, $post);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Putusan berhasil diinput</div>');
            redirect('pemohon/putusan');
        }
    }
}

/* End of file Putusan.php */
