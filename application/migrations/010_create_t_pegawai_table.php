<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_t_pegawai_table extends CI_Migration
{
    public function up()
    {
        // Define the fields for the table
        $this->dbforge->add_field(array(
            'ID_PEGAWAI' => array(
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => FALSE,
                'PRIMARY KEY' => TRUE,
            ),
            'NM_PEGAWAI' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'ALAMAT' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'EMAIL' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'NO_HANDPHONE' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => TRUE,
            ),
        ));

        // Add primary key to the table
        $this->dbforge->add_key('ID_PEGAWAI', TRUE);

        // Create the table
        $this->dbforge->create_table('t_pegawai');
    }

    public function down()
    {
        // Drop the table if rolling back
        $this->dbforge->drop_table('t_pegawai');
    }
}
