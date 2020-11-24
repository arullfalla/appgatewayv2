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
        $nama = $_POST['nama'];
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
        $this->cetakStruk($nama);
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

    public function cetakStruk($name)
    {
        $this->load->library('escpos');

        try {
            // inisialisasi printer
            $connector = new Escpos\PrintConnectors\FilePrintConnector("/dev/usb/lp0");

            /* Print a "Hello world" receipt" */
            $printer = new Escpos\Printer($connector);
            $printer->selectPrintMode(Escpos\Printer::MODE_FONT_B);
            $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
            $printer->text("Selamat Datang \n");
            $printer->text("Tuan/Nyonya " . $name . "\n");
            $printer->text("==============================\n");
            $printer->text("\n");
            $printer->text("\n");
            $printer->text("Tunjukan Kertas Ini Untuk Mengambil\n");
            $printer->text("Souvenir di Both Pengambilan");
            $printer->text("\n");
            $printer->text("\n");
            $printer->text("==============================\n");
            $printer->text("Terima Kasih\n");
            $printer->feed(2);


            /* Close printer */
            $printer->close();
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
        }
    }

    // list data visitor masuk
    public function visitorList()
    {
        $where = array('status' => 'Masuk');
        $whereBelum = array('status' => 'Belum');
        $header['judul'] = 'Visitor List';
        $data['visitor'] = $this->home_model->getDataMasuk($where);
        $data['masuk'] = $this->db->affected_rows($this->home_model->getDataMasuk($where));
        $data['belum'] = $this->db->affected_rows($this->home_model->getDataMasuk($whereBelum));
        $data['total'] = $this->db->affected_rows($this->home_model->getAll());
        // print_r($data['masuk']);
        // echo "<br>";
        // print_r($data['belum']);
        // echo "<br>";
        // print_r($data['total']);
        $this->load->view('templates/v_header_home', $header);
        $this->load->view('home/v_visitor_list', $data);
        $this->load->view('templates/v_footer_home');
    }

    // data policy
    public function policy()
    {
        $header['judul'] = 'Policy';
        $this->load->view('templates/v_header_home', $header);
        $this->load->view('home/v_data_policy');
        $this->load->view('templates/v_footer_home');
    }

    public function contact()
    {
        $header['judul'] = 'Contact';
        $data['contact'] = $this->home_model->getContact();
        $this->load->view('templates/v_header_home', $header);
        $this->load->view('home/v_contact', $data);
        $this->load->view('templates/v_footer_home');
    }
}
