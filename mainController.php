<?php
	include "db_connect.php";
	include "menu.php";
	
	$query = "DELETE FROM attending WHERE girlId = (SELECT girlId FROM users WHERE email='$e');";
	echo $query."</br>";
	mysqli_query($db,$query);
	foreach($_GET as $key => $value)
	{
		$query = "INSERT INTO attending (eventId, girlId) VALUES ('$key',(SELECT girlId FROM users WHERE email='$e'));";
		echo $query."<br>";	
		mysqli_query($db,$query);
	}
	Header("Location: main.php");
?>
