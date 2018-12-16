<?php

include '../includes/config.inc';

$date = $_POST['date'];
$day = $_POST['day'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$available = $_POST['available'];



if ($app->addSchedule($date, $day, $start_time, $end_time, $available)) {
    echo "Schedule Added Sucessfully";
} else {
    echo "A simple error occurred, please try again";
}

/*

// $sql = "SELECT DISTINCT((*))FROM sys_daily";
// $sql = "SELECT * FROM sys_daily JOIN (SELECT DISTINCT(date) FROM sys_daily)";
// $sql = "select distinct on date * from sys_daily";
$sql = "select * from sys_daily group by date";
$allSchedule = $app->getRaw($sql);
// print_r($allSchedule);

foreach ($allSchedule as $key) {
    print_r($key); echo "<br><br>";
}	
	
*/

//var_dump($allSchedule);
