<?php

include '../includes/config.inc';

$name = $_POST['name'];

if ($name != ''|| $name!=null) {
    if ($app->addSpecialty($name)) {
        echo 'inserted specialty';
    } else {
        echo "something went wrong!";
    }
}