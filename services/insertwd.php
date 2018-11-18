<?php
include '../includes/config.inc';

$type = $_POST['type'];
$on_days = $_POST['online_days'];

if ($app->addWorkingDay($type, $on_days)) {
    echo "Success Inserting Days";
} else {
    echo "Some error occurred!";
}