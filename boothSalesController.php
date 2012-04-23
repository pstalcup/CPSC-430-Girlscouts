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
<<<<<<< HEAD
	$name = "Booth Sale";
	$description = "Booth Sale";
	$location = $location;
=======
	$location = $location;

>>>>>>> 260f2328945d9739274ea623f300858eeeadf55a
	//enter booth sale into event based on date
	$query ="INTO events (dateOfEvent,timeOfEvent,name,description,location) VALUES ('$date','$time','$name','$description','$location');";


?>
