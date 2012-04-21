<?php
	session_start();
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";

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
		
		if($id != "") {
			if($name != "") {
				$query = "update products set name='$name', price='$price', description = '$desc', quantity ='$quantity', types='$type' where productId = $id;";
				mysqli_query($db, $query) or die ("ERROR UPDATING");
			} else {
				$query = "delete from products where productId = ".$id.";";
				mysqli_query($db, $query) or die ("ERROR DELETING");
			}
		} else {
			if($name != "") { 
			$query = "insert into products values (null,'$type','$name',$price,'$desc',$quantity);";
			mysqli_query($db, $query) or die ("ERROR INSERTING");
			}
		}
		
		$rows++;
	}
	
	//echo "<br/><a href=\"products.php\">Continue</a>";
	header("Location: products.php");
	exit("");
?>
