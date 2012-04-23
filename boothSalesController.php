<?php
	
include "db_connect.php";
$requires = "admin";
include "menu.php";	



	$total = 0;
	
	



	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
	foreach($_GET as $key => $value)
	{
		$$key = $value;
	}
	$date = "20".$year."-".$month."-".$day;
	$time = time();
	$location = $location;

	//enter booth sale into event based on date
	$query ="INTO events (dateOfEvent,timeOfEvent,name,description,location) VALUES ('$date','$time','$name','$description','$location');";


?>
