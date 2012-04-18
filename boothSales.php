<?php

	include "db_connect.php";
	include "loggedIn.php";

	if(isset($_SESSION['post'])) {
		$query = "";
		$_POST = $_SESSION['post'];
		unset($_SESSION['post']);
	} else {
		$query = "select productId, name  from products order by name;";
		$result = mysqli_query($db, $query) or die ("ERROR SELECTING");
	}
	
?>

<h1> Add a Booth Sale!</h1>

<form>
<table>
<tr>
	<td>Date </td>
	<td>
		<input type="text" name="day" size=1 maxlength=2>/
		<input type="text" name="month" size=1 maxlength=2>/
		<input type="text" name="year" size=1 maxlength=2> (dd/mm/yy)

	</td>
</tr>

		<th>Product</td><td>Quantity</td><td>Total</td>
	
	<?php
	$rowcount = 1;
	


	?>

</table>	







</table>
</form>
