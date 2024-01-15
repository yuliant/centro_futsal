<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct() //method untuk menerapkan seluruh fungsi didalamnya ke dalam seluruh method di controller
	{
		parent::__construct(); // syarat method
		$this->load->library('form_validation'); // untuk memvalidasi inputan
	}

	public function index()
	{
		if ($this->session->userdata('email')) { //penge checkan apabila sdh login tidak bisa ke halaman login kecuali logout dahulu
			redirect('user');
		}

		$this->form_validation->set_rules("email", "Email", "required|trim|min_length[6]|valid_email");
		$this->form_validation->set_rules("password", "Password", "required|trim");
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			//validation success menggunakan method private
			$this->_login();
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules("name", "Name", "required|trim");
		$this->form_validation->set_rules("email", "Email", "required|valid_email|trim|is_unique[user.email]", [
			'is_unique' => 'This email has already registered'
		]);
		$this->form_validation->set_rules("password1", "Password", "required|trim|min_length[3]|matches[password2]", [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules("password2", "Password", "required|trim|min_length[3]|matches[password1]");

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created</div>');
			redirect('auth');
		}
	}

	private function _login()
	{
		$email = htmlspecialchars($this->input->post('email'));
		$password = htmlspecialchars($this->input->post('password'));

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) { // jika usernya ada
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
