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

    public function add()
    {
        $data['title'] = 'Tambah Data Lapangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_lapangan', 'Nama Lapangan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelola/lapangan/add', $data);
            $this->load->view('templates/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $image = $_FILES['image']['name'];
            $config['allowed_types'] = 'jpg|png|pdf|jpeg';
            $config['max_size']      = '10240';
            $config['upload_path'] = './assets/img/data';

            if (!is_dir('./assets/img/data')) {
                mkdir('./assets/img/data', 0777, TRUE);
            }
            $this->load->library('upload', $config);

            if ($image) {
                if ($this->upload->do_upload('image')) {
                    $file_image = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('kelola/lapangan/add');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input gagal, anda harus mengupload foto KTP</div>');
                redirect('kelola/lapangan/add');
            }

            $this->db->set('nama_lapangan', htmlspecialchars($post['nama_lapangan'], true));
            $this->db->set('keterangan', htmlspecialchars($post['keterangan'], true));
            $this->db->set('harga', htmlspecialchars($post['harga'], true));
            $this->db->set('gambar', $file_image);
            $this->db->insert('tb_lapangan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data lapangan berhasil ditambahkan</div>');
            redirect('kelola/lapangan');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Lapangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_lapangan', 'Nama Lapangan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
        if ($this->form_validation->run() == false) {
            $this->db->from('tb_lapangan');
            $this->db->where('id_lapangan', $id);
            $data['lapangan'] = $this->db->get()->row_array();
            $data['id'] = $id;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelola/lapangan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $image = $_FILES['image']['name'];
            $config['allowed_types'] = 'jpg|png|pdf|jpeg';
            $config['max_size']      = '10240';
            $config['upload_path'] = './assets/img/data';

            if (!is_dir('./assets/img/data')) {
                mkdir('./assets/img/data', 0777, TRUE);
            }
            $this->load->library('upload', $config);

            if ($image) {
                if ($this->upload->do_upload('image')) {
                    $file_image = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('kelola/lapangan/add');
                }
            } else {
                $file_image = null;
            }

            $this->db->set('nama_lapangan', htmlspecialchars($post['nama_lapangan'], true));
            $this->db->set('keterangan', htmlspecialchars($post['keterangan'], true));
            $this->db->set('harga', htmlspecialchars($post['harga'], true));
            if ($file_image) {
                $this->db->set('gambar', $file_image);
            }
            $this->db->where('id_lapangan', $id);
            $this->db->update('tb_lapangan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data lapangan berhasil diubah</div>');
            redirect('kelola/lapangan');
        }
    }

    public function delete($id)
    {
        $this->db->where('id_lapangan', $id);
        $this->db->delete('tb_lapangan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data lapangan berhasil dihapus</div>');
        redirect('kelola/lapangan');
    }

    public function change($id, $aktif)
    {
        $this->db->set('aktif', $aktif);
        $this->db->where('id_lapangan', $id);
        $this->db->update('tb_lapangan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data lapangan berhasil diupdate</div>');
        redirect('kelola/lapangan');
    }
}

/* End of file Lapangan.php */
