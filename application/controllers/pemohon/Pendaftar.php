<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar extends CI_Controller
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
        $data['pemohon'] = $this->daftar_pemohon_m->showDataStatusSatu()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('daftar_pemohonan/pendaftar/index', $data);
        $this->load->view('templates/footer');
    }

    public function kirim($id)
    {
        $this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
        $this->daftar_pemohon_m->kirimCekBerkas($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di kirim ke status CEK BERKAS</div>');
        redirect('pemohon/pendaftar');
    }

    public function delete($id)
    {
        $this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
        $data = $this->daftar_pemohon_m->showDataStatusSatu($id)->row();

        $path = './assets/img/data/' . $data->foto_ktp;
        unlink($path);

        if ($data->foto_sk_polisi) {
            $path = './assets/img/data/' . $data->foto_sk_polisi;
            unlink($path);
        }

        $this->daftar_pemohon_m->deleteByID($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pendaftaran berhasil dihapus</div>');
        redirect('pemohon/pendaftar');
    }

    public function edit($id)
    {
        $data['title'] = 'Daftar Permohonan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
        $this->load->model('Utilitas/Pendaftaran_m', 'pendaftaran_m');
        $data['pemohon'] = $this->daftar_pemohon_m->showDataStatusSatu($id)->row();
        $data['alasan_bap'] = $this->pendaftaran_m->AlasanBAP()->result();

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|min_length[16]|max_length[16]|numeric');
        $this->form_validation->set_rules('nama_pemohon', 'Nama', 'required|trim|max_length[40]');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat lahir', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required|trim');
        $this->form_validation->set_rules('telpon', 'No telpon', 'required|trim|numeric|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[20]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('alasan_bap', 'Alasan BAP', 'required|trim');
        $this->form_validation->set_rules('metode_bap', 'Metode BAP', 'required|trim');

        $this->form_validation->set_rules('no_paspor', 'No paspor', 'max_length[11]');
        $this->form_validation->set_rules('keluaran_kanim', 'Keluaran kanim', 'max_length[11]');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
        $this->form_validation->set_message('max_length', '%s anda terlalu panjang');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('daftar_pemohonan/pendaftar/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $foto_ktp = $_FILES['foto_ktp']['name'];
            $foto_sk_polisi = $_FILES['foto_sk_polisi']['name'];

            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = '10240';
            $config['upload_path'] = './assets/img/data';
            if (!is_dir('./assets/img/data')) {
                mkdir('./assets/img/data', 0777, TRUE);
            }
            $this->load->library('upload', $config);

            if ($foto_ktp) {
                $path = './assets/img/data/' . $data['pemohon']->foto_ktp;
                unlink($path);
                if ($this->upload->do_upload('foto_ktp')) {
                    $file_ktp = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('pemohon/pendaftar');
                }
            } else {
                $file_ktp = null;
            }

            if ($foto_sk_polisi) {
                $path2 = './assets/img/data/' . $data['pemohon']->foto_sk_polisi;
                unlink($path2);
                if ($this->upload->do_upload('foto_sk_polisi')) {
                    $file_sk_polisi = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('utilitas/pendaftaran');
                }
            } else {
                $file_sk_polisi = null;
            }

            $this->daftar_pemohon_m->edit($id, $post, $file_ktp, $file_sk_polisi);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pendaftaran berhasil diedit</div>');
            redirect('pemohon/pendaftar');
        }
    }
}

/* End of file Pendaftar.php */
