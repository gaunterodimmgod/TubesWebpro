<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
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
        $data["all"] = $this->Model_master->getRiwayat();
        $this->load->view('riwayat/data-riwayat', $data);
    }

    public function tambah_proses()
    {
        $id_pasien     = $this->input->post('id_pasien');
        $tanggal       = $this->input->post('tanggal');
        $nama_riwayat  = $this->session->userdata('nama_dokter');
        $sakit         = $this->input->post('sakit');
        $obat          = $this->input->post('obat');
        $simpan = array(
            'id_pasien'    => $id_pasien,
            'tanggal'      => $tanggal,
            'nama_riwayat' => $nama_riwayat,
            'sakit'        => $sakit,
            'obat'         => $obat
        );
        $data = $this->Model_master->tambahMaster("tbl_riwayat", $simpan);
        if ($data) {
            $this->session->set_flashdata("sukses", "BERHASIL MENYIMPAN");
        } else {
            $this->session->set_flashdata("error", "GAGAL MENYIMPAN");
        }
        redirect('riwayat');
    }

    public function edit_proses()
    {
        $id_riwayat    = $this->input->post('id_riwayat');
        $id_pasien     = $this->input->post('id_pasien');
        $tanggal       = $this->input->post('tanggal');
        $nama_riwayat  = $this->session->userdata('nama_dokter');
        $sakit         = $this->input->post('sakit');
        $obat          = $this->input->post('obat');
        $simpan = array(
            'id_pasien'    => $id_pasien,
            'tanggal'      => $tanggal,
            'nama_riwayat' => $nama_riwayat,
            'sakit'        => $sakit,
            'obat'         => $obat
        );
        $data = $this->Model_master->editMaster(array('id_riwayat' => $id_riwayat), "tbl_riwayat", $simpan);
        if ($data) {
            $this->session->set_flashdata("sukses", "BERHASIL MENYIMPAN");
        } else {
            $this->session->set_flashdata("error", "GAGAL MENYIMPAN");
        }
        redirect('riwayat');
    }

    public function hapus($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('riwayat');
        } else {
            $this->db->where('id_riwayat', $id);
            $this->db->delete('tbl_riwayat');
            $this->session->set_flashdata('sukses', "Berhasil Dihapus");
            redirect('riwayat');
        }
    }
}
