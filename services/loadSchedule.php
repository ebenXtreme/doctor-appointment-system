<?php 

include '../includes/config.inc';

$schedules = $app->loadSchedule();

echo json_encode($schedules);