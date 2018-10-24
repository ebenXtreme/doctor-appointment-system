<?php

include "../includes/config.inc";

$login_error_message = '';
$register_error_message = '';

// check Login request
if (isset($_POST['btnLogin'])) {

    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($username == "") {
        $login_error_message = 'Username field is required!';
    } else if ($password == "") {
        $login_error_message = 'Password field is required!';
    } else {
        $app->test();
    }
}