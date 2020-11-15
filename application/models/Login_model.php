<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    private $table = "tbluser";

    function cek_login($where)
    {
        return $this->db->get_where($this->table, $where);
    }
}
