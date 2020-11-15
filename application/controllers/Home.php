<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
    }

    public function index()
    {
        $header['judul'] = "Search By Code";
        $this->load->view('templates/v_header_home', $header);
        $this->load->view('home/v_search');
        $this->load->view('templates/v_footer_home');
    }

    public function cari()
    {
        $inputsearch = $_POST['inputsearch'];
        if (!is_numeric($inputsearch)) {
            $this->cariAlamat();
        } else {
            $this->cariKode();
        }
    }

    public function cariAlamat()
    {
        $inputsearch = $_POST['inputsearch'];
        $where = array('alamat' => $inputsearch);
        $header['judul'] = "Data Pengunjung";
        $data['visitor'] = $this->home_model->getDataAlamat($where);
        $nums = $this->db->affected_rows($this->home_model->getDataAlamat($where));

        if ($nums != 0) {
            $this->load->helper(array('umur', 'date'));
            $this->load->view('templates/v_header_home', $header);
            $this->load->view('home/v_data', $data);
            $this->load->view('templates/v_footer_home');
        } else {
            $this->session->set_flashdata('data', 'Data Tidak ditemukan');
            redirect('home');
        }
    }

    public function cariKode()
    {
        $inputsearch = $_POST['inputsearch'];
        $where = array('barcode' => $inputsearch);
        $nums = $this->db->affected_rows($this->home_model->getDataBarcode($where));
        $header['judul'] = "Visitor Data";
        $data['visitor'] = $this->home_model->getDataBarcode($where);
        if ($nums !== 0) {
            $this->load->helper(array('umur', 'date'));
            $this->load->view('templates/v_header_home', $header);
            $this->load->view('home/v_visitor', $data);
            $this->load->view('templates/v_footer_webcam');
        } else {
            $this->session->set_flashdata('data', 'Data Tidak ditemukan');
            redirect('home');
        }
    }

    public function masuk()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];
        // gambar upload
        $img = $_POST['image'];
        $folderPath = "uploads/";
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);
        $image = $fileName;

        $data = array(
            'status' => $status,
            'image' => $image,
        );

        $where = array(
            'id' => $id
        );

        $this->home_model->updateMasuk($data, $where);
        $this->session->set_flashdata('data2', 'Selamat Datang Pengunjung !');
        redirect('home');
    }


    public function masukData($barcode)
    {
        $where = array('barcode' => $barcode);
        $nums = $this->db->affected_rows($this->home_model->getDataBarcode($where));
        $header['judul'] = "Visitor Data";
        $data['visitor'] = $this->home_model->getDataBarcode($where);
        if ($nums != 0) {
            $this->load->helper(array('umur', 'date'));
            $this->load->view('templates/v_header_home', $header);
            $this->load->view('home/v_visitor', $data);
            $this->load->view('templates/v_footer_webcam');
        } else {
            $this->session->set_flashdata('data', 'Data Tidak ditemukan');
            redirect('home');
        }
    }

    public function cetakStruk()
    {
        $struk['kop'] = array(
            'header' => 'Selamat Datang',
            'isi' => 'Struk, Pengambilan Souvenir',
            'footer' => 'Terima Kasih'
        );

        $this->load->view('frontend/v_struk', $struk);
    }
}