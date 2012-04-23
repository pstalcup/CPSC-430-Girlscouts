<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
?>
<html>
<head>
	<title>View Attendees</title>
</head>
<body>
<?php
	echo '<div class="content">';
	echo '<h2>View Event Attendees</h2>';

	echo "<table cellpadding=\"5\"";
	echo '<tr><th>Event</th><th>Date</th><th>Time</th><th>Attending</th></tr>';
	$query = "SELECT name,description,DATE_FORMAT(dateOfEvent,'%m/%d') as dateOfEvent,TIME_FORMAT(timeOfEvent,'%l:%i') as timeOfEvent,eventId FROM events WHERE name <> 'Booth Sale' AND DATEDIFF(dateOfEvent,CURRENT_DATE()) > 0;";
	$events = mysqli_query($db,$query);
	while($row = mysqli_fetch_array($events)) {
		echo "<tr><td>".$row["name"]."</td>";
		echo "<td>".$row["dateOfEvent"]."&nbsp;</td>";
		echo "<td>".$row["timeOfEvent"]."</td>";	
		$eid = $row['eventId'];
		$query = "SELECT g.firstName,g.lastName FROM attending a INNER JOIN girls g ON g.girlId = a.girlId WHERE a.eventId='$eid' order by g.lastName";
		$rs = mysqli_query($db,$query);
		echo "<td>";
		while($r = mysqli_fetch_array($rs)) {
			echo $r['firstName']." ".$r['lastName']."<br/>";
		}
		echo "</td></tr>";
	}
	echo "</table>";

?>
</div>
</body>
</html>
