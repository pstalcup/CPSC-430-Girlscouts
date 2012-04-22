<?php
include "db_connect.php";
$requires = "admin";
include "menu.php";

$query = "SELECT CONCAT(g.firstName,' ', g.lastName) AS 'girl', t.girlId, p.name, s.quantity, p.price, (s.quantity * p.price) AS 'Total' FROM girls g INNER JOIN transactions t ON g.girlId = t.girlId JOIN sales s ON s.transactionId = t.TID JOIN products p ON p.productId = s.productId WHERE s.quantity >0 ORDER BY t.girlId ASC;";

$result = mysqli_query($db, $query);
?>
<html>
<header>
<title> Sales Report</title>
</header>

<body>
<div class="content">

<h2>Sales Report</h2>
<table border = "1" cellpadding="5" font="family: century gothic">
<?php
	echo "<tr><th>Girl Scout</th><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";
	while($row = mysqli_fetch_array($result)) {
		$girl = $row['girl'];
		$name = $row['name'];
		$quantity = $row['quantity'];
		$price = $row['price'];
		$total = $quantity * $price;
		echo "<tr><td>$girl</td><td>$name</td><td>$quantity</td><td>$$price</td><td>$$total</td></tr>";
	}
?>
</table>
<br /><br />
</div>
</body>
</html>
