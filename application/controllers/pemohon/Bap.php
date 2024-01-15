<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bap extends CI_Controller
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
		$data['pemohon'] = $this->daftar_pemohon_m->showDataStatusEmpat()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('daftar_pemohonan/bap/index', $data);
		$this->load->view('templates/footer');
	}

	public function kirim($id)
	{
		$this->load->model('Pemohon/Daftar_pemohon_m', 'daftar_pemohon_m');
		$this->daftar_pemohon_m->kirimPutusan($id);
		$this->db->set('putusan', '');
		$this->db->where('id_pemohon_dd', $id);
		$coba = $this->db->update('pemohon_data_diri');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di kirim ke status PUTUSAN</div>');
		redirect('pemohon/bap');
	}
}

/* End of file Bap.php */
