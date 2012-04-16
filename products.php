<?php
	session_start();
?>
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
		<th>Type</th>
		<th>Description</th>
		<?php
			$rowcount = 1;
			if($query == "") { //parse data from header (source of information for temporary changes)
				$row['name'] = $_POST["name".$rowcount];
				$row['price'] = $_POST["price".$rowcount];
				$row['description'] = $_POST["desc".$rowcount];
				$row['types'] = $_POST["type".$rowcount];
				$row['productId'] = $_POST["id".$rowcount];			
			} else { $row = mysqli_fetch_array($result); } //parse data from database (source of information for saved changes)
			while(isset($row['name'])) {
				echo "<tr>";
				echo "<td><input type=text name=\"name".$rowcount."\" value=\"".$row['name']."\"></td>";
				echo "<td><input type=text name=\"price".$rowcount."\" value=\"".$row['price']."\"></td>";
				echo "<td><input type=text name=\"desc".$rowcount."\" value=\"".$row['description']."\"></td>";
				echo "<td><select name=\"type".$rowcount."\" value=\"".$row['types']."\"><option>Cookie</option><option>Nut</option></select></td>";
				echo "<td><input type=hidden name=\"id".$rowcount."\" value=\"".$row['productId']."\"></td>";
				echo "</tr>";
				$rowcount++;
				if($query == "") {
					$row['name'] = $_POST["name".$rowcount];
					$row['price'] = $_POST["price".$rowcount];
					$row['description'] = $_POST["desc".$rowcount];
					$row['types'] = $_POST["type".$rowcount];
					$row['productId'] = $_POST["id".$rowcount];			
				} else { $row = mysqli_fetch_array($result); }
			}

			
			if(isset($_POST['new'])) { //if changes are unsaved ($_POST has information) and new lines are requested, generate the requested number of lines.
				$new = $_POST['new'];
			} else { $new = 0; }
			for($i=0; $i<$new; $i++) {
				echo "<tr>";
				echo "<td><input type=text name=\"name".$rowcount."\"></td>";
				echo "<td><input type=text name=\"price".$rowcount."\"></td>";
				echo "<td><input type=text name=\"desc".$rowcount."\"></td>";
				echo "<td><select name=\"type".$rowcount."\"><option>Cookie</option><option>Nut</option></select></td>";
				echo "<td><input type=hidden name=\"id".$rowcount."\"></td>";
				echo "</tr>";
				$rowcount++;
			}
			
		?>
		</table>
		<input type="hidden" name="new" value=<?php echo "\"".(1)."\""?>/>

		<input type="submit" name="loop" value="Add New Line"/><br/><br/>
		<input type="submit" name="save" value="Submit"/>
	</form>

</body>
</html>
