<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_t_user_table extends CI_Migration
{
    public function up()
    {
        // Define the fields for the table
        $this->dbforge->add_field(array(
            'USER_ID' => array(
                'type' => 'VARCHAR',
                'constraint' => '32',
                'null' => FALSE,
            ),
            'NAME' => array(
                'type' => 'VARCHAR',
                'constraint' => '32',
                'null' => FALSE,
            ),
            'EMAIL' => array(
                'type' => 'VARCHAR',
                'constraint' => '64',
                'null' => FALSE,
            ),
            'USERNAME' => array(
                'type' => 'VARCHAR',
                'constraint' => '64',
                'null' => FALSE,
            ),
            'PASSWORD' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
            ),
            'FOTO' => array(
                'type' => 'VARCHAR',
                'constraint' => '32',
                'null' => TRUE,
                'default' => '',
            ),
            'CREATED_AT' => array(
                'type' => 'TIMESTAMP'
            ),
            'LAST_LOGIN' => array(
                'type' => 'TIMESTAMP'
            ),
        ));

        // Add primary key
        $this->dbforge->add_key('USER_ID', TRUE);

        // Create the table
        $this->dbforge->create_table('t_user');

        // Set default value for CREATED_AT
        $this->db->query('ALTER TABLE t_user ALTER COLUMN "CREATED_AT" SET DEFAULT CURRENT_TIMESTAMP');

        // Insert the provided record
        $data = array(
            'USER_ID' => '6118b2a943acc2.78631959',
            'NAME' => 'Administrator',
            'EMAIL' => 'admin@mail.com',
            'USERNAME' => 'admin',
            'PASSWORD' => '$2y$10$.NT.c218iPvmXuQGD3Ei1uzoo3DXanshdEz2d3pB4Mmy5FLGaSDGi',
            'FOTO' => 'user.jpeg',
            'CREATED_AT' => '2021-08-15 06:22:33',
            'LAST_LOGIN' => '2023-04-02 07:19:40'
        );

        $this->db->insert('t_user', $data);
    }

    public function down()
    {
        // Drop the table if rolling back
        $this->dbforge->drop_table('t_user');
    }
}
