<?php
	include "db_connect.php";
	include "menu.php";
?>
<h2>Patches & Incentives</h2>
<table>
	<tr>
		<td>1-149 Boxes Sold</td>
		<td>Participation Patch</td>
	</tr>
	<tr>
		<td>150-169 Boxes Sold</td>
		<td>150+ patch & Giraffe</td>
	</tr>
	<tr>
		<td>170+ Boxes Sold</td>
		<td>Super Seller Patch & Giraffe & Travel Case</td>
	</tr>
	<tr>
		<td>500+ Boxes Sold</td>
		<td>Super Seller Patch & Giraffe & Travel Case & Pop Art Tote</td>
	</tr>
	<tr>
		<td>2 Booth Sales</td>
		<td>Booth Sale Patch</td>	
	</tr>
	<tr>
		<td>Gift of Caring Donation</td>
		<td>Gift of Caring Patch</td>
	</tr>
</table>
<br/>
<br/>
<h2>Events</h2>
<html>
<head>
	<title>Troop Manager Home</title>
</head>
<body>
<div class="content">

<?php
	$query = "SELECT * FORM attending WHERE girlId = (SELECT girlId FROM users WHERE email=$e);";
	$attending = Array();
	$result = mysqli_query($db,$query);
	while($row = mysqli_fetch_array($result))
	{
		$attending[] = $row["eventId"];
	}
	$query = "SELECT * FROM events WHERE DATEDIFF(dateOfEvent,CURRENT_DATE()) > 0;";
	$result = mysqli_query($db,$query);
	echo "<form action='mainController.php'>";
	echo "<table>";
	$row = Array("name" => "<b>Name</b>","description"=>"<b>Description</b>","attending"=>"Attend?");
	do
	{
		echo "<tr>";
		echo "<td>".$row["name"]."</td>";
		echo "<td>".$row["description"]."</td>";
		if($row["attending"] != "")
		{
			echo "<td>".$row["attending"]."</td>";
		}
		else
		{
			$eid = $row["eventId"];
			echo "<td>";
			echo "<input type='checkbox' name='$eid'";
			if(in_array($attending,$row["eventId"]))
			{
				echo "checked='true'";
			}
			echo ">";
			echo "</td>";
		}
		echo "</tr>";
	}
	while($row = mysqli_fetch_array($result));
	echo "</form>";
?>

</div>
</body>
</html>
