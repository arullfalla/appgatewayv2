<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('pagination');

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $header['judul'] = "Dashboard | Selamat Datang";
        $this->load->view('templates/v_header_admin', $header);
        $this->load->view('admin/v_overview');
        $this->load->view('templates/v_footer_admin');
    }

    public function dataVisitor()
    {
        // setting perhalaman dan total nilai
        $config = array();
        $config["base_url"] = base_url() . "admin/datavisitor";
        $config["total_rows"] = $this->admin_model->get_count();
        $config["per_page"] = 15;
        $config["uri_segment"] = 3;

        // desain tombol
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['visitor'] = $this->admin_model->get_authors($config["per_page"], $page);


        $header['judul'] = "Data Visitor";
        $this->load->view('templates/v_header_admin', $header);
        $this->load->view('admin/v_visitor', $data);
        $this->load->view('templates/v_footer_admin.php');
    }

    public function getById($id)
    {
        $where = array('id' => $id);
        $data['visitor'] = $this->admin_model->getDataId($where);
        print_r($data);
    }

    // form create pengunjung
    public function create()
    {
        $header['judul'] = "Add Master Visitor";
        $data['barcode'] = $this->admin_model->lastBarcode();
        $this->load->view('templates/v_header_admin', $header);
        $this->load->view('admin/v_form_add', $data);
        $this->load->view('templates/v_footer_admin.php');
    }

    // simpan hasil form create pengunjung
    public function save()
    {
        $barcode = $_POST['barcode'];
        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $tlp = $_POST['tlp'];
        $status = $_POST['status'];
        $image = $_POST['image'];

        $data = array(
            'barcode' => $barcode,
            'nama' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'tlp' => $tlp,
            'status' => $status,
            'image' => $image,
        );

        $this->admin_model->simpan($data);
        $this->session->set_flashdata('data', 'Data Berhasil di Simpan');
        redirect('admin/create');
    }

    // tampilkan pengunjung untuk di edit ke dalam form edit
    public function edit($id)
    {
        $header['judul'] = "Edit Master Visitor";
        $where = array('id' => $id);
        $data['visitor'] = $this->admin_model->getEdit($where);
        $this->load->view('templates/v_header_admin', $header);
        $this->load->view('admin/v_form_edit', $data);
        $this->load->view('templates/v_footer_admin');
    }

    public function editSave()
    {
        $id = $_POST['id'];
        $barcode = $_POST['barcode'];
        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $tlp = $_POST['tlp'];
        $status = $_POST['status'];
        $image = 'default.png';

        $data = array(
            'barcode' => $barcode,
            'nama' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'tlp' => $tlp,
            'status' => $status,
            'image' => $image,
        );

        $where = array(
            'id' => $id
        );

        $this->admin_model->editSimpan($data, $where);
        $this->session->set_flashdata('data', 'Data Berhasil di Perbaharui');
        redirect('admin/datavisitor');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->admin_model->hapusData($where);
        $this->session->set_flashdata('data', 'Data Berhasil di Hapus');
        redirect('admin/datavisitor');
    }

    public function CetakPrint()
    {
        $header['judul'] = 'Cetak Data Masuk';
        $data['visitor'] = $this->admin_model->getMasuk();
        $this->load->view('templates/v_header_cetak', $header);
        $this->load->view('admin/v_cetak_masuk', $data);
        $this->load->view('templates/v_footer_admin');
    }

    public function ContactEdit()
    {
        $header['judul'] = "Contact Us";
        $where = array('id_kantor' => 1);
        $data['contact'] = $this->admin_model->getContact($where);
        $this->load->view('templates/v_header_admin', $header);
        $this->load->view('admin/v_form_contact', $data);
        $this->load->view('templates/v_footer_admin');
    }

    public function contactSave()
    {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tlp = $_POST['tlp'];
        $support = $_POST['support'];
        $billing = $_POST['billing'];

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'tlp' => $tlp,
            'support' => $support,
            'billing' => $billing,

        );

        $where = array(
            'id_kantor' => 1
        );

        $this->admin_model->editContact($data, $where);
        $this->session->set_flashdata('data', 'Data Berhasil di Perbaharui');
        redirect('admin/contactedit');
    }
}
