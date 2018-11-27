<?php

include "../includes/config.inc";
	$app;

$message = '';

// check Login request


    $username = trim($_POST['email']);
		$password = trim($_POST['password']);

		$result = $app->canLogin($username, $password);
		echo $result;