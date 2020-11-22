<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        if ($this->session->userdata('status') == "login") {
            redirect(base_url("admin"));
        }
        $this->load->view('login');
    }

    public function masuk()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $where = array(
            'nama' => $username,
            'password' => md5($password)
        );

        $cek = $this->login_model->cek_login($where)->num_rows();
        if ($cek > 0) {
            $data_session = array(
                'nama' => $username,
                'status' => "login"
            );
            $this->session->set_userdata($data_session);
            $this->session->set_flashdata('data', 'Selamat' . $username . 'Berhasil Login !');
            redirect(base_url("admin"));
        } else {
            $this->session->set_flashdata('data', 'Username atau Password Salah !');
            redirect(base_url('login'));
        }
    }

    function keluar()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
