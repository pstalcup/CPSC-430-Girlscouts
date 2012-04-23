<?php
	$total = 0;

	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
	foreach($_POST as $key => $value)
	{
		$key = $value;
	}
	
	$year = $_POST["year"];
	$month = $_POST["month"];
	$day = $_POST["day"];
	
	$date = "20".$year."-".$month."-".$day;
	//this time is just to enter a random time
	$time = date();
	$name = "Booth Sale";
	$description = "Booth Sale";
	$location = $_POST["location"];

	//enter booth sale into event based on date to help admin keep track of location and date of booth sale
	$query ="INSERT INTO events (dateOfEvent,timeOfEvent,name,description,location) VALUES ('$date','$time','$name','$description','$location');";
	mysqli_query($db,$query);
	Header("Location: main.php");

	
	//Add sales


?>
