<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
	$error = "?";
	$firstName = "";
	$lastName = "";
	$DOB = "";
	$address = "";
	$street = "";
	$city = "";
	$state = "VA";
	$zip = "";
	
	if($_POST["firstName"] != ""){ $firstName = $_POST["firstName"];
	}else { $error .= "firstName&";}
	
	if($_POST["lastName"] != ""){$lastName = $_POST["lastName"];
	}else { $error .= "lastName&";}

	if($_POST["address"]!=""){ $address = $_POST["address"];
	}else { $error .= "address&";}
	
	
	if($_POST["city"] !=""){$city = $_POST["city"];
	}else{$error .= "city&";}
	
	if($_POST["st"] !=""){$state = $_POST["st"];
	}else{$error .= "st&";}
	
	if($_POST["zip"] != ""){$zip = $_POST["zip"];
	}else{$error .= "zip&";}
	
	if($_POST["DOB"] !=""){$DOB = $_POST["DOB"];
	}else{$error .= "DOB";}


	if($error != "?"){ 
		header("Location: addGirls.php".$error);
	}else {
		$query = "INSERT INTO girls (firstName,lastName,DOB,address,city, st,zip) VALUES ('$firstName','$lastName','$DOB','$address', '$city', '$state', '$zip');";
		mysqli_query($db, $query);
		echo $query;	
		header("Location: main.php");
	}
	?>
