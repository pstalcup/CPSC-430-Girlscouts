<?php
	session_start();
	//include "loggedIn.php";
	include "db_connect.php";
	
	$rows = 1;
	while(isset($_POST["name".$rows])) {
		if($_POST["name".$rows] != "") {
			$name = $_POST["name".$rows];
			$price = $_POST["price".$rows];
			$type = $_POST["type".$rows];
			$desc = $_POST["desc".$rows];
			$quantity = 10;
			
			//$query = "update products set productid=null, types'$type','$name',$price,'$desc',$quantity);";
			$query = "replace into products ('types','name','price','description','quantity') values ('$type','$name',$price,'$desc',$quantity);";
			$result = mysqli_query($db, $query) or die ("ERROR INSERTING");

			echo $query."<br/>";
		}
		$rows++;
	}
	
	echo "<br/><a href=\"products.php\">Continue</a>";
	//header("Location: products.php");
	exit("");
?>
