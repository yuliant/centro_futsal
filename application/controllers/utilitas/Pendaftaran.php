<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    private function _random($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    public function index()
    {
        $data['title'] = 'Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Utilitas/Pendaftaran_m', 'pendaftaran_m');
        $data['kedatangan'] = $this->pendaftaran_m->TampilData()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/pendaftaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function add($id_tanggal)
    {
        $data['title'] = 'Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Utilitas/Pendaftaran_m', 'pendaftaran_m');

        $id = decrypt_url($id_tanggal);
        $data['url'] = $id_tanggal;
        $data['tanggal'] = $this->pendaftaran_m->TampilDataById($id)->row();
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
            $this->load->view('utilitas/pendaftaran/add', $data);
            $this->load->view('templates/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $foto_ktp = $_FILES['foto_ktp']['name'];
            $foto_sk_polisi = $_FILES['foto_sk_polisi']['name'];
            $kode_pendaftaran = $this->_random(15);

            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = '10240';
            $config['upload_path'] = './assets/img/data';

            if (!is_dir('./assets/img/data')) {
                mkdir('./assets/img/data', 0777, TRUE);
            }
            $this->load->library('upload', $config);

            if ($foto_ktp) {
                if ($this->upload->do_upload('foto_ktp')) {
                    $file_ktp = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('utilitas/pendaftaran');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input gagal, anda harus mengupload foto KTP</div>');
                redirect('utilitas/pendaftaran');
            }

            if ($foto_sk_polisi) {
                if ($this->upload->do_upload('foto_sk_polisi')) {
                    $file_sk_polisi = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('utilitas/pendaftaran');
                }
            } else {
                $file_sk_polisi = null;
            }

            $this->pendaftaran_m->addPemohondd($id, $post, $kode_pendaftaran, $file_ktp, $file_sk_polisi);
            $this->pendaftaran_m->KurangiSatuKuota($id);
            redirect('utilitas/pendaftaran/show/' . $kode_pendaftaran);
        }
    }

    public function show($kode)
    {
        $data['kode'] = $kode;
        $data['title'] = 'Cetak PDF';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/pendaftaran/show', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Pendaftaran.php */
