<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_login');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function proses()
    {
        $cek_user = $this->Model_login->cek_user();
        if ($cek_user == FALSE) {
            $this->session->set_flashdata('pesan', "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' id='hide' data-dismiss='alert'>&times;</button>Username dan Password salah atau belum terdaftar !!!</div>");
            redirect(base_url());
        } else {
            $this->session->set_userdata('id_dokter', $cek_user->id_dokter);
            $this->session->set_userdata('nama_dokter', $cek_user->nama_dokter);
            $this->session->set_userdata('alamat', $cek_user->alamat);
            $this->session->set_userdata('email', $cek_user->email);
            $this->session->set_userdata('hp', $cek_user->hp);
            $this->session->set_userdata('jabatan', $cek_user->jabatan);
            $this->session->set_userdata('role', $cek_user->role);
            $this->session->set_userdata('status', 'login');
            redirect('dashboard');
        }
    }
}
