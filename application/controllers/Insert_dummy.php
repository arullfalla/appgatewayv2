<?php 

class Insert_dummy extends CI_Controller
{
    function insert_dumy()
    {
        // jumlah data yang akan di insert
        $jumlah_data = 1000;
        for ($i = 1; $i <= $jumlah_data; $i++) {
            $data   =   array(
                "barcode"  =>  '10005' . $i,
                "nama"         =>  "Visitor Ke-$i@gmil.com",
                "tgl_lahir"         =>  '02-02-1992',
                "alamat"          =>  "Jalan Pahlawan, Kotabaru, Yogyakarta 55194",
                "tlp"          =>  "08941231428",
                "status"          =>  "Belum",
                "image"          =>  "default.png",
            );
            $this->db->insert('tblvisitor', $data);
        }
        echo $i . ' Data Berhasil Di Insert';
    }
}
