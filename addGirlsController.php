<?php 
include "db_connect.php";
$needsadmin = true;
include "loggedIn.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Add Girl</title>
  
</head>

<body>

<?php


	$firstName = mysqli_real_escape_string($db, trim($_GET['firstName']));
	$lastName = mysqli_real_escape_string($db, trim($_GET['lastName']));
	$DOB = mysqli_real_escape_string($db, trim($_GET['DOB']));
	$address = mysqli_real_escape_string($db, trim($_GET['address']));
	$city = mysqli_real_escape_string($db, trim($_GET['city']));
	$st = mysqli_real_escape_string($db, trim($_GET['st']));
	$zip = mysqli_real_escape_string($db, trim($_GET['zip']));
  
	$query = "INSERT INTO girls (firstName, lastName, DOB, address, city, st, zip) VALUES ($firstName, $lastName, $DOB, $address, $city, $st, $zip);"
  

?>



</body>
</html>
