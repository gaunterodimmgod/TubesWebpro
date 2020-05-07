<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url());
        }
        $this->load->model('Model_master');
    }

    public function index()
    {
        if (isset($_GET['nama_pasien']) && !empty($_GET['nama_pasien'])) {
            $nama_pasien = $_GET['nama_pasien'];
        } else {
            $nama_pasien = "all";
        }
        $data["pasien"]  = $this->Model_master->view_all_master("*", "tbl_pasien", "nama_pasien", "desc");
        $data["history"] = $this->Model_master->getHistory("", $nama_pasien);
        $this->load->view('history/data-history', $data);
    }
}
