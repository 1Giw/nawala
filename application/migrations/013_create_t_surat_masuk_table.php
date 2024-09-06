<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_t_surat_masuk_table extends CI_Migration
{
    public function up()
    {
        // Define the fields for the table
        $this->dbforge->add_field(array(
            'ID_SURAT_MASUK' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => FALSE,
            ),
            'ID_JENIS_SRT_MASUK' => array(
                'type' => 'INT',
                'constraint' => '5',
                'null' => FALSE,
            ),
            'KODE' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => FALSE,
            ),
            'NO_AGENDA' => array(
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => FALSE,
            ),
            'NM_PENGIRIM' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
            'NO_SURAT' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE,
            ),
            'TGL_SURAT' => array(
                'type' => 'DATE',
                'null' => FALSE,
            ),
            'TGL_DITERIMA' => array(
                'type' => 'DATE',
                'null' => FALSE,
            ),
            'ISI_SURAT' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'STATUS_SURAT' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => TRUE,
                'comment' => '0 = di arsipkan; 1 = diteruskan',
            ),
            'FILE_SURAT' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'ID_TUJUAN' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
                'default' => '',
            ),
            'USER_ID' => array(
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => TRUE,
                'default' => '',
            ),
            'TGL_PROSES' => array(
                'type' => 'TIMESTAMP'
            ),
        ));

        // Add composite primary key
        $this->dbforge->add_key(array('ID_SURAT_MASUK', 'ID_JENIS_SRT_MASUK'), TRUE);

        // Create the table
        $this->dbforge->create_table('t_surat_masuk');

        // Set default value for TGL_PROSES and ON UPDATE
        $this->db->query('ALTER TABLE t_surat_masuk ALTER COLUMN "TGL_PROSES" SET DEFAULT CURRENT_TIMESTAMP');
    }

    public function down()
    {
        // Drop the table if rolling back
        $this->dbforge->drop_table('t_surat_masuk');
    }
}
