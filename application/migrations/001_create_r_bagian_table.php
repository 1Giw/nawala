<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_r_bagian_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'ID_BAGIAN' => array(
                'type' => 'SERIAL',
                'auto_increment' => TRUE,
                'PRIMARY KEY' => TRUE,
            ),
            'NM_BAGIAN' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('ID_BAGIAN', TRUE);
        $this->dbforge->create_table('r_bagian');
    }

    public function down()
    {
        $this->dbforge->drop_table('r_bagian');
    }
}
