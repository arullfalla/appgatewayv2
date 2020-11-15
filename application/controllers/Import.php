<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('form');
    }
    /**
     * Menampilkan halaman import data.
     *
     */
    public function index()
    {
        // Action form.
        $data['action'] = site_url('import/process');

        $header['judul'] = "Dashboard | Selamat Datang";
        $this->load->view('templates/v_header_admin', $header);
        $this->load->view('admin/v_import', $data);
        $this->load->view('templates/v_footer_admin');
    }

    /**
     * Memproses data yang diimport.
     *
     */
    public function process()
    {
        if (isset($_POST['import'])) {

            $file = $_FILES['pelanggan']['tmp_name'];

            // Medapatkan ekstensi file csv yang akan diimport.
            $ekstensi  = explode('.', $_FILES['pelanggan']['name']);

            // Tampilkan peringatan jika submit tanpa memilih menambahkan file.
            if (empty($file)) {
                echo 'File tidak boleh kosong!';
            } else {
                // Validasi apakah file yang diupload benar-benar file csv.
                if (strtolower(end($ekstensi)) === 'csv' && $_FILES["pelanggan"]["size"] > 0) {

                    $i = 0;
                    $handle = fopen($file, "r");
                    while (($row = fgetcsv($handle, 2048))) {
                        $i++;
                        if ($i == 1) continue;

                        // Data yang akan disimpan ke dalam databse
                        $data = [
                            'barcode' => $row[0],
                            'nama' => $row[1],
                            'tgl_lahir' => $row[2],
                            'alamat' => $row[3],
                            'tlp' => $row[4],
                            'status' => $row[5],
                        ];

                        // Simpan data ke database.
                        $this->admin_model->simpanimport($data);
                    }

                    fclose($handle);
                    redirect('admin/datavisitor');
                } else {
                    echo 'Format file tidak valid!';
                }
            }
        }
    }
}
