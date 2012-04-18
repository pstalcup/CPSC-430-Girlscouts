<?php
	include("db_connect.php");
	$needsadmin = true;
	include ("loggedIn.php");

?>

<font color = "green"><h1>ADD GIRL TO TROOP</h1></font>

<table>

<form action ="addGirlsController.php" method = "post">

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
			<?php if(isset($_GET["DOB"])) echo "<span>*</span>"; ?>
		</td>
		<td>
		DOB <input type ="text" name = "DOB" />
		</td>
	</tr>


</form>

</table>

<input type="submit" value="Submit" />

