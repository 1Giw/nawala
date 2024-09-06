<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_t_surat_keluar_table extends CI_Migration
{
    public function up()
    {
        // Define the fields for the table
        $this->dbforge->add_field(array(
            'ID_SURAT_KELUAR' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => FALSE,
                'PRIMARY KEY' => TRUE,
            ),
            'ID_JENIS_SRT_KELUAR' => array(
                'type' => 'INT',
                'constraint' => '5',
                'null' => TRUE,
            ),
            'TGL_DITERIMA' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'NO_AGENDA' => array(
                'type' => 'CHAR',
                'constraint' => '10',
                'null' => TRUE,
            ),
            'KODE' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'NO_SURAT' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'TGL_SURAT' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'ISI_SURAT' => array(
                'type' => 'TEXT',
                'null' => FALSE,
            ),
            'TUJUAN' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
                'default' => '',
            ),
            'FILE_SURAT' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'FILE_TTD' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'STATUS' => array(
                'type' => 'CHAR',
                'constraint' => '1',
                'null' => FALSE,
                'default' => '0',
                'comment' => '0 = Draft ; 1 = Approve; 2 = Release',
            ),
            'TGL_TTD' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'NM_PIMPINAN' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
                'default' => '',
            ),
            'CATATAN' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
                'default' => '',
            ),
            'USER_ID' => array(
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => TRUE,
                'default' => '',
            ),
            'TANGGAL_PROSES' => array(
                'type' => 'TIMESTAMP'
            ),
        ));

        // Add primary key to the table
        $this->dbforge->add_key('ID_SURAT_KELUAR', TRUE);

        // Create the table
        $this->dbforge->create_table('t_surat_keluar');

        // Set default value for TANGGAL_PROSES and ON UPDATE
        $this->db->query('ALTER TABLE t_surat_keluar ALTER COLUMN "TANGGAL_PROSES" SET DEFAULT CURRENT_TIMESTAMP');
    }

    public function down()
    {
        // Drop the table if rolling back
        $this->dbforge->drop_table('t_surat_keluar');
    }
}
