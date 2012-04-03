<?php
	include "db_connect.php";
	$needsadmin = true;	
	include "loggedIn.php";
	$gdd = "<option name='blank'>-</option>";
	
	$query = "SELECT id, firstName, lastName FROM girls;";
	$result = mysqli_query($db,$query);
	while($row = mysqli_fetch_array($result))
	{
		$name = $row["firstName"] . " " . $row["lastName"];
		$id = $row["id"];
		$gdd .= "<option name='$id'>$name</option>";
	}
	
	$query = "SELECT email,daughter FROM requests;";
	$result = mysqli_query($db,$query);
	echo $query;
?>
	<form action="approveController.php" method=get>
<?php
	echo "<table>";
	while($row = mysqli_fetch_array($result))
	{
		$email = $row["email"];
		$name = $row["daughter"];
		echo "<tr>";
		echo "<td>$email</td><td>$name</td><td><select name='$email'>$gdd</select>";	
	}
?>
	<input type=submit value="Approve Girl">
	</form>
