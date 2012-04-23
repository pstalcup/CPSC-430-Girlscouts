<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
	foreach($_GET as $key => $value)
	{
		$query = "INSERT INTO attending (eventId, girlId) VALUES ('$key',(SELECT girlId FROM users WHERE email='$e'));";
		echo $query."<br>";	
		mysqli_query($db,$query);
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
	
	//Add a new transaction and new sales

	$query = "INSERT INTO transactions (girlId) VALUES ('0');";	
	mysqli_query($db, $query);
	
	//Select max 
	$query = "SELECT MAX(TID) AS 'transId'FROM transactions;";
	$tranId = mysqli_query($db, $query);

	$total = 0;
	$attendees = 0;
	
	while(isset($_POST['pname'])){
	
	$product = $_POST['pname'];
	
	$query = "select productId from products where name = '$product';";
	$pid = mysqli_query($db,$query);
	$qty = $_POST[$quantity];
	//create new sale
	$query = "INSERT INTO sales (transactionId, quantity, productId, customer) VALUES ('$tranId', '$qty', '$pid', 'Booth Sale');";
	mysqli_query($db, $query);	

	$query = "select quantity from products where productId = '$pid';";
	$currentQty = mysqli_query($db,$query);
	//can't substract from quantity if not available in inventory
	echo "$currentQty";
	
	if($currentQty >= $qty){
		$newQty = $currentQty - $qty;
		$query = "UPDATE products SET quantity = '$newQty' WHERE productId = '$pid';";
		mysqli_query($db,$query);
	}else {
		echo "The quantity available isn't enough.";
	}
	
	$total  = $total + $qty;
	$attendees++;

	}
	
	Header("Location: main.php");

?>
