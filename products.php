<?php
	include "db_connect.php";
	$requires = "admin";
	include "menu.php";
?>
<html>
<head>
	<title>Manage Products</title>
</head>
<body>
<div class = "content">

	<h2>Manage Inventory</h2>
	<form action="productsController.php" method="POST">
		<?php
			if(isset($_SESSION['post'])) { //displaying unsaved changes that have been bounced back by the controller
				$query = "";
				$_POST = $_SESSION['post'];
				unset($_SESSION['post']);
			} else {
				$query = "select * from products order by name;";
				$result = mysqli_query($db, $query) or die ("ERROR SELECTING");
			} //either changes have been committed, or this is the first time displaying the page; either way, query the database.
		?>

		<table>
		<th>Name</th>
		<th>Price $</th>
		<th>Description</th>
		<th>Type</th>
		<th>Quantity</th>
		<?php
			$rowcount = 1;
			if($query == "") { //parse data from header (source of information for temporary changes)
				$row['name'] = $_POST["name".$rowcount];
				$row['price'] = $_POST["price".$rowcount];
				$row['description'] = $_POST["desc".$rowcount];
				$row['types'] = $_POST["type".$rowcount];
				$row['productId'] = $_POST["id".$rowcount];
				$row['quantity'] = $_POST["qty".$rowcount];
			} else { $row = mysqli_fetch_array($result); } //parse data from database (source of information for saved changes)
			while(isset($row['name'])) {
				echo "<tr>";
				echo "<td><input type=text name=\"name".$rowcount."\" value=\"".$row['name']."\"></td>";
				echo "<td><input type=text size=\"5\" name=\"price".$rowcount."\" value=\"".$row['price']."\"></td>";
				echo "<td><input type=text name=\"desc".$rowcount."\" value=\"".$row['description']."\"></td>";
				echo "<td><select name=\"type".$rowcount."\" value=\"".$row['types']."\"><option>Cookie</option><option>Nut</option></select></td>";
				echo "<td><input type=text size=\"5\" name=\"qty".$rowcount."\" value=\"".$row['quantity']."\"></td>";
				echo "<td><input type=hidden name=\"id".$rowcount."\" value=\"".$row['productId']."\"></td>";
				echo "</tr>";
				$rowcount++;
				if($query == "") {
					$row['name'] = $_POST["name".$rowcount];
					$row['price'] = $_POST["price".$rowcount];
					$row['description'] = $_POST["desc".$rowcount];
					$row['types'] = $_POST["type".$rowcount];
					$row['productId'] = $_POST["id".$rowcount];			
					$row['quantity'] = $_POST["qty".$rowcount];
				} else { $row = mysqli_fetch_array($result); }
			}

			if(isset($_POST['new'])) {
				echo "<tr>";
				echo "<td><input type=text name=\"name".$rowcount."\"></td>";
				echo "<td><input type=text size=\"5\" name=\"price".$rowcount."\"></td>";
				echo "<td><input type=text name=\"desc".$rowcount."\"></td>";
				echo "<td><select name=\"type".$rowcount."\"><option>Cookie</option><option>Nut</option></select></td>";
				echo "<td><input type=text size=\"5\" name=\"qty".$rowcount."\"></td>";
				echo "<td><input type=hidden name=\"id".$rowcount."\"></td>";
				echo "</tr>";
				$rowcount++;
			}
			
		?>
		</table>
		<input type="hidden" name="new" value="1"/>

		<input type="submit" name="loop" value="Add New Line"/><br/><br/>
		<input type="submit" name="save" value="Submit"/>
	</form>
</div>
</body>
</html>
