<?php
	include("db_connect.php");
	$requires = "none";
	include("menu.php");
?>
<style type="text/css">
span
{
	color:#FF0000;
}
</style>

<html>
<head>
	<title>Register</title>
</head>
<body>
<div class="content">

<?php
	$ddy = "<select name=\"year\">";
	for($i = 1900; $i < 2012;$i++)
	{
		$ddy .= "<option name=\"$i\">$i</option>";
	}
	$ddy .= "</select>";

	$ddm = "<select name=\"month\">";
	for($i = 1;$i < 13;$i++) 
	{
		$ddm .= "<option name=\"$i\">$i</option>";
	}
	$ddm .= "</select>";
	
	$ddd = "<select name=\"day\">";
	for($i = 1;$i < 32;$i++) 
	{
		$ddd .= "<option name=\"$i\">$i</option>";
	}
	$ddd .= "</select>";	
?>

<h2>Register</h2>
<?php
	//if(isset($_GET['bad'])) {
	//	echo "Sorry, one of the fields didn't have correct input.<br/>";
	//}
?>
<form method="POST" action="registerController.php">
<table>
	<tr>
		<td><?php if(isset($_GET["email"])) echo "<span>*</span>"; ?>E-Mail</td>
		<td><input type="email" name="email"></td>
	</tr>
	<tr>
		<td><?php if(isset($_GET["p1"])) echo "<span>*</span>"; ?>Password</td>
		<td><input type="password" name="p1"></td>
	</tr>
	<tr>
		<td><?php if(isset($_GET["p2"])) echo "<span>*</span>"; ?>Re-Enter Password</td>
		<td><input type="password" name="p2"></td>
	</tr>
	<tr>
		<td><?php if(isset($_GET["fn"])) echo "<span>*</span>"; ?>First Name</td>
		<td><input type="text" name="fn">
	</tr>
	<tr>
		<td><?php if(isset($_GET["ln"])) echo "<span>*</span>"; ?>Last Name</td>
		<td><input type="text" name="ln">
	</tr>
	<tr>
		<td><?php if(isset($_GET["dob"])) echo "<span>*</span>"; ?>Date of Birth</td>
		<td><?php echo $ddy.$ddm.$ddd;?></td>
	</tr>
	<tr>
		<td><?php if(isset($_GET["address"])) echo "<span>*</span>"; ?>Address</td>
		<td><input type="text" name="address"></td>
	</tr>
	<tr>
		<td><?php if(isset($_GET["street"])) echo "<span>*</span>"; ?>Street</td>
		<td><input type="text" name="street"></td>
	</tr>
	<tr>
		<td><?php if(isset($_GET["zip"])) echo "<span>*</span>"; ?>Zipcode</td>
		<td><input type="text" name="zip"></td>
	</tr>
	<tr>
		<td><?php if(isset($_GET["daughter"])) echo "<span>*</span>"; ?>Name of Daughter</td>
		<td><input type="text" name="daughter"></td>
</table>
<input type="submit" value="Request Account">
</form>

</div>
</body>
</html>
	
