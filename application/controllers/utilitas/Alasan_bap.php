<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alasan_bap extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Alasan BAP';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Utilitas/Alasan_bap_m', 'alasan_bap_m');
        $data['alasan_bap'] = $this->alasan_bap_m->TampilData()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/alasan_bap/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'Alasan BAP';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Utilitas/Alasan_bap_m', 'alasan_bap_m');

        $this->form_validation->set_rules('alasan', 'Alasan', 'required|trim|max_length[40]');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
        $this->form_validation->set_message('max_length', '%s anda terlalu panjang');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('utilitas/alasan_bap/add', $data);
            $this->load->view('templates/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->alasan_bap_m->addAlasan($post);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
            redirect('utilitas/alasan_bap');
        }
    }

    public function delete($id)
    {
        $this->load->model('Utilitas/Alasan_bap_m', 'alasan_bap_m');
        $this->alasan_bap_m->HapusData($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
        redirect('utilitas/alasan_bap');
    }
}

/* End of file Alasan_bap.php */
