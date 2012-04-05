<html>
	<?php
		include "menu.php";
		include "db_connect.php";
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
		<th>Price</th>
		<th>Type</th>
		<th>Description</th>
		<?php
			$query = "select * from products;";
			$result = mysqli_query($db, $query) or die ("ERROR SELECTING");
			
			$row = mysqli_fetch_array($result);
			while($row != False) {
				echo "<tr>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['price']."</td>";
				echo "<td>".$row['types']."</td>";
				echo "<td>".$row['description']."</td>";
				echo "</tr>";
				
				$row = mysqli_fetch_array($result);
			}
			
			
		?>

		</table>
		<input type="submit" value="Submit"/>
	</form>
	
	
	
</body>
</html>
