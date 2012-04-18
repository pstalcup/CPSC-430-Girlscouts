<?php
	session_start();
	$db = mysqli_connect('localhost','pstalcup', 'tip12t','S12-cpsc430G3');
	if (mysqli_connect_errno()) {
    		printf("Connect failed: %s\n", mysqli_connect_error());
    		exit();
	}
	if($_SERVER["SCRIPT_FILENAME"]==__FILE__)
	{
		echo "DB Successfully Loaded";
	}

?>
