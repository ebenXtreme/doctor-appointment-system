<?php

	require "./includes/config.inc";
	$app;
$page = '';
if (!$app->isLoggedIn()) {
	print_r($app->isLoggedIn());
    include "./user/login.html";
} else {
    include "./includes/header.php";
    if(isset($_GET['p'])){
        $page = $_GET['p'];

        if($page == 'dashboard'){
            include('./includes/dashboard.html');
        } elseif ($page == 'appointment') {
            include('./includes/appointment.html');
        } elseif ($page == 'profile') {
            include('./includes/profile.html');
        } elseif ($page == 'new-appointment') {
            include('./includes/addApp.html');
        } elseif ($page == 'schedule') {
            include('./includes/schedule.html');
        }
    }

    include "./includes/footer.html";

}











?>