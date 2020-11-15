<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_user extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '32'
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '32',
            ),
            'jabatan' => array(
                'type' => 'VARCHAR',
                'constraint' => '16'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbluser');
    }

    public function down()
    {
        $this->dbforge->drop_table('tbluser');
    }
}
