<?php

include "../includes/config.inc";
	$app;

$message = '';

// check Login request


    $username = trim($_POST['email']);
		$password = trim($_POST['password']);

		if($app->canLogin($username, $password)) {
			echo 1;
		} else {
			echo 0;
		}