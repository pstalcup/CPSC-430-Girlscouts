<?php 
session_start();
ob_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Add Girl</title>
  
</head>

<body>
<div id="contents">
<?php


  $firstName = mysqli_real_escape_string($db, trim($_POST['firstName']));
  $lastName = mysqli_real_escape_string($db, trim($_POST['lastName']));
  $DOB = mysqli_real_escape_string($db, trim($_POST['DOB']));
  $address = mysqli_real_escape_string($db, trim($_POST['address']));
  $city = mysqli_real_escape_string($db, trim($_POST['city']));
  $st = mysqli_real_escape_string($db, trim($_POST['st']));
  $zip = mysqli_real_escape_string($db, trim($_POST['zip']));
  
  $query = "INSERT INTO girls (firstName, lastName, DOB, address, city, st, zip) VALUES ($firstName, $lastName, $DOB, $address, $city, $st, $zip);"
  




?>



</div>

<script type="text/javascript">
window.location="addGirls.php";
</script>



</body>
</html>
