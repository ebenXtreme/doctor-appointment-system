<?php

include '../includes/config.inc';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$specialty = $_POST['specialty'];
$working_days_id = $_POST['specialty'];
$password = $_POST['password'];

if ($app->addDoctor($name, $email, $phone, $address, $specialty, $working_days_id)) {
    if ($app->addLoginDetails($app->getLastInsertID(), $email, $password)) {
        echo "Success Inserted Doctor";
    }
} else {
    echo "Error inserting";
}