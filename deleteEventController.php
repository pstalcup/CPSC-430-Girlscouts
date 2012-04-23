<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
	
	foreach($_GET as $key => $value)
	{
		$query = "DELETE FROM events WHERE eventId='$key'";
		echo $query;
		mysqli_query($db,$query);
	}
	header("Location: main.php");	
?>
