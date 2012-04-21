<?php
	include("db_connect.php");
	$requires = "admin";
	include ("menu.php");

?>

<font color = "green"><h1>ADD GIRL TO TROOP</h1></font>
<h2>Please fill out all of the information on the required fields.</h2>
<form method = "post" action ="addGirlsController.php">
<table>
	<tr>
		<td>
			<?php if(isset($_GET["firstName"])) echo "<span>*</span>"; ?>First Name 
		</td>
		<td>
			<input type = "text" name = "firstName" />
		</td>
	</tr>
		<td>
			<?php if(isset($_GET["lastName"])) echo "<span>*</span>"; ?>Last Name
		</td>
		<td>
			<input type = "text" name = "lastName" />
		</td>
	</tr>
	<tr>
		<td>
			<?php if(isset($_GET["address"])) echo "<span>*</span>"; ?>Address 
		</td>
		<td>
			<input type = "text" name = "address" />
		</td>
	</tr>
	<tr>
		<td>
			<?php if(isset($_GET["city"])) echo "<span>*</span>"; ?>City 
		</td>
		<td>
			<input type = "text" name = "city"/>
		</td>
	</tr>
	<tr>
		<td>
			<?php if(isset($_GET["st"])) echo "<span>*</span>"; ?>State 
		</td>
		<td>
			<input type = "text" name = "st"   />
		</td>
	</tr>
	<tr>
		<td>
			<?php if(isset($_GET["zip"])) echo "<span>*</span>"; ?>Zip Code 
		</td>
		<td>
			<input type = "text" name = "zip"  />
		</td>
	</tr>
	<tr>
		<td>
			<?php if(isset($_GET["DOB"])) echo "<span>*</span>"; ?>DOB
		</td>
		<td>
		<input type ="text" name = "DOB" />
		</td>
	</tr>
	
	<tr> 
		<td>
			<input type="submit" value="Submit" />
		</td>
	</tr>
</table>

</form>





