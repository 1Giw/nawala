<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_t_disposisi_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'ID_DISPOSISI' => array(
                'type' => 'SERIAL',
                'auto_increment' => TRUE,
                'PRIMARY KEY' => TRUE,
            ),
            'ID_SURAT_MASUK' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => FALSE,
            ),
            'STATUS' => array(
                'type' => 'INT',
                'constraint' => 1,
                'null' => FALSE,
                'comment' => '1= biasa; 2=penting; 3 = rahasia',
            ),
            'NOMOR_SURAT' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'TANGGAL_SELESAI' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'TANGGAL_DISPOSISI' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'PERIHAL' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'ASAL' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'ID_PENERIMA' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'default' => '',
            ),
            'ID_PEMBERI' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'default' => '',
            ),
            'INSTRUKSI' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'CATATAN' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'IS_READ' => array(
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
                'comment' => '0 = belum ; 1=sudah',
            ),
            'USER_ID' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => '',
            ),
            'TANGGAL_PROSES' => array(
                'type' => 'TIMESTAMP',
            ),
        ));
        $this->dbforge->add_key('ID_DISPOSISI', TRUE);
        $this->dbforge->create_table('t_disposisi');
        $this->db->query('ALTER TABLE t_disposisi ALTER COLUMN "TANGGAL_PROSES" SET DEFAULT CURRENT_TIMESTAMP');
    }

    public function down()
    {
        $this->dbforge->drop_table('t_disposisi');
    }
}
