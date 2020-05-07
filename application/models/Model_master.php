<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_master extends CI_Model
{
    public function getRiwayat($id = null)
    {
        if (isset($id)) {
            $this->db->where("id_riwayat", $id);
        }
        $this->db->select("riwayat.*, pasien.nama_pasien");
        $this->db->from("tbl_riwayat riwayat");
        $this->db->join("tbl_pasien pasien", "pasien.id_pasien = riwayat.id_pasien", "left");
        $this->db->order_by("id_riwayat", "desc");
        return $this->db->get()->result();
    }

    function getPasien($id = null)
    {
        if (isset($id)) {
            $this->db->where("id_pasien", $id);
        }
        $this->db->select("*");
        $this->db->from("tbl_pasien");
        $this->db->order_by("id_pasien", "desc");
        return $this->db->get()->result();
    }

    public function getMasterOneTable($query, $table, $order, $sort, $condition)
    {
        $this->db->select($query);
        $this->db->from($table);
        if ($condition != "") {
            $this->db->where($condition);
        }
        $this->db->order_by($order, $sort);
        return $this->db->get()->result();
    }

    function tambahMaster($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function editMaster($id_master, $table, $dataMaster)
    {
        $this->db->where($id_master);
        $this->db->update($table, $dataMaster);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function view_all_master($query, $table, $order, $sort)
    {
        $this->db->select($query);
        $this->db->from($table);
        $this->db->order_by($order, $sort);
        return $this->db->get()->result();
    }

    function getMasterdata($table)
    {
        return $this->db->get($table)->result();
    }

    public function getHistory($id, $nama_pasien)
    {
        $this->db->select("R.*, P.nama_pasien");
        $this->db->from("tbl_riwayat R");
        $this->db->join("tbl_pasien P", "P.id_pasien = R.id_pasien", "left");
        if ($nama_pasien != "all" && $nama_pasien != "") {
            $this->db->where('R.id_pasien =', $nama_pasien);
        }
        if ($id != "") {
            $this->db->where('R.id_riwayat =', $id);
        }
        $this->db->order_by("R.id_riwayat", "desc");
        $result = $this->db->get();
        return $result->result();
    }

    public function view_bulan_pasien()
    {
        $this->db->select('count(id_pasien) AS bulan_pasien');
        $this->db->from('tbl_pasien');
        $this->db->where('MONTH(created_on) =', date('m'));
        return $this->db->get()->row();
    }

    public function view_bulan_riwayat()
    {
        $this->db->select('count(id_riwayat) AS bulan_riwayat');
        $this->db->from('tbl_riwayat');
        $this->db->where('MONTH(created_on) =', date('m'));
        return $this->db->get()->row();
    }
}
