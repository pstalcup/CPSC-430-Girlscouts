<?php 
include "db_connect.php";
$needsadmin = true;
include "loggedIn.php";

	$firstName = trim($_GET['firstName']);
	$lastName = trim($_GET['lastName']);
	$DOB = trim($_GET['DOB']);
	$address = trim($_GET['address']);
	$city = trim($_GET['city']);
	$st = $_GET['st']);
	$zip = trim($_GET['zip']);
  
	$query = "INSERT INTO events (dateOfEvent,timeOfEvent,name,description,location) VALUES ('$date','$time','$name','$description','$location');";
	echo $query;
	mysqli_query($db,$query);
	Header("Location: main.php");

?>