<?
	if(!isset($_SESSION['email']))
	{
		Header("Location: login.php");		
	}
	if($_SESSION['user'] == "admin")
	{
		$admin = 1;
	}
	else
	{
		$admin = 2;
	}
	if(isset($needsadmin) && $admin)
	{
		Header("Location: main.php");
	}
?>
