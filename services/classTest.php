<?php
	/**
	 * Created by PhpStorm.
	 * User: JUVINEL
	 * Date: 10/24/2018
	 * Time: 21:09
	 */
	
	require "../includes/config.inc";
	
	$app;
	$email = 'diamondA@gm.co';
	$pass = '454845';
	// $as = $app->addDoctor('Afia', $email, '0576075853', 'accra, that streett', '1', '2');
	// $userID = $app->getLastInsertID();
	// if($app->addLoginDetails($userID, $email, $pass)) {
	// 	echo 'sucess inserting';
	// } else {
	// 	echo 'error inserting!';
	// }

	$specialty = $app->getSpecialty();