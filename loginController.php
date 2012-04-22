<?php
	include "db_connect.php";

	$email = $_POST["email"];
	$password = $_POST["password"];

	$query = "SELECT * FROM requests WHERE email='$email'";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_array($result);
	if(!$row) {
		$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_array($result);
		if($row) {
			$fn = $row["firstName"];
			$ln = $row["lastName"];
			$name = $fn . " " . $ln;
			if($fn == "admin")
			{
				$name = "admin";
			}
			$_SESSION["email"] = $row["email"];
			$_SESSION["user"] = $name;
			header("Location: main.php");
			exit("");
		}
	}
	header("Location: login.php?fail=1");
?>
