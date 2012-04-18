<?php
	include "db_connect.php";
	include "loggedIn.php";
?>

<?php
	$query = "SELECT * FROM events WHERE DATEDIFF(dateOfEvent,CURRENT_DATE()) > 0;";
	$result = mysqli_query($db,$query);
	while($row = mysqli_fetch_array($result))
	{
		echo $row["name"];
	}
?>
