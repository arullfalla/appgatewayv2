<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
    }

    public function index()
    {
        echo "Anda Memasuki Halaman Migration Database";
        echo "Sebelum migration buat database dan set database dahulu !";
    }

    public function tbl_visitor()
    {
        if (!$this->migration->current()) {
            show_error($this->migration->error_string());
        } else {
            echo 'Tabel Visitor Berhasil Dibuat';
        }
    }

    public function tbl_user()
    {
        if (!$this->migration->version(2)) {
            show_error($this->migration->error_string());
        } else {
            echo 'Tabel User Berhasil Dibuat';
        }
    }

    public function tbl_content()
    {
        if (!$this->migration->version(3)) {
            show_error($this->migration->error_string());
        } else {
            echo 'Tabel Content Berhasil Dibuat';
        }
    }
}
