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
<form name="boothSale" action="boothSalesController.php" method="POST">
<table>
<tr>
	<td>Date </td>
	<td>
		<input type="text" name="day" size=1 maxlength=2>/
		<input type="text" name="month" size=1 maxlength=2>/
		<input type="text" name="year" size=1 maxlength=2> (dd/mm/yy)

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
	$name = $row['name'];
	$quantity = "<input type=text name='$qtyid' />";
		
	
	echo "<tr><td>$name  </td><td>$quantity </td></tr>\n";
	
	}
	?>
	
</table>
<br />

<h2>ATTENDED:</H2>
<table>
	<?php
	
	$query = "SELECT CONCAT(firstName,' ', lastName) AS 'name', girlId FROM girls;";
	$result = mysqli_query($db, $query) or die ("ERROR SELECTING");
	$row = 1;
	while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$attended = "<input type='checkbox' name=attending.$row />";
	
	//display rows
	echo "<tr><td>$name  </td><td>$attended </td></tr>\n";
	}

	?>	

</table>
<br />
<input type="submit" value="Submit Booth Sale" />
</form>

</div>
</body>
</html>
