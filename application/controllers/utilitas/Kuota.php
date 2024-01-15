<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Utilitas/Kedatangan_m', 'kedatangan_m');
    }

    public function index()
    {
        $data['title'] = 'Kuota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kedatangan'] = $this->kedatangan_m->TampilData()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/kuota/index', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->kedatangan_m->hapusData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('utilitas/kuota/index');
    }

    public function add()
    {
        $data['title'] = 'Tambah Kuota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('tgl_kedatangan', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim');
        $this->form_validation->set_rules('kuota', 'Kuota', 'required|trim|numeric|max_length[6]');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
        $this->form_validation->set_message('max_length', '%s anda terlalu panjang');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('utilitas/kuota/add', $data);
            $this->load->view('templates/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $respons = $this->kedatangan_m->tambahData($post);

            if ($respons) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
                redirect('utilitas/kuota/index');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tanggal sudah ada, data gagal ditambahkan</div>');
                redirect('utilitas/kuota/index');
            }
        }
    }
}

/* End of file Kuota.php */
