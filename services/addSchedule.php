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
    echo "A simple error occoured, please try again";
}
