<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_content extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'judul' => array(
                'type' => 'VARCHAR',
                'constraint' => '32'
            ),
            'konten' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tblcontent');
    }

    public function down()
    {
        $this->dbforge->drop_table('tblcontent');
    }
}
