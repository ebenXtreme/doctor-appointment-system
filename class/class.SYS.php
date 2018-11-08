<?php


	require "class.db.php";
	
	class Sys
	{
    private $db;
    private $database_type = 'mysql';
		private $database_host = 'localhost';
    private $database_username = 'root';
    private $database_password = '';
    private $database_name = 'appSystem';
		private $conn_status = null;

    function __construct()
    {
        $this->db = new PDODb($this->database_type, $this->database_host, $this->database_username, $this->database_password, $this->database_name);
	    $this->conn_status = ($this->db) ? true : false;
	    $this->is_conn();
    }
		
		public function is_conn()
    {
	    if ($this->conn_status == false) {
		    return false;
	    } else {
		    return true;
	    }
	
    }
	
		public function canLogin($username, $password)
		{
			try {
				$this->db->where('patient_email', $username);
				$this->db->where('patient_password', $password);
				$user = $this->db->get('login');
				$canLogin = ($user) ? true : false;
				return $user;
			} catch (Exception $ex) {
				$ex = $this->db->getLastError();
				return $ex;
			}
			
		}
		public function isLoggedIn() {
    	return ((isset($_SESSION['logged_in']))&&($_SESSION['logged_in']==true))? true: false;
		}
		public function logout() {
    	session_unset();
    	return session_destroy();
		}
}