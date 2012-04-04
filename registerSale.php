<?php
include "db_connect.php";
include "loggedIn.php";

$query = "SELECT types FROM products;";
$result = mysqli_query($db, $query);
$type = "<select name=\"type\">";
while ($row = mysqli_fetch_array($result)){
$type .= "<option name=\"$row\">$row</option>";
}
$type .= "</select>";

$query = "SELECT name FROM products;";
$result = mysqli_query($db, $query);
$product = "<select name=\"product\">";
while ($row = mysqli_fetch_array($result)){
$product .= "<option name=\"$row\">$row</option>";
}
$product .= "</select>";


?>
<html>
<head>
<title> Register Sale</title>
</head>

<body>
<h2>ADD NEW SALES!</h2>

	
<form method="post" action="registerSaleController.php">
 <table border="1" cellpadding="5" cellspacing="5">
 <tr><th>Customer</th><th>Type</th><th>Product</th><th>Quantity</th></tr>
 <tr><td><input type = 'text' /></td><td><?php echo $type;?></td><td><?php echo $product;?></td><td><input type='text' name='qty'/> </td><tr>
 <tr><td><input type = 'text' /></td><td><?php echo $type;?></td><td><?php echo $product;?></td><td><input type='text' name='qty' /> </td><tr>
 <tr><td><input type = 'text' /></td><td><?php echo $type;?></td><td><?php echo $product;?></td><td><input type='text' name='qty' /> </td><tr>
 <tr><td><input type = 'text' /></td><td><?php echo $type;?></td><td><?php echo $product;?></td><td><input type='text' name='qty' /> </td><tr>
 <tr><td><input type = 'text' /></td><td><?php echo $type;?></td><td><?php echo $product;?></td><td><input type='text' name='qty' /> </td><tr>
 <tr><td><input type = 'text' /></td><td><?php echo $type;?></td><td><?php echo $product;?></td><td><input type='text' name='qty' /> </td><tr>
 <tr><td><input type = 'text' /></td><td><?php echo $type;?></td><td><?php echo $product;?></td><td><input type='text' name='qty' /> </td><tr>
 <tr><td><input type = 'text' /></td><td><?php echo $type;?></td><td><?php echo $product;?></td><td><input type='text' name='qty' /> </td><tr>
 
 

</table>
 <input type = "submit" value = "Register Sales">
</form>



</body>



</html>