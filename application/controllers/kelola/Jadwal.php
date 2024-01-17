<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_without_check_access();
    }
    public function index()
    {
        $data['title'] = 'Daftar Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Kelola/Jadwal_m', 'jadwal');
        $data['pemohon'] = $this->jadwal->get()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/jadwal/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'Tambah Data Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('tgl_jadwal', 'Tgl Jadwal', 'required');
        $this->form_validation->set_rules('jam', 'Keterangan', 'required');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
        if ($this->form_validation->run() == false) {
            $this->db->from('tb_lapangan');
            $data['lapangan'] = $this->db->get()->result();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelola/jadwal/add', $data);
            $this->load->view('templates/footer');
        } else {
            $post = $this->input->post(null, TRUE);

            $this->db->set('tgl_jadwal', htmlspecialchars($post['tgl_jadwal'], true));
            $this->db->set('jam', htmlspecialchars($post['jam'], true));
            $this->db->set('id_lapangan', htmlspecialchars($post['id_lapangan'], true));
            $this->db->insert('tb_jadwal');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data jadwal berhasil ditambahkan</div>');
            redirect('kelola/jadwal');
        }
    }

    public function delete($id)
    {
        $this->db->where('id_jadwal', $id);
        $this->db->delete('tb_jadwal');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data jadwal berhasil dihapus</div>');
        redirect('kelola/jadwal');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->from('tb_lapangan');
        $data['lapangan'] = $this->db->get()->result();

        $this->form_validation->set_rules('tgl_jadwal', 'Tgl Jadwal', 'required');
        $this->form_validation->set_rules('jam', 'Keterangan', 'required');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
        if ($this->form_validation->run() == false) {
            $this->db->from('tb_jadwal');
            $this->db->where('id_jadwal', $id);
            $data['jadwal'] = $this->db->get()->row_array();

            $data['id'] = $id;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelola/jadwal/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $post = $this->input->post(null, TRUE);

            $this->db->set('tgl_jadwal', htmlspecialchars($post['tgl_jadwal'], true));
            $this->db->set('jam', htmlspecialchars($post['jam'], true));
            $this->db->set('id_lapangan', htmlspecialchars($post['id_lapangan'], true));
            $this->db->where('id_jadwal', $id);
            $this->db->update('tb_jadwal');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data jadwal berhasil diubah</div>');
            redirect('kelola/jadwal');
        }
    }
}

/* End of file Jadwal.php */
