<?php
	include "db_connect.php";
	$needsadmin = true;
	include "loggedIn.php";

?>
<HTML>
<body>

<font face = "century gothic">
<font color = "green"><h1>ADD GIRL TO TROOP</h1></font>

<table border="1">
<form action ="addGirlsController.php" method = "get">

<tr>
<td> First Name <input type = "text" name = "firstName" style="width:200px;" />
Last Name <input type = "textarea" name = "lastName" style="width:200px" /></td>
</tr>
<tr>
<td>Address <input type = "textarea" name = "address" style="width:492px" /></td>
</tr>
<tr>
<td>City <input type = "textarea" name = "city" style = "width:125px" />
State <input type = "textarea" name = "st" style = "width:35px" />
Zip Code <input type = "textarea" name = "zip" style = "width:75px" />
DOB <input type ="textarea" name = "DOB" style = "width: 137px" />
</tr>

</text>

</form>

</table>

<input type="submit" value="Done" />


</body>
</HTML>
