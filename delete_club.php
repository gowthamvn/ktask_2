<?php
	$id=$_GET['id'];
	include("dbconnect.php");
	mysqli_query($con,"delete from clubs where id='$id' ");
	header('Location:clubs.php');
?>