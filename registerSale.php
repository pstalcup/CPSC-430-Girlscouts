<?php
	include "db_connect.php";
	include "menu.php";
?>
<html>
<head>
	<title> Register Sale</title>
</head>
<body>

<h2>ADD NEW SALES!</h2>
<form action="registerSaleController.php" method="POST">
	<table border="1" cellpadding="5" cellspacing="5">
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
			echo "<td><input type=\"text\" name=\"qty".$i."\"/></td></tr>";
		}
	?>
	</table>
	<input type="hidden" name="girl" value="<?php echo "0"; ?>"/>
	<?php
		if($numproducts == 0) {
			echo "There are no products in inventory right now.";
		} else {
			echo "<input type=\"submit\" value=\"Register Sales\"/>";
		}
	?>
</form>


</body>
</html>
