<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model
{
    public $table  = 'tbl_dokter';
    public $id     = 'tbl_dokter.id_dokter';

    function update($data, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    function cek_user()
    {
        $email = set_value('email');
        $password = set_value('password');
        $proses = $this->db->where('email', $email)->where('password', md5($password))->limit(1)->get('tbl_dokter');
        if ($proses->num_rows() > 0) {
            return $proses->row();
        } else {
            return array();
        }
    }

    function ganti_password()
    {
        $id = $this->session->userdata('id_dokter');
        $hasil = $this->db->where('id_dokter', $id)->limit(1)->get('tbl_dokter');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return array();
        }
    }

    function get_login($id = null)
    {
        if (isset($id)) {
            $this->db->where("id_dokter", $id);
        }
        $this->db->select("id_dokter, password");
        $this->db->from("tbl_dokter");
        $this->db->order_by("id_dokter", "desc");
        return $this->db->get()->result();
    }
}
