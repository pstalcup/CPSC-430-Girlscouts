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
?>
