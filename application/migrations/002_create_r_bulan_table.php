<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_r_bulan_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'KD_BULAN' => array(
                'type' => 'CHAR',
                'constraint' => '2',
                'null' => FALSE,
            ),
            'NM_BULAN' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('KD_BULAN', TRUE);
        $this->dbforge->create_table('r_bulan');

        // Insert data
        $data = [
            ['KD_BULAN' => '01', 'NM_BULAN' => 'Januari'],
            ['KD_BULAN' => '02', 'NM_BULAN' => 'Februari'],
            ['KD_BULAN' => '03', 'NM_BULAN' => 'Maret'],
            ['KD_BULAN' => '04', 'NM_BULAN' => 'April'],
            ['KD_BULAN' => '05', 'NM_BULAN' => 'Mei'],
            ['KD_BULAN' => '06', 'NM_BULAN' => 'Juni'],
            ['KD_BULAN' => '07', 'NM_BULAN' => 'Juli'],
            ['KD_BULAN' => '08', 'NM_BULAN' => 'Agustus'],
            ['KD_BULAN' => '09', 'NM_BULAN' => 'September'],
            ['KD_BULAN' => '10', 'NM_BULAN' => 'Oktober'],
            ['KD_BULAN' => '11', 'NM_BULAN' => 'November'],
            ['KD_BULAN' => '12', 'NM_BULAN' => 'Desember'],
        ];
        $this->db->insert_batch('r_bulan', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('r_bulan');
    }
}
