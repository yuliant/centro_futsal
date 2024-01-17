<?php
defined('BASEPATH') or exit('No direct script access allowed');

class keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_without_check_access();
    }
    public function index()
    {
        $data['title'] = 'Keranjang';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->from('tb_penyewaan');
        $this->db->join('tb_lapangan', 'tb_lapangan.id_lapangan = tb_penyewaan.id_lapangan', 'left');
        $this->db->join('tb_jadwal', 'tb_jadwal.id_jadwal = tb_penyewaan.id_jadwal', 'left');
        $this->db->where('tb_penyewaan.id_user', $user['id']);
        $data['booking'] = $this->db->get()->result();

        $this->db->select_sum('harga');
        $data['total_harga'] = $this->db->get('tb_penyewaan')->row()->harga;

        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar_main', $data);
        $this->load->view('main/keranjang', $data);
        $this->load->view('templates/auth_footer');
    }

    public function delete($id)
    {
        $this->db->from('tb_penyewaan');
        $this->db->where('tb_penyewaan.id_penyewaan', $id);
        $sewa = $this->db->get()->row();

        $this->db->set('status_jadwal', 0);
        $this->db->where('id_jadwal', $sewa->id_jadwal);
        $this->db->update('tb_jadwal');

        $this->db->where('id_penyewaan', $id);
        $this->db->delete('tb_penyewaan');
        redirect('keranjang');
    }

    public function konfirmasi()
    {
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
                redirect('keranjang');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Input gagal, anda harus mengupload foto konfirmasi pembayaran</div>');
            redirect('keranjang');
        }

        $this->db->set('bukti_bayar', $file_image);
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('tb_penyewaan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data lapangan berhasil ditambahkan</div>');
        redirect('keranjang');
    }
}

/* End of file keranjang.php */
