<?php
	include "db_connect.php";
	include "loggedIn.php";

	$links = Array();
	$links["Home"] = "main.php";
	if($admin == 1)
	{
		$links["Approve Accounts"] = "approve.php";
	}
	$links["Logout"] = "logout.php";
?>

<div id="toolbar">
	Links:
	<?
		foreach($links as $key => $value)
		{
			echo "<a href='$value'>$key</a> ";
		}
	?>
</div>
