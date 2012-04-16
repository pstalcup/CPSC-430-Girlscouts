<?php
	session_start();
	include "db_connect.php";
	

	if(isset($_POST['loop'])) {
		$_SESSION['post'] = $_POST;
		header("Location: products.php");
		exit("");
	} //bounce unsaved changes back to products.php

	$rows = 1;
	while(isset($_POST["name".$rows])) {
		$id = $_POST["id".$rows];
		$name = $_POST["name".$rows];
		if($_POST["price".$rows] != "") {
			$price = $_POST["price".$rows];
		} else { $price = "0"; }
		$type = $_POST["type".$rows];
		$desc = $_POST["desc".$rows];
		$quantity = 10;
		
		if($id != "") { //tracks whether entry exists in database
			$query = "delete from products where productId = ".$id.";";
			mysqli_query($db, $query) or die ("ERROR DELETING");
		}
		if($name != "") { //determines whether to add or remove entry
			$query = "insert into products values (null,'$type','$name',$price,'$desc',$quantity);";
			mysqli_query($db, $query) or die ("ERROR INSERTING");
		}
		//if id and name are set, update entry. if only id, delete. if only name, insert. if neither, it's a blank row - do nothing.
		
		$rows++;
	}
	
	//echo "<br/><a href=\"products.php\">Continue</a>";
	header("Location: products.php");
	exit("");
?>
