<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_master');
    }

    public function index()
    {
        $data["all"] = $this->Model_master->getPasien();
        $this->load->view('pasien/data-pasien', $data);
    }

    public function tambah_proses()
    {
        $nama_pasien   = $this->input->post('nama_pasien');
        $alamat_pasien = $this->input->post('alamat_pasien');
        $noktp_pasien  = $this->input->post('noktp_pasien');
        $nohp_pasien   = $this->input->post('nohp_pasien');
        $email_pasien  = $this->input->post('email_pasien');
        $simpan = array(
            'nama_pasien'   => $nama_pasien,
            'alamat_pasien' => $alamat_pasien,
            'noktp_pasien'  => $noktp_pasien,
            'nohp_pasien'   => $nohp_pasien,
            'email_pasien'  => $email_pasien
        );
        $data = $this->Model_master->tambahMaster("tbl_pasien", $simpan);
        if ($data) {
            $this->session->set_flashdata("sukses", "BERHASIL MENYIMPAN");
        } else {
            $this->session->set_flashdata("error", "GAGAL MENYIMPAN");
        }
        redirect('pasien');
    }

    public function edit_proses()
    {
        $id_pasien     = $this->input->post('id_pasien');
        $nama_pasien   = $this->input->post('nama_pasien');
        $alamat_pasien = $this->input->post('alamat_pasien');
        $noktp_pasien  = $this->input->post('noktp_pasien');
        $nohp_pasien   = $this->input->post('nohp_pasien');
        $email_pasien  = $this->input->post('email_pasien');
        $simpan = array(
            'nama_pasien'   => $nama_pasien,
            'alamat_pasien' => $alamat_pasien,
            'noktp_pasien'  => $noktp_pasien,
            'nohp_pasien'   => $nohp_pasien,
            'email_pasien'  => $email_pasien
        );
        $data = $this->Model_master->editMaster(array('id_pasien' => $id_pasien), "tbl_pasien", $simpan);
        if ($data) {
            $this->session->set_flashdata("sukses", "BERHASIL MENYIMPAN");
        } else {
            $this->session->set_flashdata("error", "GAGAL MENYIMPAN");
        }
        redirect('pasien');
    }

    public function hapus($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "DATA ANDA GAGAL DI HAPUS");
            redirect('pasien');
        } else {
            $this->db->where('id_pasien', $id);
            $this->db->delete('tbl_pasien');
            $this->session->set_flashdata('sukses', "BERHASIL DI HAPUS");
            redirect('pasien');
        }
    }
}
