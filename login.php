<?php
	$requires = "none";
	include "menu.php";
?>
<html>
<head>
	<title>Login - Troop 868 Manager</title>
</head>
<body>
<div class="content">

<h2>Welcome to the Girl Scouts Troop 868 Manager!</h2>
<?php
	if(isset($_GET['fail'])) {
		if($_GET['fail'] == 1) {
			echo "<b>Sorry, that email and password combination does not exist yet...<br/>If you've already registerd, you may have to wait for the administrator to approve your account.</b><br/><br/>";
		}
	}
?>
Please enter your email and password to log in.
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
</table>
<input type="submit" value="Login">
</form>
Not yet a member? <a href="register.php">Register</a><br/><br/>

</div>
</body>
</html>
