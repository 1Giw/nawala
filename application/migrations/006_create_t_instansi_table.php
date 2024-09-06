<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_t_instansi_table extends CI_Migration
{
    public function up()
    {
        // Define the fields for the table
        $this->dbforge->add_field(array(
            'ID_INSTANSI' => array(
                'type' => 'SERIAL',
                'null' => FALSE,
                'PRIMARY KEY' => TRUE,
            ),
            'NM_INSTANSI' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ),
            'ALAMAT' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ),
            'NO_TELP' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => TRUE
            ),
            'WEBSITE' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'EMAIL' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'USER_ID' => array(
                'type' => 'VARCHAR',
                'constraint' => '25',
                'null' => FALSE
            ),
            'TANGGAL_PROSES' => array(
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ),
        ));

        // Add primary key to the table
        $this->dbforge->add_key('ID_INSTANSI', TRUE);

        // Create the table
        $this->dbforge->create_table('t_instansi');

        // Set default value for TANGGAL_PROSES
        $this->db->query('ALTER TABLE t_instansi ALTER COLUMN "TANGGAL_PROSES" SET DEFAULT CURRENT_TIMESTAMP');

        // Insert initial data into the table
        $data = array(
            'ID_INSTANSI' => 1,
            'NM_INSTANSI' => 'SMA Muhammadiyah 1 Yogyakarta',
            'ALAMAT' => 'Jl. Gotongroyong II Petinggen Karangwaru Tegalrejo Yogyakarta',
            'NO_TELP' => '0274-563739',
            'WEBSITE' => 'http://www.smumuhi-yog.sch.id',
            'EMAIL' => 'info@smumuhi-yog.sch.id',
            'USER_ID' => '6118b2a943acc2.78631959',
            'TANGGAL_PROSES' => '2023-04-02 12:20:39'
        );

        // Insert the data using CodeIgniter's query builder
        $this->db->insert('t_instansi', $data);
    }

    public function down()
    {
        // Drop the table if rolling back
        $this->dbforge->drop_table('t_instansi');
    }
}
