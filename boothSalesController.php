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
	
	//Add Girls

	$query = "SELECT * FROM attending WHERE girlId = (SELECT girlId FROM users WHERE email='$e');";
	$attending = Array();
	$result = mysqli_query($db,$query);
	while($row = mysqli_fetch_array($result))
	{
		$attending[] = $row["eventId"];
	}
	$query = "SELECT name,description,DATE_FORMAT(dateOfEvent,'%m/%d') as dateOfEvent,TIME_FORMAT(timeOfEvent,'%l:%i') as timeOfEvent,eventId FROM events WHERE name <>'Booth Sale' AND DATEDIFF(dateOfEvent,CURRENT_DATE()) > 0;";
	$result = mysqli_query($db,$query);
	echo "<form action='mainController.php'>";
	echo "<table>";
	$row = Array("name" => "<b>Name</b>","description"=>"<b>Description</b>","attending"=>"Attend?", "dateOfEvent"=>"<b>Date</b>", "timeOfEvent"=>"<b>Time</b>");
	do
	{
		echo "<tr>";
		echo "<td>".$row["name"]."</td>";
		echo "<td>".$row["description"]."</td>";
		echo "<td>".$row["dateOfEvent"]."&nbsp;</td>";
		echo "<td>".$row["timeOfEvent"]."</td>";
		if($row["attending"] != "")
		{
			echo "<td>".$row["attending"]."</td>";
		}
		else
		{
			$eid = $row["eventId"];
			echo "<td>";
			echo "<input type='checkbox' name='$eid'";
			if(in_array($row["eventId"],$attending))
			{
				echo "checked";
			}
			echo ">";
			echo "</td>";
		}
		echo "</tr>";
	}
	while($row = mysqli_fetch_array($result));
	
	$attendees++;

	}
	
	Header("Location: main.php");

?>
