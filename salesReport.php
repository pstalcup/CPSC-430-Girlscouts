<?php
include "db_connect.php";
$needsadmin = true;
include "loggedIn.php";

$query = "SELECT DISTINCT p.name, s.quantity, p.price, (s.quantity * p.price) AS 'Total' FROM products p JOIN sales s ON p.productId = s.productId WHERE s.quantity >0;";
$result = mysqli_query($db, $query);
?>
<html>
<header>
<title> Sales Report</title>
</header>


<body>
<table border = "1" cellpadding="5" cellspacing="5" width="100%" font="family: century gothic">

<?php
echo "<tr><th>Product</th><th >Quantity</th><th>Price</th><th>Total</th></tr>";
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$quantity = $row['quantity'];
	$price = $row['price'];
	$total = $row['(s.quantity * p.price)'];
		
echo "<tr><td>$name  </td><td>$quantity </td><td>$price </td><td> $total</td></tr>\n";
}
?>

</table>


</body>
</html>
