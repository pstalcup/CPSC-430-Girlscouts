<?php
	include "db_connect.php";
	include "menu.php";
?>
<html>
<head>
	<title>Troop Manager Home</title>
</head>
<body>
<div class="content">

<?php
	$query = "SELECT * FROM events WHERE DATEDIFF(dateOfEvent,CURRENT_DATE()) > 0;";
	$result = mysqli_query($db,$query);
	while($row = mysqli_fetch_array($result))
	{
		echo $row["name"];
	}
?>

</div>
</body>
</html>
