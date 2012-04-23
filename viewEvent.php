<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
	
	echo '<div class="content">';
	$query = "SELECT name,description,DATE_FORMAT(dateOfEvent,'%m/%d') as dateOfEvent,TIME_FORMAT(timeOfEvent,'%l:%i') as timeOfEvent,eventId FROM events WHERE DATEDIFF(dateOfEvent,CURRENT_DATE()) > 0;";
	$result = mysqli_query($db,$query);
	echo "<form action='deleteEventController.php'>";
	$row = Array("name" => "<b>Name</b>","description"=>"<b>Description</b>","attending"=>"Delete?", "dateOfEvent"=>"<b>Date</b>", "timeOfEvent"=>"<b>Time</b>");
	echo "<table>";
	do
	{
		$eid = $row["eventId"];
		echo "<tr>";
		echo "<td>".$row["name"]."</td>";
		echo "<td>".$row["description"]."</td>";
		echo "<td>".$row["dateOfEvent"]."&nbsp;</td>";
		echo "<td>".$row["timeOfEvent"]."</td>";	
		echo "</tr>";
		$query = "SELECT g.firstName,g.lastName FROM attending a INNER JOIN girls g ON g.girlId = a.girlId WHERE a.eventId='$eid'";
		#echo $query;
		$rs = mysqli_query($db,$query);
		while($r = mysqli_fetch_array($rs))
		{
			echo "<tr><td></td><td>".$r["firstName"]." ".$r["lastName"]."</td></tr>";	
		}
	}
	while($row = mysqli_fetch_array($result));
	echo "</table>";
	echo "<input type=submit value='Delete'>";
	echo "</form>";

?>
