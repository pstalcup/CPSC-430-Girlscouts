<?php
	include "db_connect.php";
	include "menu.php";

	if(isset($_SESSION['post'])) {
		$query = "";
		$_POST = $_SESSION['post'];
		unset($_SESSION['post']);
	} else {
		$query = "select productId, name AS 'pname' from products order by name;";
		$result = mysqli_query($db, $query) or die ("ERROR SELECTING");
	}
	
?>
<html>
<head>
	<title>Booth Sales</title>
</head>

<body>
<div class="content">

<h2>REGISTER A BOOTH SALE</h2>
<form name="boothSale" action="boothSalesController.php" method="POST">
<table>
<tr>

	<td>Date </td>
	<td>
		<input type="text" name="day" size=1 maxlength=2 />/
		<input type="text" name="month" size=1 maxlength=2 />/
		<input type="text" name="year" size=1 maxlength=2 /> (dd/mm/yy)

	</td>
</tr>
<tr><td>Location</td>
	<td>
		<input type = "text" name ="location" />
	</td>
</tr>

	<th>Product</th><th>Quantity</th>
	
	<?php
	
	while($row = mysqli_fetch_array($result)) {
	$pname = $row['pname'];
	$quantity = "<input type=text name='$qtyid' />";
	
	echo "<tr><td>$pname  </td><td>$quantity </td></tr>\n";
	
	}
	?>
	
</table>
<br />

<h2>ATTENDED:</H2>
<table>
	<?php
	
	$query = "SELECT * FROM attending ;";
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

	?>	

</table>
<br />
<input type="submit" value="Submit Booth Sale" />
</form>

</div>
</body>
</html>
