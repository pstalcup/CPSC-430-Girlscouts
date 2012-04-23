<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
	
	//print_r($_POST);

	$num = 1;
	while(isset($_POST['user'.$num])) {
		if($_POST['girl'.$num] != "-") {
			$user = $_POST['user'.$num];
			$girl = $_POST['girl'.$num];
			//echo $user;
			//echo $girl;
			if($_POST['girl'.$num] != "(Delete)") {
				$query = "UPDATE users SET girlId=(SELECT girlId from girls where CONCAT(firstName,' ',lastName) = '$girl') where email='$user';";
				mysqli_query($db,$query) or die ("error updating");
			} else {
				$query = "delete from users where email='$user';";
				mysqli_query($db,$query) or die ("error deleting");
			}
			$query = "delete from requests where email='$user';";
			mysqli_query($db,$query) or die ("error deleting");
		}
		$num++;
	}
	
	header("Location: approve.php");
?>
