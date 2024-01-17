<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Kontak';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar_main', $data);
        $this->load->view('main/info/kontak', $data);
        $this->load->view('templates/auth_footer');
    }
}

/* End of file Kontak.php */
