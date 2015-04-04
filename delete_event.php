<?php

	$id=$_GET['id'];
	include("dbconnect.php");
	mysqli_query($con,"delete from events where id='$id' ");
	header('Location:events.php');
?>