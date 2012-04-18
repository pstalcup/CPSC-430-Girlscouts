<?php
include "db_connect.php";
include "loggedIn.php";

$types = array (
'Cookie', 'Nut' );

function types(




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