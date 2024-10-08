<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Log_user_model extends CI_Model
{
    private $_table = "t_log_user";

    function get_client_ip() {
        $ipaddress = '';
        
        // Cek berbagai header untuk IP
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } elseif (!empty($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'IP tidak dikenali';
        }
    
        // Jika terdapat banyak IP, ambil IP pertama (dalam kasus header seperti X-Forwarded-For)
        if (strpos($ipaddress, ',') !== false) {
            $ipaddress = explode(',', $ipaddress)[0];
        }
    
        return $ipaddress;
    }
    

    public function getAll()
    {
        $this->db->order_by('ID_LOG', 'DESC');
        return $this->db->get($this->_table)->result();
    }

    public function login_sukses($username)
    {
        $this->USERNAME = $username;
        $this->IP_ADDRESS = $this->get_client_ip();
        $this->STATUS = "Login sukses";
        $this->db->insert($this->_table, $this);
    }

    public function login_gagal($username)
    {
        $this->USERNAME = $username;
        $this->IP_ADDRESS = $this->get_client_ip();
        $this->STATUS = "Login gagal";
        $this->db->insert($this->_table, $this);
    }

    public function logout_user($username)
    {
        $this->USERNAME = $username;
        $this->IP_ADDRESS = $this->get_client_ip();
        $this->STATUS = "Berhasil logout";
        $this->db->insert($this->_table, $this);
    }
}
