<?php
	session_start();
	$db = mysqli_connect('localhost','imartin2','twty1224','S12-cpsc430G3') or die("DB Connection Error");
	if (mysqli_connect_errno()) {
    		printf("Connect failed: %s\n", mysqli_connect_error());
    		exit();
	}
	if($_SERVER["SCRIPT_FILENAME"]==__FILE__)
	{
		echo "DB Successfully Loaded";
	}

?>
