<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Utilitas/Pemeriksaan_m', 'pemeriksaan_m');

        $kode = htmlspecialchars($this->input->get('kode'), true);
        $data['kedatangan'] = $this->pemeriksaan_m->SearchByNIK($kode)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('utilitas/pemeriksaan/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetak($kode)
    {
        $this->load->model('Utilitas/Pemeriksaan_m', 'pemeriksaan_m');
        $pemohon = $this->pemeriksaan_m->SearchByKode($kode);

        if (!$pemohon->num_rows() > 0) {
            redirect('utilitas/pemeriksaan');
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
}

/* End of file Pemeriksaan.php */
