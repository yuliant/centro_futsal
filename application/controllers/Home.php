<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home/Home_m', 'home_m');
        $this->load->model('Utilitas/Pendaftaran_m', 'pendaftaran_m');
    }

    public function index()
    {
        $data['title'] = 'Home Page';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar_main', $data);
        $this->load->view('main/index2');
        $this->load->view('templates/auth_footer');
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

    public function pilihtanggal($id_permohonan)
    {
        if (!decrypt_url($id_permohonan)) {
            redirect('home');
        }
        $data['id_pemohon_dd'] = decrypt_url($id_permohonan);

        $data['title'] = 'Pilih Tanggal';
        $this->load->model('Home/Home_m', 'home_m');
        $data['kedatangan'] = $this->home_m->TampilData()->result();

        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('home/list_kuota', $data);
        $this->load->view('templates/home_footer');
    }

    public function pengajuan()
    {
        $data['title'] = 'Buat Permohonan';
        $data['alasan_bap'] = $this->home_m->AlasanBAP()->result();

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|min_length[16]|max_length[16]|numeric');
        $this->form_validation->set_rules('nama_pemohon', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required|trim');
        $this->form_validation->set_rules('telpon', 'No telpon', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('alasan_bap', 'Alasan BAP', 'required|trim');
        $this->form_validation->set_rules('metode_bap', 'Metode BAP', 'required|trim');

        // $this->form_validation->set_rules('no_paspor', 'No paspor', 'max_length[11]');
        // $this->form_validation->set_rules('keluaran_kanim', 'Keluaran kanim', 'max_length[11]');
        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
        $this->form_validation->set_message('max_length', '%s anda terlalu panjang');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/home_header', $data);
            $this->load->view('templates/home_topbar', $data);
            $this->load->view('home/add', $data);
            $this->load->view('templates/home_footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $foto_ktp = $_FILES['foto_ktp']['name'];
            $foto_sk_polisi = $_FILES['foto_sk_polisi']['name'];
            $foto_kk = $_FILES['foto_kk']['name'];
            $foto_lain = $_FILES['foto_lain']['name'];
            $foto_akte_lahir = $_FILES['foto_akte_lahir']['name'];
            $kode_pendaftaran = $this->_random(15);

            $config['allowed_types'] = 'jpg|png|pdf|jpeg';
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
                    redirect('home/list');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input gagal, anda harus mengupload foto KTP</div>');
                redirect('home/list');
            }

            if ($foto_sk_polisi) {
                if ($this->upload->do_upload('foto_sk_polisi')) {
                    $file_sk_polisi = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('home/list');
                }
            } else {
                $file_sk_polisi = null;
            }

            if ($foto_kk) {
                if ($this->upload->do_upload('foto_kk')) {
                    $file_kk = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('home/list');
                }
            } else {
                $file_kk = null;
            }

            if ($foto_lain) {
                if ($this->upload->do_upload('foto_lain')) {
                    $file_lain = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('home/list');
                }
            } else {
                $file_lain = null;
            }

            if ($foto_akte_lahir) {
                if ($this->upload->do_upload('foto_akte_lahir')) {
                    $file_akte_lahir = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('home/list');
                }
            } else {
                $file_akte_lahir = null;
            }

            $id = $this->home_m->addPemohondd(null, $post, $kode_pendaftaran, $file_ktp, $file_sk_polisi, $file_kk, $file_lain, $file_akte_lahir);
            $this->load->model('Notif_model', 'notif');
            $this->notif->add("Permohonan Baru dari " . $this->input->post('nama_pemohon') . " (" . $this->input->post('nik') . ")", "pemohon/cek_berkas/index");

            $this->session->set_flashdata("success", "This is success message");
            // session()->setFlashdata("success", "This is success message");
            redirect('home/detail/' . encrypt_url($id));
        }
    }

    public function list()
    {
        $data['title'] = 'Pilih Tanggal';

        $this->load->model('Home/Home_m', 'home_m');
        $data['kedatangan'] = $this->home_m->TampilData()->result();

        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('home/list_kuota', $data);
        $this->load->view('templates/home_footer');
    }

    public function add($id_pemohon, $id_tanggal)
    {
        if (!decrypt_url($id_tanggal) && !decrypt_url($id_pemohon)) {
            redirect('home');
        }
        $id_pemohon2 = decrypt_url($id_pemohon);
        $id_tanggal2 = decrypt_url($id_tanggal);

        $this->db->from('pemohon_data_diri');
        $this->db->where('id_pemohon_dd', $id_pemohon2);
        $query = $this->db->get()->row();

        $this->db->set('id_tgl_kedatangan', $id_tanggal2);
        $this->db->set('status_laporan', 3);
        $this->db->where('id_pemohon_dd', $id_pemohon2);
        $coba = $this->db->update('pemohon_data_diri');

        $this->pendaftaran_m->KurangiSatuKuota($id_tanggal2);

        $this->load->model('Notif_model', 'notif');
        $this->notif->add("Tanggal booking telah dipilih oleh " . $query->nama_pemohon . " (" . $query->nik . ")", "pemohon/pemeriksaan/index");

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tanggal booking berhasil ditambahkan</div>');
        redirect('home/detail/' . encrypt_url($id_pemohon2));
    }

    public function show($kode)
    {
        $data['kode'] = $kode;
        $data['title'] = 'Cetak PDF';
        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('home/sebelum_cetak', $data);
        $this->load->view('templates/home_footer');
    }

    public function cetak($kode)
    {
        $this->load->model('Home/Home_m', 'home_m');
        $pemohon = $this->home_m->DataPemohonByKode($kode);

        if (!$pemohon->num_rows() > 0) {
            redirect('home');
        }

        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
        $dompdf = new Dompdf();
        $data = array(
            "nama" => $pemohon->row()->nama_pemohon,
            "tgl" => date("d-m-Y", strtotime($pemohon->row()->tgl_kedatangan)),
            "jam" => $pemohon->row()->jam_mulai . " - " . $pemohon->row()->jam_selesai,
            "unit" => "Unit Layanan Paspor",
            "qr" => $kode,
            "metode_bap" => $pemohon->row()->metode_bap
        );

        $html = $this->load->view('home/cetak', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'portrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        $dompdf->stream('Antrian Paspor.pdf', array("Attachment" => false));
    }

    //fitur cetak permohonan
    public function search()
    {
        $this->load->model('Home/Home_m', 'home_m');
        $data['title'] = 'Cetak dan Cek Permohonan';
        $nik = htmlspecialchars($this->input->get('nik'), true);

        $data['kedatangan'] = $this->home_m->SearchByNIK($nik)->result();

        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('home/cetak_permohonan/index', $data);
        $this->load->view('templates/home_footer');
    }

    public function detail($id)
    {
        if (!decrypt_url($id)) {
            redirect('home');
        }

        $data['title'] = 'Detail Permohonan';

        $id_pemohon = decrypt_url($id);
        $this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
        $data['pemohon'] = $this->daftar_pemohon_m->showData($id_pemohon)->row();

        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('home/cetak_permohonan/detail', $data);
        $this->load->view('templates/home_footer');
    }

    public function tanda_tangan($id)
    {
        if (!decrypt_url($id)) {
            redirect('home');
        }

        $data['title'] = 'Tanda Tangan Berkas Permohonan';

        $id_pemohon = decrypt_url($id);
        $this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
        $data['pemohon'] = $this->daftar_pemohon_m->showData($id_pemohon)->row();

        $this->load->view('templates/home_header', $data);
        $this->load->view('templates/home_topbar', $data);
        $this->load->view('home/cetak_permohonan/tanda_tangan', $data);
        $this->load->view('templates/home_footer');
    }

    public function upload_ttd()
    {
        $folderPath = "assets/img/data/";
        $image_parts = explode(";base64,", $_POST['signed']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $img_ttd = uniqid() . '.' . $image_type;
        $file = $folderPath . $img_ttd;
        file_put_contents($file, $image_base64);

        $this->db->set('foto_ttd', $img_ttd);
        $this->db->where('id_pemohon_dd', $_POST['id_pemohon_dd']);
        $this->db->update('pemohon_data_diri');

        $this->load->model('Notif_model', 'notif');
        $this->notif->add("Berkas permohonan dari " . $_POST['nama'] . " sudah ditanda tangani", "pemohon/bap/index");

        $this->session->set_flashdata("ttd", "This is success message");
        redirect('home/detail/' . encrypt_url($_POST['id_pemohon_dd']));
    }

    public function edit($id)
    {
        if (!decrypt_url($id)) {
            redirect('home');
        }

        $data['title'] = 'Edit Permohonan';

        $id_pemohon = decrypt_url($id);
        $this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
        $data['pemohon'] = $this->daftar_pemohon_m->showData($id_pemohon)->row();
        $data['alasan_bap'] = $this->home_m->AlasanBAP()->result();
        $data['id_pemohon'] = $id_pemohon;

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|min_length[16]|max_length[16]|numeric');
        $this->form_validation->set_rules('nama_pemohon', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required|trim');
        $this->form_validation->set_rules('telpon', 'No telpon', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('alasan_bap', 'Alasan BAP', 'required|trim');
        $this->form_validation->set_rules('metode_bap', 'Metode BAP', 'required|trim');

        //message
        $this->form_validation->set_message('required', '%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('numeric', '%s harus diisi dengan nominasi angka');
        $this->form_validation->set_message('max_length', '%s anda terlalu panjang');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/home_header', $data);
            $this->load->view('templates/home_topbar', $data);
            $this->load->view('home/edit', $data);
            $this->load->view('templates/home_footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $foto_ktp = $_FILES['foto_ktp']['name'];
            $foto_sk_polisi = $_FILES['foto_sk_polisi']['name'];
            $foto_kk = $_FILES['foto_kk']['name'];
            $foto_lain = $_FILES['foto_lain']['name'];
            $foto_akte_lahir = $_FILES['foto_akte_lahir']['name'];
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
                    redirect('home/list');
                }
            } else {
                $file_ktp = null;
            }

            if ($foto_sk_polisi) {
                if ($this->upload->do_upload('foto_sk_polisi')) {
                    $file_sk_polisi = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('home/list');
                }
            } else {
                $file_sk_polisi = null;
            }

            if ($foto_kk) {
                if ($this->upload->do_upload('foto_kk')) {
                    $file_kk = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('home/list');
                }
            } else {
                $file_kk = null;
            }

            if ($foto_lain) {
                if ($this->upload->do_upload('foto_lain')) {
                    $file_lain = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('home/list');
                }
            } else {
                $file_lain = null;
            }

            if ($foto_akte_lahir) {
                if ($this->upload->do_upload('foto_akte_lahir')) {
                    $file_akte_lahir = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('home/list');
                }
            } else {
                $file_akte_lahir = null;
            }

            $id = $this->home_m->editPemohondd($id_pemohon, null, $post, $kode_pendaftaran, $file_ktp, $file_sk_polisi, $file_kk, $file_lain, $file_akte_lahir);

            $this->load->model('Notif_model', 'notif');
            $this->notif->add("Edit Data Permohonan dari " . $this->input->post('nama_pemohon') . " (" . $this->input->post('nik') . ") diajukan", "pemohon/cek_berkas/index");

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pengajuan berhasil diedit</div>');
            redirect('home/detail/' . encrypt_url($id_pemohon));
        }
    }
}

/* End of file Home.php */
