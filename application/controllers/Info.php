<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelola/Lapangan_m', 'lapangan');
    }

    public function lapangan()
    {
        $data['title'] = 'Info Lapangan';
        $status = 1;
        $this->load->model('Kelola/Lapangan_m', 'lapangan');
        $data['lapangan'] = $this->lapangan->get($status)->result();

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar_main', $data);
        $this->load->view('main/info/lapangan', $data);
        $this->load->view('templates/auth_footer');
    }

    public function lapangan_detail($id_lapangan)
    {
        if (!decrypt_url($id_lapangan)) {
            redirect('home');
        }

        $data['id_lapangan'] = decrypt_url($id_lapangan);
        $data['title'] = 'Info Detail Lapangan';

        $this->db->from('tb_lapangan');
        $this->db->where('id_lapangan', $data['id_lapangan']);
        $data['b'] = $this->db->get()->row();

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar_main', $data);
        $this->load->view('main/info/lapangan_detail', $data);
        $this->load->view('templates/auth_footer');
    }

    public function jadwal($id_lapangan)
    {
        if (!decrypt_url($id_lapangan)) {
            redirect('home');
        }
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!$user) {
            redirect('auth');
        }
        $data['id_lapangan'] = decrypt_url($id_lapangan);
        $data['title'] = 'Info Jadwal Lapangan';

        $this->db->from('tb_jadwal');
        $this->db->join('tb_lapangan', 'tb_lapangan.id_lapangan = tb_jadwal.id_lapangan', 'left');
        $this->db->order_by('tb_jadwal.id_jadwal', 'DESC');
        $this->db->where('tb_jadwal.id_lapangan', $data['id_lapangan']);
        $this->db->where('tb_jadwal.tgl_jadwal >=', date('Y-m-d'));
        $data['jadwal'] = $this->db->get()->result();

        $this->db->from('tb_lapangan');
        $this->db->where('id_lapangan', $data['id_lapangan']);
        $data['b'] = $this->db->get()->row();

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar_main', $data);
        $this->load->view('main/info/lapangan_jadwal', $data);
        $this->load->view('templates/auth_footer');
    }

    public function booking($id_lapangan, $id_jadwal)
    {
        if (!decrypt_url($id_lapangan) && !decrypt_url($id_jadwal)) {
            redirect('home');
        }
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!$user) {
            redirect('auth');
        }
        $data['id_lapangan'] = decrypt_url($id_lapangan);
        $data['id_jadwal'] = decrypt_url($id_jadwal);

        $this->db->from('tb_lapangan');
        $this->db->where('id_lapangan', $data['id_lapangan']);
        $data['lapangan'] = $this->db->get()->row();

        $this->db->set('id_jadwal', $data['id_jadwal']);
        $this->db->set('id_user', $user['id']);
        $this->db->set('id_lapangan', $data['id_lapangan']);
        $this->db->set('no_telp', $user['no_telp']);
        $this->db->set('harga', $data['lapangan']->harga);
        $this->db->set('no_penyewaan', $this->_no_sewa());
        $this->db->insert('tb_penyewaan');

        $this->db->set('status_jadwal', 1);
        $this->db->where('id_jadwal', $data['id_jadwal']);
        $this->db->update('tb_jadwal');

        redirect('info/jadwal/' . encrypt_url($data['id_lapangan']));
    }

    private function _no_sewa()
    {
        $last = $this->db->order_by('id_penyewaan', "desc")
            ->limit(1)
            ->get('tb_penyewaan')
            ->row();

        $angka_urut =  $last->id_penyewaan + 1;
        $angka_urut_format = sprintf('%05d', $angka_urut);
        return $angka_urut_format;
    }

    public function daftar_booking()
    {
        is_logged_in_without_check_access();
        $data['title'] = 'Daftar Booking';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->from('tb_penyewaan');
        $this->db->join('tb_lapangan', 'tb_lapangan.id_lapangan = tb_penyewaan.id_lapangan', 'left');
        $this->db->join('tb_jadwal', 'tb_jadwal.id_jadwal = tb_penyewaan.id_jadwal', 'left');
        $this->db->where('tb_penyewaan.id_user', $user['id']);
        $data['booking'] = $this->db->get()->result();

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar_main', $data);
        $this->load->view('main/info/booking', $data);
        $this->load->view('templates/auth_footer');
    }

    public function cetak($id_penyewaan)
    {
        if (!decrypt_url($id_penyewaan)) {
            redirect('home');
        }
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!$user) {
            redirect('auth');
        }
        $data['id_penyewaan'] = decrypt_url($id_penyewaan);

        $this->db->from('tb_penyewaan');
        $this->db->join('tb_lapangan', 'tb_lapangan.id_lapangan = tb_penyewaan.id_lapangan', 'left');
        $this->db->join('user', 'user.id = tb_penyewaan.id_user', 'left');
        $this->db->join('tb_jadwal', 'tb_jadwal.id_jadwal = tb_penyewaan.id_jadwal', 'left');
        $this->db->where('tb_penyewaan.id_penyewaan', $data['id_penyewaan']);
        $data['jadwal'] = $this->db->get()->row();

        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
        $dompdf = new Dompdf();

        $html = $this->load->view('main/cetak', $data, true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'portrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        $dompdf->stream('Bukti Booking Centro Futsal.pdf', array("Attachment" => false));
    }
}

/* End of file Info.php */
