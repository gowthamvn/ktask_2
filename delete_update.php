<?php

	$id=$_GET['id'];
	include("dbconnect.php");
	mysqli_query($con,"delete from news where id='$id' ");
	header('Location:updates.php');
?>