<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url());
        }
        $this->load->model('Model_master');
        $this->load->model('Model_login');
    }

    public function index()
    {
        $data['all'] = $this->Model_master->getMasterOneTable("*", "tbl_dokter", "id_dokter", "desc", "");
        $this->load->view('user/data-user', $data);
    }

    public function edit($id)
    {
        $data['user'] = $this->db->get_where('tbl_dokter', ['id_dokter' => $id])->row();
        $this->load->view('User/data-user', $data);
    }

    public function tambah_proses()
    {
        $nama_dokter = $this->input->post('nama_dokter');
        $alamat      = $this->input->post('alamat');
        $email       = $this->input->post('email');
        $password    = $this->input->post('password');
        $hp          = $this->input->post('hp');
        $jabatan     = $this->input->post('jabatan');
        $role        = $this->input->post('role');
        $simpan = array(
            'nama_dokter' => $nama_dokter,
            'alamat'      => $alamat,
            'email'       => $email,
            'password'    => md5($password),
            'hp'          => $hp,
            'jabatan'     => $jabatan,
            'role'        => $role
        );
        $data = $this->Model_master->tambahMaster("tbl_dokter", $simpan);
        if ($data) {
            $this->session->set_flashdata("sukses", "BERHASIL MENYIMPAN");
        } else {
            $this->session->set_flashdata("error", "GAGAL MENYIMPAN");
        }
        redirect('user');
    }

    public function edit_proses()
    {
        $id = $this->input->post('id_dokter');
        $passDatabase = $this->Model_login->get_login($id)[0]->password;
        $passLama = md5($this->input->post('passLama'));
        $passBaru = md5($this->input->post('passBaru'));
        $passKonf = md5($this->input->post('passKonf'));
        $this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[25]');
        if ($passLama != "" && $passBaru != "" && $passKonf != "") {
            //Update dengan password
            if ($this->form_validation->run() == true) {
                if ($passLama == $passDatabase) {
                    if ($passBaru == $passKonf) {
                        $data = [
                            'nama_dokter'  => ($this->input->post('nama_dokter')),
                            'alamat'       => ($this->input->post('alamat')),
                            'email'        => ($this->input->post('email')),
                            'password'     => md5($this->input->post('passBaru')),
                            'hp'           => ($this->input->post('hp')),
                            'jabatan'      => ($this->input->post('jabatan')),
                            'role'         => ($this->input->post('role'))
                        ];
                        $result = $this->Model_login->update($data, $id);
                        if ($result > 0) {
                            $this->session->set_flashdata('sukses', "BERHASIL MENYIMPAN");
                            redirect('user');
                        } else {
                            $this->session->set_flashdata('error', "GAGAL DI UBAH !!!");
                            redirect('user');
                        }
                    } else {
                        $this->session->set_flashdata('error', " PASSWORD BARU DAN KONFIRMASI PASSWORD HARUS SAMA !!!");
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('error', "PASSWORD LAMA SALAH !!!");
                    redirect('user');
                }
            } else {
                $data = [
                    'nama_dokter' => ($this->input->post('nama_dokter')),
                    'alamat'      => ($this->input->post('alamat')),
                    'email'       => ($this->input->post('email')),
                    'hp'          => ($this->input->post('hp')),
                    'jabatan'     => ($this->input->post('jabatan')),
                    'role'        => ($this->input->post('role'))
                ];
                $result = $this->Model_login->update($data, $id);
                if ($result > 0) {
                    $this->session->set_flashdata('sukses', "BERHASIL MENYIMPAN");
                    redirect('user');
                } else {
                    $this->session->set_flashdata('error', "GAGAL DI UBAH !!!");
                    redirect('user');
                }
                redirect('user');
            }
        } else {
            //Update tanpa ganti password
            $data = [
                'nama_dokter'  => ($this->input->post('nama_dokter')),
                'alamat'       => ($this->input->post('alamat')),
                'email'        => ($this->input->post('email')),
                'hp'           => ($this->input->post('hp')),
                'jabatan'      => ($this->input->post('jabatan')),
                'role'         => ($this->input->post('role'))
            ];
            $result = $this->Model_login->update($data, $id);
            if ($result > 0) {
                $this->session->set_flashdata('sukses', "BERHASIL MENYIMPAN");
                redirect('user');
            } else {
                $this->session->set_flashdata('error', "GAGAL DI UBAH !!!");
                redirect('user');
            }
        }
    }

    public function hapus($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('error', "DATA ANDA GAGAL DI HAPUS");
            redirect('user');
        } else {
            $this->db->where('id_dokter', $id);
            $this->db->delete('tbl_dokter');
            $this->session->set_flashdata('sukses', "BERHASIL DI HAPUS");
            redirect('user');
        }
    }
}
