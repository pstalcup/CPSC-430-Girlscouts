<?php
	session_start();
	include "db_connect.php";
	include "menu.php";
	
	$blank = True;
	$rows = 1;
	while(isset($_POST["user".$rows])) {
		$user = $_POST["user".$rows];
		$productID = $_POST["id".$rows];
		if(($_POST["qty".$rows] != "") and ($_POST["qty".$rows] != "0")) {
			$quantity = floor($_POST["qty".$rows]);
		} else { $quantity = 0; }

		if(($user != "") and ($productID != "") and ($quantity != 0)){
			if($blank) {	
				if($_POST["girl"] != "") {
					$girlID = $_POST['girl'];
				} else { $girlID = 0; }
				$query = "insert into transactions values (null,$girlID);";
				mysqli_query($db, $query) or die ("error inserting 1");
				$query = "select TID from transactions order by TID desc limit 1";
				$result = mysqli_query($db, $query) or die ("error selecting");
				$row = mysqli_fetch_array($result);
				$tid = $row['TID'];
				$blank = False;
			} //determines that the transaction has content, and assigns one new entry for this batch of sales.
			$query = "insert into sales values ($tid,$quantity,$productID,'$user');";
			mysqli_query($db, $query) or die ("error inserting 2");
		}
		$rows++;
	}
	
	//$query = "delete from transactions;";
	//mysqli_query($db, $query) or die ("error deleting");
	//echo "<br/><a href=\"registerSale.php\">Continue</a>";
	header("Location: registerSale.php");
	exit("");
?>
