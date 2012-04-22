<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
	
	//print_r($_POST);

	$num = 1;
	while(isset($_POST['user'.$num])) {
		if($_POST['girl'] != "-") {
			$user = $_POST['user'.$num];
			$girl = $_POST['girl'.$num];
			$query = "UPDATE users SET girlId=(SELECT girlId from girls where CONCAT(firstName,' ',lastName) = '$girl') where email='$user';";
			mysqli_query($db,$query) or die ("error updating");
			$query = "delete from requests where email='$user';";
			mysqli_query($db,$query) or die ("error deleting");
		}
		$num++;
	}
	
	//header("Location: approve.php");
?>
