<?php
	include "db_connect.php";
	$needsadmin = true;
	include "loggedIn.php";
	foreach($_GET as $key => $value)
	{
		$$key = $value;
	}
	$date = "20".$year."-".$month."-".$day;
	$query = "INSERT INTO events (dateOfEvent,timeOfEvent,name,description,location) VALUES ('$date','$time','$name','$description','$location');";
	echo $query;
	mysqli_query($db,$query);
	Header("Location: main.php");	
?>
