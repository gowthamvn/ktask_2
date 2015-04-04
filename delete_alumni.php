<?php

	$id=$_GET['id'];
	include("dbconnect.php");
	mysqli_query($con,"delete from alumni where id='$id' ");
	header('Location:alumni.php');
?>