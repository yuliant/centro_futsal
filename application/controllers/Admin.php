<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->db->from('tb_lapangan');
    $this->db->where('aktif', 1);
    $data['lapangan'] = $this->db->get()->num_rows();

    $this->db->from('tb_jadwal');
    $this->db->where('status_jadwal', 2);
    $data['jadwal'] = $this->db->get()->num_rows();

    $this->db->from('tb_penyewaan');
    $this->db->where('status', 1);
    $data['penyewa'] = $this->db->get()->num_rows();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function role()
  {
    $data['title'] = 'Role';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get('user_role')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('templates/footer');
  }

  public function roleAccess($role_id)
  {
    $data['title'] = 'Role Access';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

    $this->db->where('id !=', 1); // semua data diambil kecuali data dengan id 1
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role-access', $data);
    $this->load->view('templates/footer');
  }

  public function changeAccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);
    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed</div>');
  }

  public function addRole()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //validation
    $this->form_validation->set_rules('role', 'Role', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/role', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'role' => $this->input->post('role')
      ];
      $this->db->insert('user_role', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role added</div>');
      redirect('admin/role');
    }
  }

  public function deleteRole($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Admin_model', 'admin');
    $this->admin->deleteRole($id);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been delete</div>');
    redirect('admin/role');
  }


  public function kelolaUser()
  {
    $data['title'] = 'Kelola User';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['kelolaUser'] = $this->db->get_where('user', ['role_id' => 3])->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/kelola-user', $data);
    $this->load->view('templates/footer');
  }

  public function change_status_user($id, $is_active)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    if ($this->db->get_where('user', ['id' => $id, 'is_active' => $is_active = 1])->row_array()) {
      $this->db->where('id', $id);
      $this->db->update('user', ['is_active' => 0]);
    } else if ($this->db->get_where('user', ['id' => $id, 'is_active' => $is_active = 0])->row_array()) {
      $this->db->where('id', $id);
      $this->db->update('user', ['is_active' => 1]);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status user berhasil diubah</div>');
    redirect('admin/kelolaUser');
  }

  public function tambah_user()
  {
    $data['title'] = 'Tambah Data User';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //validation
    $this->form_validation->set_rules("name", "Name", "required|trim");
    $this->form_validation->set_rules("email", "Email", "required|trim|is_unique[user.email]|max_length[18]|min_length[6]", [
      'is_unique' => 'This NIP has already registered'
    ]);
    $this->form_validation->set_rules("new_pasword1", "Password", "required|trim|min_length[3]|matches[new_pasword2]", [
      'matches' => 'Password dont match!',
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules("new_pasword2", "Password", "required|trim|min_length[3]|matches[new_pasword1]");
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/tambah-user', $data);
      $this->load->view('templates/footer');
    } else {
      $email = $this->input->post('email', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('new_pasword1'), PASSWORD_DEFAULT),
        'role_id' => 1,
        'is_active' => 1,
        'date_created' => time()
      ];
      $this->db->insert('user', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created.</div>');
      redirect('admin/kelolaUser');
    }
  }

  public function delete_user($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Admin_model', 'admin');
    $this->admin->deleteUser($id);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil dihapus</div>');
    redirect('admin/kelolaUser');
  }

  public function edit_user($id)
  {
    $data['title'] = 'Edit Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['member'] = $this->db->get_where('user', ['id' => $id])->row_array();
    $data['id'] = $id;

    //validation
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $name = $this->input->post('name');
      $email = $this->input->post('email');

      // cek jika ada gambar
      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '2048';
        $config['upload_path'] = './assets/img/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $old_image = $data['user']['image'];
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
          }

          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
          redirect('user');
        }
      }

      $this->db->set('name', $name);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil di updated</div>');
      redirect('admin/kelolaUser');
    }
  }
}
