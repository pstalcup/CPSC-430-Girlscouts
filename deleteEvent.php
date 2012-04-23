<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
?>
<html>
<head>
	<title>Delete Events</title>
</head>
<body>
<?php
	echo '<div class="content">';
	
	echo "<h2>Delete Events</h2>";
	$query = "SELECT name,description,DATE_FORMAT(dateOfEvent,'%m/%d') as dateOfEvent,TIME_FORMAT(timeOfEvent,'%l:%i') as timeOfEvent,eventId FROM events WHERE DATEDIFF(dateOfEvent,CURRENT_DATE()) > 0;";
	$result = mysqli_query($db,$query);
	echo "<form action='deleteEventController.php'>";
	$row = Array("name" => "<b>Name</b>","description"=>"<b>Description</b>","attending"=>"Delete?", "dateOfEvent"=>"<b>Date</b>", "timeOfEvent"=>"<b>Time</b>");
	echo "<table>";
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
	echo "</table>";
	echo "<br/>";
	echo "<input type=submit value='Delete'>";
	echo "</form>";

?>
</div>
</body>
</html>
