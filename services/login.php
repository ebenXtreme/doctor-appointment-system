<?php

include "../class/class.SYS.php";
$app = new Sys();

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
        $user_id = $app->Login($username, $password); // check user login
        if($user_id > 0)
        {
            echo "logining in...";exit;
            $_SESSION['user_id'] = $user_id; // Set Session
            header("Location: ../index.php"); // Redirect user to the profile.php
        }
        else
        {
            echo "exiting in...";exit;

            $login_error_message = 'Invalid login details!';
        }
    }
}