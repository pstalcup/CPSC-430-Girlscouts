<?php
	include("db_connect.php");
	$needsadmin = true;
	include ("loggedIn.php");

?>
<HTML>
<body>

<font face = "century gothic">

<font color = "green"><h1>ADD GIRL TO TROOP</h1></font>
<table>
<form action ="addGirlsController.php" method = "post">

	<tr>
		<td>
		<?php if(isset($_GET["firstName"])) echo "<span>*</span>"; ?>First Name <input type = "text" name = "firstName" style="width:200px;" />
		<?php if(isset($_GET["lastName"])) echo "<span>*</span>"; ?>Last Name <input type = "text" name = "lastName" style="width:200px" />
		</td>
	</tr>
	<tr>
		<td>
		<?php if(isset($_GET["address"])) echo "<span>*</span>"; ?>Address <input type = "text" name = "address" style="width:492px" />
		</td>
	</tr>
	<tr>
		<td>
		<?php if(isset($_GET["city"])) echo "<span>*</span>"; ?>City <input type = "text" name = "city" style = "width:125px" />
		<?php if(isset($_GET["st"])) echo "<span>*</span>"; ?>State <input type = "text" name = "st" style = "width:35px" />
		<?php if(isset($_GET["zip"])) echo "<span>*</span>"; ?>Zip Code <input type = "text" name = "zip" style = "width:75px" />
		<?php if(isset($_GET["DOB"])) echo "<span>*</span>"; ?>DOB <input type ="text" name = "DOB" style = "width: 137px" />
		</td>
	</tr>


</form>

</table>

<input type="submit" value="Submit" />


</body>
</HTML>
