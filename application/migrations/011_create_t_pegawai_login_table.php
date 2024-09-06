<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_t_pegawai_login_table extends CI_Migration
{
    public function up()
    {
        // Define the fields for the table
        $this->dbforge->add_field(array(
            'ID_LOGIN' => array(
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => FALSE,
            ),
            'ID_PEGAWAI' => array(
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => FALSE,
            ),
            'USERNAME' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'PASSWORD' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
            ),
            'ID_BAGIAN' => array(
                'type' => 'INT',
                'constraint' => '5',
                'null' => FALSE,
            ),
            'AKTIF' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => FALSE,
                'default' => 1,
                'comment' => '1 = Aktif ; 0 = Tidak Aktif',
            ),
            'PIMPINAN' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => TRUE,
                'default' => 0,
                'comment' => '0 = Bukan Pimpinan ; 1 = Pimpinan',
            ),
            'DATE_CREATE' => array(
                'type' => 'TIMESTAMP'
            ),
            'LAST_LOGIN' => array(
                'type' => 'varchar',
                'constraint' => '255',
                'null' => TRUE,
            ),
        ));

        // Add composite primary key
        $this->dbforge->add_key(array('ID_LOGIN', 'ID_PEGAWAI'), TRUE);

        // Create the table
        $this->dbforge->create_table('t_pegawai_login');

        // Set default value for DATE_CREATE and ON UPDATE
        $this->db->query('ALTER TABLE t_pegawai_login ALTER COLUMN "DATE_CREATE" SET DEFAULT CURRENT_TIMESTAMP');
    }

    public function down()
    {
        // Drop the table if rolling back
        $this->dbforge->drop_table('t_pegawai_login');
    }
}
