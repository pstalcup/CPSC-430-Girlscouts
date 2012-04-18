<?php
include "db_connect.php";
include "loggedIn.php";

$t = array(' ' =>1, 'Cookie'=>2, 'Nut' =>3);

#generate dropdown list of product type
function typesMenu($name = ' ', $options = array()){
	$html = '<select name="'.$name.'">';
	foreach ($options as $option => $value) {
		$html .= '<option value='.$value.'>'.$option.'</option>';
	}
	$html .= '</select>';
	return $html;
}
$type = typesMenu('types', $t);

$p = array();

$query = "SELECT name FROM products;";
$result = mysqli_query($db, $query);
$i = 0;
while($row = mysqli_fetch_array($result)) {
	$p[$i] = $_GET[$row];
	$i++;

}

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