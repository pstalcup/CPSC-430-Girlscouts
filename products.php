<html>
	<?php
		include "db_connect.php";
		include "loggedIn.php";
	?>
<head>
	<title>Manage Products</title>
</head>
<body>

	PRODUCTS
	<br/>
	<form action="productsController.php" method="POST">
		<table>
		<th>Name</th>
		<th>Price $</th>
		<th>Type</th>
		<th>Description</th>
		<?php
			$query = "select * from products order by name;";
			$result = mysqli_query($db, $query) or die ("ERROR SELECTING");
			
			$rowcount = 0;
			$row = mysqli_fetch_array($result);
			while($row != False) {
				$rowcount++;
				echo "<tr>";
				echo "<td><input type=text name=\"name".$rowcount."\" value=\"".$row['name']."\"></td>";
				echo "<td><input type=text name=\"price".$rowcount."\" value=\"".$row['price']."\"></td>";
				echo "<td><input type=text name=\"desc".$rowcount."\" value=\"".$row['description']."\"></td>";
				echo "<td><select name=\"type".$rowcount."\" value=\"".$row['types']."\"><option>Cookie</option><option>Nut</option></select></td>";
				echo "<td><input type=hidden name=\"id".$rowcount."\" value=\"".$row['productId']."\"></td>";
				echo "</tr>";
				$row = mysqli_fetch_array($result);
			}


			if(isset($_GET['new'])) {
				$new = $_GET['new'];
			} else { $new = 0; }
			for($i=0; $i<$new; $i++) {
				$rowcount++;
				echo "<tr>";
				echo "<td><input type=text name=\"name".$rowcount."\"></td>";
				echo "<td><input type=text name=\"price".$rowcount."\"></td>";
				echo "<td><input type=text name=\"desc".$rowcount."\"></td>";
				echo "<td><select name=\"type".$rowcount."\"><option>Cookie</option><option>Nut</option></select></td>";
				echo "<td><input type=hidden name=\"id".$rowcount."\"></td>";
				echo "</tr>";
			}

		?>

		</table>
		<?php
			echo "<a href=\"products.php?new=".($new+1)."\">Add Product</a>";
		?>
		<br/>
		<br/>
		<input type="submit" value="Submit"/>
	</form>

</body>
</html>
