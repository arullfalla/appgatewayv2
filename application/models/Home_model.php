<?php

class Home_model extends CI_Model
{
    private $table = "tblvisitor";
    private $tableContact = "tblcontact";

    public function getDataBarcode($where)
    {
        $this->db->where($where);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getDataAlamat($where)
    {
        $this->db->like($where);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function updateMasuk($data, $where)
    {
        $this->db->where($where);
        $query = $this->db->update($this->table, $data);
        return $query;
    }

    public function getDataMasuk($where)
    {
        $this->db->where($where);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getAll()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getContact()
    {
        $query = $this->db->get($this->tableContact);
        return $query->result();
    }
}
