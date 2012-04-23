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
	$query = "SELECT name FROM girls;";
	$result = mysqli_query($db,$query);
	echo "<form action='boothSalesController.php'>";
	echo "<table>";
	$row = Array("name" => "<b>Name</b>", "attending"=>"Attended?");
	do
	{
		echo "<tr>";
		echo "<td>".$row["name"]."</td>";
		if($row["attending"] != "")
		{
			echo "<td>".$row["attending"]."</td>";
		}
		else
		{
			$gid = $row["girlId"];
			echo "<td>";
			echo "<input type='checkbox' name='$gid'";
			if(in_array($row["girlId"],$attending))
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
