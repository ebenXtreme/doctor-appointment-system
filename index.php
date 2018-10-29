<?php
$page = '';

if (!isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] != true)) {
    include "./user/login.html";
} else {
    include "./includes/header.php";

    if(isset($_GET['p'])){
        $page = $_GET['p'];

        if($page == 'dashboard'){
            include('./includes/dashboard.html');
        }
    }


    include "./includes/footer.html";

}











?>