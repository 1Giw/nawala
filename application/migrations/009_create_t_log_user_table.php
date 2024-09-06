<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_t_log_user_table extends CI_Migration
{
    public function up()
    {
        // Define the fields for the table
        $this->dbforge->add_field(array(
            'ID_LOG' => array(
                'type' => 'SERIAL',
                'null' => FALSE,
                'PRIMARY KEY' => TRUE,
            ),
            'USERNAME' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'IP_ADDRESS' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'STATUS' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'WAKTU' => array(
                'type' => 'TIMESTAMP'
            ),
        ));

        // Add primary key to the table
        $this->dbforge->add_key('ID_LOG', TRUE);

        // Create the table
        $this->dbforge->create_table('t_log_user');
        
        // Set default value for WAKTU and ON UPDATE
        $this->db->query('ALTER TABLE t_log_user ALTER COLUMN "WAKTU" SET DEFAULT CURRENT_TIMESTAMP');
    }

    public function down()
    {
        // Drop the table if rolling back
        $this->dbforge->drop_table('t_log_user');
    }
}
