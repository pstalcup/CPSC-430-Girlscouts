<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
?>
<html>
<head>
	<title>Approve Accounts</title>
</head>
<body>

<?php
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
	//echo $query;
?>
<div class = "content">

<h2>Approve Requests</h2>
<form action="approveController.php" method="POST">
<table>
<?php
	$num = 1;
	while($row = mysqli_fetch_array($result))
	{
		$email = $row["email"];
		$name = $row["daughter"];
		echo "<tr><td>$email</td><td>$name</td><td><select name=\"girl".$num."\">$gdd</select></td></tr>";
		echo "<input type=\"hidden\" name=\"user".$num."\" />";
		$num++;
	}
?>
</table>
<input type=submit value="Approve">
</form>

</div>
</body>
</html>
