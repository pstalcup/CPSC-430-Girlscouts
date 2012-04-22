<?php
	include "db_connect.php";
	include "menu.php";

	if(isset($_SESSION['post'])) {
		$query = "";
		$_POST = $_SESSION['post'];
		unset($_SESSION['post']);
	} else {
		$query = "select productId, name  from products order by name;";
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
<form>
<table>
<tr>
	<td>Date </td>
	<td>
		<input type="text" name="day" size=1 maxlength=2>/
		<input type="text" name="month" size=1 maxlength=2>/
		<input type="text" name="year" size=1 maxlength=2> (dd/mm/yy)

	</td>
</tr>

		<th>Product</th><th>Quantity</th>
	
	<?php

	while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$quantity = "<input type=text name=quantity maxlength=3 />";
		
	echo "<tr><td>$name  </td><td>$quantity </td></tr>\n";
	}


	?>

	<h2>ATTENDED:</H2>
	<?php
	$query = "SELECT CONCAT(firstName,' ', lastName) AS 'name', girlId FROM girls;";
	$result = mysqli_query($db, $query) or die ("ERROR SELECTING");
	while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$attended = "<input type=checkbox name=attended />";
		
	echo "<tr><td>$name  </td><td>$attended </td></tr>\n";
	}


	?>
	
	
</table>	

</table>
</form>

</div>
</body>
</html>
