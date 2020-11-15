<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_visitor extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'barcode' => array(
                'type' => 'INT',
                'constraint' => '11'
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '32'
            ),
            'tgl_lahir' => array(
                'type' => 'DATE',
            ),
            'alamat' => array(
                'type' => 'VARCHAR',
                'constraint' => '64',
            ),
            'tlp' => array(
                'type' => 'VARCHAR',
                'constraint' => '16'
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => '16'
            ),
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
                'default' => 'default.png'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tblvisitor');
    }

    public function down()
    {
        $this->dbforge->drop_table('tblvisitor');
    }
}
