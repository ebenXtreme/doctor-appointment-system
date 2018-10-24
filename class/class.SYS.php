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
        $this->db->;
        $this.db->where ('patient_email', $username);
$db->having ('password', $password);
$results = $db->get('login');
return $results;
    }

}