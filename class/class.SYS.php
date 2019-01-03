<?php


	require "class.db.php";
	
	class Sys
	{
    private $db;
    private $database_type = 'mysql';
    private $database_host = 'localhost';
    private $database_username = 'root';
    private $database_password = '';
    private $database_name = 'schedulesys';
		private $conn_status = null;
		private $currentUser;

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
			
				$this->db->where('d_email', $username);
				$this->db->where('d_password', $password);
				$user = $this->db->get('sys_d_login');
				$canLogin = ($user) ? true : false;
				if ($canLogin == true) {
					$_SESSION['logged_in'] = true;
					$_SESSION['user'] = $user;
					$this->currentUser = $_SESSION['user'];
				}
				return $canLogin;
			
			
		}
		public function isLoggedIn() {
    	return ((isset($_SESSION['logged_in']))&&($_SESSION['logged_in']==true))? true: false;
		}
		public function logout() {
    	session_unset();
    	return session_destroy();
		}
		public function addDoctor ($name, $email, $phone, $address, $specialty, $workingDays) {
			$insertData = [
				'displayName' => $name,
				'specialty_id' => $specialty,
				'phone' => $phone,
				'email'=> $email,
				'address' =>$address,
				'working_time_id' =>$workingDays
			];
			if($this->db->insert('sys_doctor', $insertData)) {
				return true;
			} else {
				return false;
			}
		}
		public function getLastInsertID()
		{
			return $this->db->getLastInsertID();
		}
		public function addLoginDetails($id, $email, $password)
		{
			$insertData = [
				'd_id' => $id,
				'd_email' => $email,
				'd_password' => $password
			];
			if($this->db->insert('sys_d_login', $insertData)) {
				return true;
			} else {
				return false;
			}
		}
		public function addSpecialty($name)
		{
			$insertData = ['type' => $name];
			if($this->db->insert('sys_specialty', $insertData)) {
				return true;
			} else {
				return false;
			}
		}
		public function getSpecialty()
		{
			return $this->db->get('sys_specialty');
		}
		public function getWD()
		{
			return $this->db->get('sys_working_time');
		}
		public function addWorkingTime($type, $online_days)
		{
			$insertData = [
				'work_type' => $type,
				'online_days' => $online_days
			];
			if($this->db->insert('sys_working_time', $insertData)) {
				return true;
			} else {
				return false;
			}
		}
		public function addSchedule($date, $day, $start_time, $end_time, $available)
		{
			$insertData = [
				'date' => $date,
				'day' => $day,
				'start_time' => $start_time,
				'end_time' => $end_time,
				'available' => $available,
				'd_id' => $this->getCurrentUser()[0]['d_id']
			];
			if ($this->db->insert('sys_daily', $insertData)) {
				return true;
			} else {
				return $this->db->getLastError();
			}
		}
		public function getCurrentUser()
		{
			$cu = $_SESSION['user'];
			return $cu;
		}
		
		public function getCurrentUserDetail()
		{
			$cu = $this->getCurrentUser()[0]['d_id'];
			$this->db->where('id', $cu);
			return $this->db->get('sys_doctor');
		}
		
		public function getSchedule()
		{
			return $this->db->get('sys_daily');
		}
		
		public function getCurrentUserShift()
		{
			$user = $this->getCurrentUserDetail();
			$shift = $user[0]['working_time_id'];
			$this->db->where('id', $shift);
			return $this->db->get('sys_working_time');
		}
		public function getCustomValue($table, $condition, $conditionValue)
		{
			$this->db->where($condition, $conditionValue);
			return $this->db->get($table);
		}
		public function getRaw($sql)
		{
			return $this->db->rawQuery($sql);
		}
		public function loadSchedule()
		{
			return $this->db->get('sys_daily');
		}
}
//0501595249
//nkesia