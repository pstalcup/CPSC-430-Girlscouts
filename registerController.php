<?php
	include "db_connect.php";
	$error = "?";
	$email = ""; 
	$p1 = "";
	$p2 = "";
	$fn = "";
	$ln = "";
	$dob = "";
	$address = "";
	$street = "";
	$zip = "";
	$phone = "";
	$cell = "";
	echo "8j";
	if($_POST["email"] != "")
	{
		$email = $_POST["email"];
	}
	else 
	{
		$error .= "email&";
	}
	if($_POST["p1"] != "")
	{
		$p1 = $_POST["p1"];
	}
	else 
	{
		$error .= "p1&";
	}
	if($_POST["p2"] != "")
	{
		$p2 = $_POST["p2"];
	}
	else 
	{
		$error .= "p2&";
	}
	if($_POST["fn"] != "")
	{
		$fn = $_POST["fn"];
	}
	else 
	{
		$error .= "fn&";
	}
	if($_POST["ln"] != "")
	{
		$ln = $_POST["ln"];
	}
	else 
	{
		$error .= "ln&";
	}
	
	$dob = "";
	if(isset($_POST["year"]))
	{
		$dob .= $_POST["year"];
	}
	if(isset($_POST["month"]))
	{
		$dob .= "-".$_POST["month"];
	}
	if(isset($_POST["day"]))
	{
		$dob .= "-".$_POST["day"];
	}

	if($_POST["address"]!="")
	{
		$address = $_POST["address"];
	}
	else 
	{
		$error .= "address&";
	}
	if($_POST["street"] != "")
	{
		$street = $_POST["street"];
	}
	else 
	{
		$error .= "street&";
	}
	if($_POST["zip"] != "")
	{
		$zip = $_POST["zip"];
	}
	else
	{
		$error .= "zip&";
	}
	if($_POST["daughter"] != "")
	{
		$daughter = $_POST["daughter"];
	}
	else
	{
		$error .= "daughter&";
	}

	if($p1 != $p2) {
		$error .= "mismatch&"; //just a guess. need to catch mismatched passwords before we start inserting into the database.
	}
	
	if($error != "?")
	{
		header("Location: register.php".$error);
	}
	else 
	{
		$query = "INSERT INTO users (email,password,firstName,lastName,DOB,address,st,zip,phoneNum,cellNum) VALUES ('$email','$p1','$fn','$ln','$dob','$address','$street','$zip',0,0)";
		mysqli_query($db, $query) or die ("error inserting 1");

		$query = "INSERT INTO requests (email,daughter) VALUES ('$email','$daughter');";
		mysqli_query($db, $query) or die ("error inserting 2");

		header("Location: notApproved.php");
	}
	?>
