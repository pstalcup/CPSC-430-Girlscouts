<?php
	include "db_connect.php";
	session_destroy();
	//delete $_SESSION["email"];
	//delete $_SESSION["user"];
	Header("Location: login.php");
?>
