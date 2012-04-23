<?php
	include "db_connect.php";
	include "menu.php";
?>
<html>
<head>
	<title> Register Sales</title>
</head>
<body>
<div class ="content">

<h2>Add New Sales</h2>
<form action="registerSaleController.php" method="POST">
	<table>
	<tr><th>Customer</th><th>Product</th><th>Quantity</th></tr>
	<?php
		$query = "SELECT productId, name FROM products;";
		$result = mysqli_query($db, $query);
		$numproducts = 0;
		while($row = mysqli_fetch_array($result)) {
			$name[$numproducts] = $row['name'];
			$id[$numproducts] = $row['productId'];
			$numproducts++;
		}
		for($i=1; $i<9; $i++) {
			echo "<tr><td><input type=\"text\" name=\"user".$i."\"/></td>";
			echo "<td><select name=\"id".$i."\"><option></option>";
			for($x=0; $x<$numproducts; $x++) {
				echo "<option value=\"".$id[$x]."\">".$name[$x]."</option>";
			}
			echo "</select></td>";
			echo "<td><input type=\"text\" size =\"5\"name=\"qty".$i."\"/></td></tr>";
		}
	?>
	</table>
	<?php
		$user = $_SESSION['email'];
		$query = "select girlId from users where email='$user'";
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_array($result);
		$girlID = $row['girlId'];
		echo "<input type=\"hidden\" name=\"girl\" value=\"$girlID\"/>";

		if($numproducts == 0) {
			echo "There are no products in inventory right now.";
		} else {
			echo "<br/><input type=\"submit\" value=\"Register Sales\"/>";
		}
	?>
</form>

</div>

</body>
</html>
