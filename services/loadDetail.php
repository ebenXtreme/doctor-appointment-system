<?php
	include '../includes/config.inc';
	
	
	$val = $_GET;
	if (isset($_GET['profile_name'])) {
		$user = $app->getCurrentUserDetail();
		print_r($user[0]['displayName']);
	}
	if (isset($_GET['shift'])) {
		$shift = $app->getCurrentUserShift();
		$shift_day = $shift[0]['work_type'];
		$online_days = $shift[0]['online_days'];
		$shiftType = [
			'shift_type' => $shift_day,
			'online_days' => $online_days
		];
		echo(json_encode($shiftType));
	}

