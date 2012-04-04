<?
	if(!isset($_SESSION['email']))
	{
		Header("Location: login.php");		
	}
	if($_SESSION['email'] == "japwahl@gmail.com")
	{
		$admin = 1;
	}
	else
	{
		$admin = 2;
	}
	if(isset($needsadmin) && $admin != 1)
	{
		Header("Location: main.php");
	}
	$links = Array();
	$links["Home"] = "main.php";
	if($admin == 1)
	{
		$links["Approve Accounts"] = "approve.php";
		$links["Generate Sales Report"] = "salesReport.php";
		$links["Add Girls"] = "addGirls.php";
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
