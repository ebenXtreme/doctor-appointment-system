<?php
	/**
	 * Created by PhpStorm.
	 * User: JUVINEL
	 * Date: 10/24/2018
	 * Time: 21:09
	 */
	
	require "../includes/config.inc";
	
	$var = $app;

// $user = $var->login("sdh", "afkj");
// print_r($user);
	
//	$user = $var->canLogin("mklocko@example.org", "91d9033ff655a33ec488aa4c38c591cc");
//	print_r($user);
	session_start();
	var_dump(session_status());
	$_SESSION['logged_in'] = true;
	print_r($_SESSION);
	session_unset();
	print_r($_SESSION);
	session_destroy();
	var_dump(session_status());