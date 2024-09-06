<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_r_jenis_srt_masuk_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'ID_JENIS_SRT_MASUK' => array(
                'type' => 'SERIAL',
                'auto_increment' => TRUE,
                'PRIMARY KEY' => TRUE,
            ),
            'NM_JENIS_SRT_MASUK' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('ID_JENIS_SRT_MASUK', TRUE);
        $this->dbforge->create_table('r_jenis_srt_masuk');
    }

    public function down()
    {
        $this->dbforge->drop_table('r_jenis_srt_masuk');
    }
}
