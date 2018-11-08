<?php
	/**
	 * Created by PhpStorm.
	 * User: JUVINEL
	 * Date: 11/05/2018
	 * Time: 03:49
	 */
	require "../includes/config.inc";
	$app;
	
	if ($app->logout()) {
		header("Location: ../index.php");
	}