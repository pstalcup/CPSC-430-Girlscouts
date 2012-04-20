<?php
	session_start();
	include "db_connect.php";
	
	/*
	if(isset($_POST['loop'])) {
		$_SESSION['post'] = $_POST;
		header("Location: products.php");
		exit("");
	} //bounce unsaved changes back to products.php
	*/
	$rows = 1;
	while(isset($_POST["user".$rows])) {
		$user = $_POST["user".$rows];
		$name = $_POST["name".$rows];
		if(($_POST["qty".$rows] != "") and ($_POST["qty".$rows] != "0")) {
			$quantity = floor($_POST["qty".$rows]);
		} else { $quantity = 0; }
		echo $name."<br/>";

		if(($user != "") and ($name != "") and ($quantity != 0)){ 
			$query = "insert into sales values ($tID,$quantity,$productID,$user);";
			mysqli_query($db, $query) or die ("ERROR INSERTING");
			$query = "insert into transactions values ($tID,$girlID);";
			mysqli_query($db, $query) or die ("ERROR INSERTING");
		}
		
		$rows++;
	}
	
	echo "<br/><a href=\"registerSale.php\">Continue</a>";
	//header("Location: registerSale.php");
	exit("");
?>
