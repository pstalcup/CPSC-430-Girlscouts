<?php
	if(isset($_GET["error"]))
	{
		echo $_GET["error"];
	}
?>
Welcome to the Girlscouts Troop 868 Manager
<div class="content">
<form action="loginController.php" method="post">
<table>
	<tr>
		<td>E-Mail</td>
		<td><input name="email" type="email"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input name="password" type="password"></td>
	</tr>
	<tr>
		<td><a href="register.php">Register</a></td>
		<td><input name="login" type="submit" value="Login"></td>
	</tr>
</table>
</form>
</div>
