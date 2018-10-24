<?php
session_start();
include "class.DB.php";
class Sys{
    private $db;
    private $database_type = 'mysql';
    private $database_host = 'localhost:90';
    private $database_username = 'root';
    private $database_password = '';
    private $database_name = 'appSystem';
	private $EXPIRE_AFTER = 5;

    function __construct()
    {
        $this->db = new PDODb($this->database_type, $this->database_host, $this->database_username, $this->database_password, $this->database_name);
        define('BASE_URL', 'http://localhost/schedulesys');
        define('ADMIN_BASE_URL', 'http://localhost/schedulesys/admin/');
    }
    public function Login($username, $password)
    {
        echo "im here";exit;
        $this->db->where('patient_email', $username);
        $this->db->where('password', $password);
        $this->db->get('login');
        $results = $this->db->getRowCount();
        print_r($results);exit;
        return $results;
    }
    public function test() {
        $this->db->where('patient_email', 'oswaldo63@example.net');
        return $this->db->get('login');
    }

}