<?php
	include "db_connect.php";
	$needsadmin = true;
	include "loggedIn.php";
	
	foreach($_GET as $key => $val)
	{
		if($val != "-")
		{
			$query = "UPDATE users SET girlId=(SELECT girlId from girls where CONCAT(firstName,' ',lastName) = $val) where email=$key";
			mysqli_query($db,$query);
		}
	}
	
	Header("Location: approve.php");
?>
