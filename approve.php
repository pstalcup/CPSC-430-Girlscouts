<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
	$gdd = "<option name='blank'>-</option>";
	
	$query = "SELECT girlId, firstName, lastName FROM girls;";
	$result = mysqli_query($db,$query);
	while($row = mysqli_fetch_array($result))
	{
		$name = $row["firstName"] . " " . $row["lastName"];
		$id = $row["girlId"];
		$gdd .= "<option name='$id'>$name</option>";
		#echo $name;
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
	<input type=submit value="Approve Girl"> Change to "approve account"? the user is most often not going to be the girl.
	</form>
