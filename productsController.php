<?php
	session_start();
	include "loggedIn.php";
	include "db_connect.php";
	
	$rows = 1;
	while(isset($_POST["name".$rows])) {
		echo "ok<br/>";
		
		$rows++;
	}
/*
	if(isset($_POST['type'])) {
		$type = mysqli_real_escape_string($db, trim($_POST['type']));
	} else { $type = ""; }
	if(isset($_POST['name'])) {
		$name = mysqli_real_escape_string($db, trim($_POST['name']));
	} else { $name = ""; }
	if(isset($_POST['price'])) {
	  	$price = mysqli_real_escape_string($db, trim($_POST['price']));
	} else { $price = ""; }
	if(isset($_POST['desc'])) {
	  	$desc = mysqli_real_escape_string($db, trim($_POST['desc']));
	} else { $desc = ""; }
	if(isset($_POST['quantity'])) {
	  	$quantity = mysqli_real_escape_string($db, trim($_POST['quantity']));
	} else { $quantity = ""; }

	$query = "insert into table products ('types','name','price','description','quantity') values ($type,$name,$price,$desc,$quantity);";
	$result = mysqli_query($db, $query) or die ("ERROR INSERTING");


	header("Location: products.php");
	exit("");
*/
?>
