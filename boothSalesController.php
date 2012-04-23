<?php
	$total = 0;

	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
	foreach($_GET as $key => $value)
	{
		$$key = $value;
	}
	
	$date = "20".$year."-".$month."-".$day;
	//this time is just to enter a random time
	$time = idate();
	$name = "Booth Sale";
	$description = "Booth Sale";
	$location = $location;

	//enter booth sale into event based on date to help admin keep track of location and date of booth sale
	$query ="INSERT INTO events (dateOfEvent,timeOfEvent,name,description,location) VALUES ('$date','$time','$name','$description','$location');";
	mysqli_query($db,$query);
	Header("Location: main.php");
	
	//Add sales


?>
