<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
	foreach($_POST as $key => $value)
	{
		$key = $value;
	}
	
	$year = $_POST["year"];
	$month = $_POST["month"];
	$day = $_POST["day"];
	
	$date = "20".$year."-".$month."-".$day;
	//this time is just to enter a random time
	$time = date();
	$name = "Booth Sale";
	$description = "Booth Sale";
	$location = $_POST["location"];

	//enter booth sale into event based on date to help admin keep track of location and date of booth sale
	$query ="INSERT INTO events (dateOfEvent,timeOfEvent,name,description,location) VALUES ('$date','$time','$name','$description','$location');";
	mysqli_query($db,$query);
	

	//Add sales
	$total = 0;
	$attendees = 0;
	
	while(isset($_POST['pname'])){
	
	$product = $_POST['pname'];
	
	$query = "select productId from products where name = '$product';";
	$pid = mysqli_query($db,$query);
	
	$qty = $_POST[$qtyid];
	/*
	$query = "select quantity from products where name = '$product';";
	$currentQty = mysqli_query($db,$query);
	//can't substract from quantity if not available in inventory
	if($currentQty > $qty){
		$newQty = $currentQty - $qty;
		$query = "UPDATE products SET quantity = '$newQty';";
		mysqli_query($db,$query);
	}else {
		echo "The quantity available isn't enough.";
	}
	
	$total + = $qty;
	$attendees += 1;
	
	*/
	}
	
	Header("Location: main.php");

?>
