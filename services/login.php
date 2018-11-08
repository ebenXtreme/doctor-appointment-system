<?php

include "../includes/config.inc";
	$app;

$login_error_message = '';

// check Login request
if (isset($_POST['btnLogin'])) {

    $username = trim($_POST['email']);
    $password = trim($_POST['password']);
	
	if ($app->canLogin($username, $password)) {
		$_SESSION['logged_in'] = true;
		header("Location: ../index.php");
    } else {
		$login_error_message = "Username or password incorrect";
		echo $login_error_message;
    }
}
