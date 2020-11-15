<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    private $table = "tblvisitor";

    // tampilan data metode pagination
    public function get_count()
    {
        return $this->db->count_all($this->table);
    }

    public function get_authors($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    // tampilkan semua data pengunjung
    public function getData()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // tampilkan data berdasarkan id pengunjung
    public function getDataId($where)
    {
        $this->db->where($where);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // simpan data baru dari form data baru
    public function simpan($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // tampilkan data yang akan di edit
    public function getEdit($where)
    {
        $this->db->where($where);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // simpan data dari data pengunjung yang akan di edit
    public function editSimpan($data, $where)
    {
        $this->db->where($where);
        $query = $this->db->update($this->table, $data);
        return $query;
    }

    // hapus data pengunjung
    public function hapusData($where)
    {
        $this->db->where($where);
        $query = $this->db->delete($this->table);
        return $query;
    }

    // ambil data terakhir barcode + 1
    public function lastBarcode()
    {
        $this->db->select_max('barcode');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // ambil data berdasarkan Masuk
    public function getMasuk()
    {
        $this->db->where('status', 'Masuk');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // simpan export excel

    public function simpanimport($data)
    {
        return $this->db->insert($this->table, $data);
    }
}
