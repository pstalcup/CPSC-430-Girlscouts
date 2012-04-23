<?php
	session_start();
	echo '<LINK href="style.css" rel="stylesheet" type="text/css">';
	//specify $requires before including to set the level of access for the page
	if($requires == "admin") {
		$security = 2;
	} else if($requires == "none") {
		$security = 0; //$requires = "none" will allow anybody to access the page, even if they're not logged in.
	} else {
		$security = 1; //default is that regular login is required.
	}
	
	if(isset($_SESSION['email'])) {
		$e = $_SESSION["email"];
		if($e == "japwahl@gmail.com") {
			$permission = 2;
		} else {
			$query = "SELECT * FROM requests WHERE email='$e';";
			$result = mysqli_query($db,$query);
			if($row = mysqli_fetch_array($result))
			{
				//header("Location: notApproved.php");
				//exit(""); //this creates an infinite loop
				$permission = 0;
			} else {
				$permission = 1;
			}
		}
	} else {
		$permission = 0; //user is not logged in.
	}

	if($permission < $security) { //if you're on a page you can't access...
		if($permission < 1) { //...and you're not logged in, go to login.
			header("Location: login.php");
			exit("");
		}
		if($permission < 2) { //...if you are logged in, go to main.
			header("Location: main.php");
			exit("");
		}
	}	

	//display the dynamically-generated menu bar
	$links = Array();
	$links["Home"] = "main.php";
	if($permission >= 1) {
		$links["Register Sale"] = "registerSale.php";
	}
	if($permission >= 2) {
		$links["Booth Sales"] = "boothSales.php";
		$links["Generate Sales Report"] = "salesReport.php";
		$links["Approve Accounts"] = "approve.php";
		$links["Add Girls"] = "addGirls.php";
		$links["Create Event"] = "createEvents.php";
		$links["View Events"] = "viewEvent.php";
		$links["Delete Event"] = "deleteEvent.php";
		$links["Manage Inventory"] = "products.php";	
	}
	if($permission > 0) {
		$links["Logout"] = "logout.php";
	} else {
		$links["Login"] = "login.php";
		$links["Register"] = "register.php";
	}
?>
	
<div id="toolbar">
	Links:
	<?
		foreach($links as $key => $value) {
			echo "<a href='$value'>$key</a> ";
		}
	?>
</div>
<img src="gsLogo.png">
<div class="btm">
	Questions? <a href="mailto:japwahl@gmail.com">Contact the Webmaster</a><br/>
	Troop 868
</div>
