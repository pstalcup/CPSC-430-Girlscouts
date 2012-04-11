<?php
	include "db_connect.php";
	$needsadmin = true;
	include "loggedIn.php";
	
	print_r($_GET);

	foreach($_GET as $key => $val)
	{
		if($val != "-")
		{
			echo $key." ".$val."</br>";
			$query = "UPDATE users SET girlId=(SELECT girlId from girls where CONCAT(firstName,' ',lastName) = '$val') where email='$key';";
			echo $query;
			mysqli_query($db,$query);
			$query = "DELETE * FROM requests WHERE email='$key';";
			mysqli_query($db,$query);
		}
	}
	
	#Header("Location: approve.php");
?>
