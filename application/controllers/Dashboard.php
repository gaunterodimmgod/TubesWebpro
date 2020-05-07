<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url());
        }
        $this->load->model('Model_login');
        $this->load->model('Model_master');
    }

    public function index()
    {
        $data["pasien"]  = $this->Model_master->view_bulan_pasien();
        $data["riwayat"] = $this->Model_master->view_bulan_riwayat();
        $this->load->view('dashboard', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
