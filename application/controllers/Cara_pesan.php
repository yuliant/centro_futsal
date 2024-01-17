<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cara_pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Cara Pesan';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('templates/topbar_main', $data);
        $this->load->view('main/info/cara_pesan', $data);
        $this->load->view('templates/auth_footer');
    }
}

/* End of file Cara_pesan.php */
