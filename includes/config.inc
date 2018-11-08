<?php
	
	
	
	$filename = "./class/class.SYS.php";
	$newFilename = "../class/class.SYS.php";
	if (file_exists($filename)) {
		require $filename;
	} else  {
		require $newFilename;
	}
	$app = new Sys();
